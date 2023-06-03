<template>
    <div class="login-signin px-4 pt-3">
        <div :class="loading==1 ? 'white-div d-flex justify-content-center align-items-center' : ''">
            <img :class="loading==1 ? 'd-block' : 'd-none'" :src="loadingGif" id="loading" height="80">
        </div>
        <div class="mb-20">
            <h3>ورود به بهزی</h3>
            <p v-if="stepThree" class="text-secondary mt-3 font-weight-bold">لطفا نام شهر خود را وارد کنید </p>
            <p v-else class="font-weight-bold">ثبت نام و ورود با شماره موبایل </p>
        </div>
        <div>
            <div v-if="!stepThree"  class="form-group position-relative">
                <div class="mobile-icon"><svg width="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="none" x="0px" y="0px"><path fill-rule="evenodd" clip-rule="evenodd" d="M71.2132 28.7868C59.4975 17.0711 40.5025 17.0711 28.7868 28.7868C17.0711 40.5025 17.0711 59.4975 28.7868 71.2132C40.5025 82.9289 59.4975 82.9289 71.2132 71.2132C82.9289 59.4975 82.9289 40.5025 71.2132 28.7868ZM55.9648 34.1226C56.0579 33.7438 55.8999 33.4602 55.6206 33.2243C55.5644 33.181 55.5146 33.1312 55.5016 33.0186C55.325 32.9086 55.1491 32.7974 54.9732 32.6861C54.5542 32.4211 54.1349 32.156 53.7049 31.906C52.9408 31.4666 52.1117 31.3648 51.2437 31.4882C50.1311 31.6527 49.1029 32.0532 48.105 32.5489C46.9988 33.0965 46.0659 33.8433 45.3277 34.8499C44.674 35.7374 44.2129 36.718 43.7497 37.7094C42.9791 39.3502 42.2777 41.0127 41.8535 42.7833C41.1954 45.5065 40.9876 48.2686 41.0569 51.061C41.1153 53.2624 41.3773 55.4422 41.9249 57.5787C42.531 59.9295 43.5614 62.1115 44.6892 64.2437C45.2693 65.352 46.0767 66.3023 47.1547 66.9863C48.3409 67.7396 49.6051 68.2981 50.9926 68.5427C51.497 68.6271 52.049 68.6596 52.5512 68.5686C53.7569 68.3457 54.7288 67.6552 55.6228 66.8564C55.941 66.5728 56.0579 66.2525 55.954 65.8498C55.8856 65.5771 55.8195 65.3032 55.7533 65.0289C55.6372 64.5478 55.5208 64.0654 55.3912 63.5856C55.2657 63.1201 55.1249 62.6584 54.9841 62.1963C54.6999 61.2641 54.4154 60.3307 54.2547 59.3624C54.238 59.2583 54.2004 59.1543 54.1631 59.0513C54.1523 59.0214 54.1416 58.9916 54.1314 58.9619C53.9733 58.4835 53.6443 58.2065 53.1335 58.1632C52.8845 58.1394 52.6269 58.1156 52.378 58.1307C51.9309 58.1569 51.4859 58.1867 51.0413 58.2165C50.4569 58.2557 49.8733 58.2948 49.2869 58.3255C48.1742 58.3861 47.8452 58.187 47.5508 57.1263C47.2391 56.0007 46.9534 54.8621 46.7348 53.7127C46.1611 50.7363 46.3148 47.7729 47.0486 44.8398C47.2358 44.095 47.4575 43.3656 47.6793 42.6353C47.6935 42.5887 47.7077 42.5421 47.7218 42.4954C47.8777 41.9889 48.2587 41.7422 48.7695 41.7508C49.1697 41.7588 49.5707 41.7821 49.972 41.8055C50.2263 41.8203 50.4807 41.8351 50.735 41.8461C50.9394 41.8551 51.1442 41.8657 51.3491 41.8764C51.93 41.9066 52.512 41.9369 53.088 41.9305C53.6335 41.9261 53.9885 41.5885 54.1508 41.0625L54.1605 41.0253C54.2203 40.7968 54.2815 40.5627 54.3348 40.3286C54.3552 40.2333 54.3718 40.1366 54.3884 40.0399C54.4179 39.8687 54.4474 39.6975 54.4972 39.5342C54.6135 39.1248 54.7356 38.7174 54.8577 38.3102C55.0241 37.7551 55.1903 37.2005 55.3414 36.6422C55.5508 35.8704 55.7345 35.095 55.9178 34.3209C55.9335 34.2548 55.9491 34.1887 55.9648 34.1226Z" fill="#007BFF"/></svg></div>
                <input v-model="mobile" @keyup.enter="!stepTwo && register()" class="form-control h-auto text-white placeholder-white rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="شماره موبایل ..." name="mobile" autocomplete="off" :disabled="stepTwo" />
            </div>
            <div class="form-group" v-if="stepTwo">
                <input v-model="code" @keyup.enter="stepTwo && login()" class="form-control h-auto text-white placeholder-white rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="کد ارسالی" name="code" autocomplete="off" />
            </div>
            <div class="col-12 mt-3" v-if="stepThree">
                <v-select v-model="city" @search="fetchCities" :options="this.city_list" placeholder="نام شهر" dir="rtl">
                    <span slot="no-options">موردی یافت نشد</span>
                </v-select>
            </div>

            <div class="form-group text-center mt-10">
                <span data-index="1" @click="stepThree ? setLocation() : stepTwo ? login() : register()" class="btn-gradient-blue" :class="loading==1 ? btnStyleLoading : btnStyle">تایید</span>
                <!-- <SimpleButton if-statement="true" :on-click-function="register" :button-style="btnStyle" :button-text="شاهین"></SimpleButton>-->
                <span data-index="2" v-if="stepTwo" @click="resend()" class="fix-width cursor-default" :class="loading==2 ? btnStyleLoading : btnStyle">ارسال مجدد ({{ countDown}})</span>
            </div>
        </div>
        <div class="mt-3 mb-2" v-if="stepTwo">
            <span @click="changeMobile" class="pointer">تغییر شماره همراه</span>
        </div>

        <div class="mt-4" v-if="!stepTwo && !stepThree">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" v-model="policy" class="custom-control-input" id="policy">
                <label class="mr-4 custom-control-label text-muted" for="policy">
                    <a href="/policies" class="font-weight-bold mr-1 pb-1" id="underline">قوانین و مقررات</a> را قبول دارم.
                </label>
                <span></span>
            </label>
        </div>
    </div>
</template>

<script>
    import SimpleButton from "./elements/SimpleButton";

    export default {
        props: ['registerRoute','loginRoute','indexRoute','loadingGif','searchCityRoute','setCityRoute'],
        data(){
            return{
                name:"shahin",
                countDown : 120,
                mobile:'',
                code:'',
                city:'',
                stepTwo:false,
                stepThree:false,
                loading:0,
                btnStyle: "btn",
                btnStyleLoading: "btn btn-loading position-relative",
                policy:true,
                city_list: []
            }
        },
        created() {
            if(this.checkLocalTime() == false){
                this.stepTwo = false;
            }else {
                if(this.baseCounter() <= 120){
                    this.stepTwo = true;
                    this.mobile  = this.getMobile();
                    this.countDownTimer();
                }else if (this.baseCounter() > 120){
                    this.stepTwo = false;
                }
            }
        },
        methods : {
            register() {
                this.loading = 1;
                setTimeout(()=>{
                    if(this.policy){
                        axios.post(this.registerRoute,{
                            mobile:this.mobile
                        })
                            .then(response => {
                                this.setMainTime();
                                this.setMobileInLocalStorage();
                                this.loading = 0;
                                this.stepTwo=true;
                                this.countDown=120;
                                showAlert('info',"کد sms شده را وارد کنید.",3000);
                                setTimeout(()=>{$("input[name='code']").focus();},800);
                                this.countDownTimer();
                            })
                            .catch(e => {
                                this.loading = 0;
                                showAlert("danger","شماره موبایل را درست وارد کنید",3000);
                            })
                    }else{
                        this.loading = 0;
                        showAlert("danger","جهت استفاده از امکانات سایت، باید قوانین مورد قبول شما باشد",5000);
                    }
                },1000);
            },
            login() {
                this.loading = 1;
                setTimeout(()=>{
                    axios.post(this.loginRoute,{
                        mobile:this.mobile,
                        code:this.code
                    })
                        .then(response => {
                            this.loading = 0;
                            if (response.status == 200){
                                this.stepTwo = false;
                                if(response.data.setCity){
                                    this.stepThree = true;
                                }else{
                                    showAlert("success","خوش آمدید");
                                    window.location.href = this.indexRoute;
                                }
                            }
                        })
                        .catch(e => {
                            this.loading = 0;
                            showAlert("danger","کد sms شده را درست وارد کنید",3000);
                            console.log(e);
                        })
                },1000);
            },
            setLocation(){
                this.loading = 1;
                axios.post(this.setCityRoute,{
                    city_id:this.city.id
                }).then(response => {
                    this.loading = 0;
                    if (response.status == 200) {
                        showAlert("success","خوش آمدید");
                        window.location.href = this.indexRoute;
                    }else{
                        showAlert("danger",response.data,5000);
                    }
                }).catch(error => {
                    this.loading = 0;
                    showAlert("danger",error.response.data.message,5000);
                })
            },
            countDownTimer() {
                if(this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown =(120 - this.baseCounter());
                        this.countDownTimer();
                    }, 1000)
                }
                else{
                }
            },
            resend(){
                if (this.countDown <= 1)
                {
                    this.loading = 2;
                    setTimeout(()=>{
                        this.countDown = 120;
                        this.setMainTime();
                        this.countDownTimer();
                        showAlert('success',"کد مجدد ارسال شد.",3000);
                        this.loading = 0;
                    },1000);

                }
            },
            changeMobile(){
                this.stepTwo = false;
                this.mobile = "";
                this.code = "";
            },
            setMainTime(){
                localStorage.setItem("baseTime",Math.floor(Date.now()/1000))
            },
            setMobileInLocalStorage(){
                localStorage.setItem("mobile",this.mobile)
            },
            baseCounter(){
                return  Math.floor(Date.now()/1000) - localStorage.baseTime;
            },
            getMobile(){
                return  localStorage.mobile;
            },
            checkLocalTime(){
                if(localStorage.baseTime === null){
                    return false
                }
                else{
                    return localStorage.baseTime
                }
            },
            fetchCities(search ,loading){
                if(search.length > 1){
                    loading(true);
                    axios.get(this.searchCityRoute,{
                        params: {
                            search: search
                        }
                    }).then(response => {
                        loading(true);
                        if(response.status == 200){
                            let data = [];
                            let res = response.data;
                            res.forEach(function(value,index){
                                data[index] = {label:value.name , id:value.id};
                            });
                            this.city_list = data;
                            loading(false)
                        }
                    })
                }
            }
            // changeLoading(e)
            // {
            //     this.loadingBtn = e.target.getAttribute('data-index')
            // }
        },
        components: {
            SimpleButton
        }
    }
</script>

<style scoped>
    .login-signin .custom-control{
        padding-right: 0;
    }
    a#underline{
        color:grey;
    }
    a#underline:hover{
        color: cornflowerblue;
    }
    .cursor-default{
        cursor: default !important;
    }
</style>
