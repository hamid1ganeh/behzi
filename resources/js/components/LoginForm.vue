<template>
    <div class="login-signin">
        <div v-if="this.auth" class="mt-3">
            <p class="text-secondary pt-2">کاربر گرامی هم اکنون شما علاوه بر دسترسی به بانک اطلاعات مشاغل می‌توانید کسب و کار خود را برای بهتر دیده شدن ، در سامانه‌ی بهزی به ثبت برسانید.</p>
            <div class="pt-3 text-center text-md-right">
                <a :href="pagesRoute" class="btn-gradient-blue py-2 px-4 pointer">مشاهده مشاغل</a>
                <a :href="userPanelRoute" class="btn-outline-blue rounded px-3">مدیریت کسب و کار</a>
            </div>
        </div>
        <div class="w-100" v-else>
            <div class="text-center text-muted pt-4 pt-md-5">
                <div v-if="stepThree" class="mb-2">لطفا نام شهر خود را وارد کنید</div>
                <div v-else class="mb-2">جهت ورود شماره تلفن همراه خود را وارد کنید</div>
                <div class="col-12">
                    <input v-if="!stepThree" v-model="mobile" @keyup.enter="!stepTwo && register()" type="text" class="col-12" name="mobile" autocomplete="off" :disabled="stepTwo">
                    <div v-if="!stepThree" class="mobile-icon">
                        <svg width="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100" fill="none"
                             x="0px" y="0px">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M71.2132 28.7868C59.4975 17.0711 40.5025 17.0711 28.7868 28.7868C17.0711 40.5025 17.0711 59.4975 28.7868 71.2132C40.5025 82.9289 59.4975 82.9289 71.2132 71.2132C82.9289 59.4975 82.9289 40.5025 71.2132 28.7868ZM55.9648 34.1226C56.0579 33.7438 55.8999 33.4602 55.6206 33.2243C55.5644 33.181 55.5146 33.1312 55.5016 33.0186C55.325 32.9086 55.1491 32.7974 54.9732 32.6861C54.5542 32.4211 54.1349 32.156 53.7049 31.906C52.9408 31.4666 52.1117 31.3648 51.2437 31.4882C50.1311 31.6527 49.1029 32.0532 48.105 32.5489C46.9988 33.0965 46.0659 33.8433 45.3277 34.8499C44.674 35.7374 44.2129 36.718 43.7497 37.7094C42.9791 39.3502 42.2777 41.0127 41.8535 42.7833C41.1954 45.5065 40.9876 48.2686 41.0569 51.061C41.1153 53.2624 41.3773 55.4422 41.9249 57.5787C42.531 59.9295 43.5614 62.1115 44.6892 64.2437C45.2693 65.352 46.0767 66.3023 47.1547 66.9863C48.3409 67.7396 49.6051 68.2981 50.9926 68.5427C51.497 68.6271 52.049 68.6596 52.5512 68.5686C53.7569 68.3457 54.7288 67.6552 55.6228 66.8564C55.941 66.5728 56.0579 66.2525 55.954 65.8498C55.8856 65.5771 55.8195 65.3032 55.7533 65.0289C55.6372 64.5478 55.5208 64.0654 55.3912 63.5856C55.2657 63.1201 55.1249 62.6584 54.9841 62.1963C54.6999 61.2641 54.4154 60.3307 54.2547 59.3624C54.238 59.2583 54.2004 59.1543 54.1631 59.0513C54.1523 59.0214 54.1416 58.9916 54.1314 58.9619C53.9733 58.4835 53.6443 58.2065 53.1335 58.1632C52.8845 58.1394 52.6269 58.1156 52.378 58.1307C51.9309 58.1569 51.4859 58.1867 51.0413 58.2165C50.4569 58.2557 49.8733 58.2948 49.2869 58.3255C48.1742 58.3861 47.8452 58.187 47.5508 57.1263C47.2391 56.0007 46.9534 54.8621 46.7348 53.7127C46.1611 50.7363 46.3148 47.7729 47.0486 44.8398C47.2358 44.095 47.4575 43.3656 47.6793 42.6353C47.6935 42.5887 47.7077 42.5421 47.7218 42.4954C47.8777 41.9889 48.2587 41.7422 48.7695 41.7508C49.1697 41.7588 49.5707 41.7821 49.972 41.8055C50.2263 41.8203 50.4807 41.8351 50.735 41.8461C50.9394 41.8551 51.1442 41.8657 51.3491 41.8764C51.93 41.9066 52.512 41.9369 53.088 41.9305C53.6335 41.9261 53.9885 41.5885 54.1508 41.0625L54.1605 41.0253C54.2203 40.7968 54.2815 40.5627 54.3348 40.3286C54.3552 40.2333 54.3718 40.1366 54.3884 40.0399C54.4179 39.8687 54.4474 39.6975 54.4972 39.5342C54.6135 39.1248 54.7356 38.7174 54.8577 38.3102C55.0241 37.7551 55.1903 37.2005 55.3414 36.6422C55.5508 35.8704 55.7345 35.095 55.9178 34.3209C55.9335 34.2548 55.9491 34.1887 55.9648 34.1226Z"
                                  fill="#007BFF"></path>
                        </svg>
                    </div>
                    <div v-if="!stepThree && !stepTwo">
                        <label class="mt-1 mb-0 small policy-agreement">
<!--                            با ورود<a href="/policies" class="mr-1 pb-1" style="color:lightgrey">قوانین و مقررات</a> را قبول میکنم.-->

                            <figure class="custom-control custom-checkbox">
                                <input type="checkbox" v-model="policy" class="custom-control-input" id="policy">
                                <label class="custom-control-label mt-1" for="policy">
                                    با ورود<a href="/policies" class="mr-1" style="color:lightgrey">قوانین و مقررات</a> را قبول میکنم.
                                </label>
                                <span></span>
                            </figure>

                        </label>
                    </div>
                    <span v-if="stepTwo" @click="changeMobile" class="phone-editor small px-2 py-1 text-white pointer">تغییر شماره</span>
                </div>
                <div class="col-12 mt-3" v-if="stepTwo">
                    <input v-model="code" @keyup.enter="stepTwo && login()" type="text" class="col-12" name="code" autocomplete="off" placeholder="کد ارسالی">
                    <div class="code-icon">
                        <svg width="45" fill="#007BFF" xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve"><switch><foreignObject requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0" y="0" width="1" height="1"/><g i:extraneous="self"><g><path d="M5273.1,2400.1v-2c0-2.8-5-4-9.7-4s-9.7,1.3-9.7,4v2c0,1.8,0.7,3.6,2,4.9l5,4.9c0.3,0.3,0.4,0.6,0.4,1v6.4     c0,0.4,0.2,0.7,0.6,0.8l2.9,0.9c0.5,0.1,1-0.2,1-0.8v-7.2c0-0.4,0.2-0.7,0.4-1l5.1-5C5272.4,2403.7,5273.1,2401.9,5273.1,2400.1z      M5263.4,2400c-4.8,0-7.4-1.3-7.5-1.8v0c0.1-0.5,2.7-1.8,7.5-1.8c4.8,0,7.3,1.3,7.5,1.8C5270.7,2398.7,5268.2,2400,5263.4,2400z"/><path d="M5268.4,2410.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H5268.4z"/><path d="M5272.7,2413.7h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2414.1,5273.3,2413.7,5272.7,2413.7z"/><path d="M5272.7,2417h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2417.5,5273.3,2417,5272.7,2417z"/></g><g><path d="M93.2,44.4H92v-5.8c0-5.3-4.3-9.7-9.7-9.7h-3.5c-5.3,0-9.7,4.3-9.7,9.7v5.8h-1.2c-2.4,0-4.3,1.9-4.3,4.3v18     c0,2.4,1.9,4.3,4.3,4.3h25.3c2.4,0,4.3-1.9,4.3-4.3v-18C97.5,46.4,95.6,44.4,93.2,44.4z M83.4,63.4c0.1,0.5-0.2,0.9-0.7,0.9h-4.3     c-0.5,0-0.8-0.5-0.7-0.9l1.4-5.6c-1.2-0.5-2-1.7-2-3.1c0-1.9,1.5-3.4,3.4-3.4s3.4,1.5,3.4,3.4c0,1.4-0.8,2.6-2,3.1L83.4,63.4z      M86.2,44.4H74.9v-5.8c0-2.1,1.7-3.9,3.9-3.9h3.5c2.1,0,3.9,1.7,3.9,3.9V44.4z"/><path d="M22.8,49c-0.4-0.7-1.3-0.9-2-0.5l-2.5,1.4V47c0-0.8-0.6-1.4-1.4-1.4s-1.4,0.6-1.4,1.4v2.9l-2.5-1.4     c-0.7-0.4-1.6-0.2-2,0.5c-0.4,0.7-0.2,1.6,0.5,2l2.5,1.4l-2.5,1.4c-0.7,0.4-0.9,1.3-0.5,2c0.3,0.5,0.7,0.7,1.2,0.7     c0.2,0,0.5-0.1,0.7-0.2l2.5-1.4v2.9c0,0.8,0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4v-2.9l2.5,1.4c0.2,0.1,0.5,0.2,0.7,0.2     c0.5,0,1-0.3,1.2-0.7c0.4-0.7,0.2-1.6-0.5-2l-2.5-1.4l2.5-1.4C22.9,50.5,23.2,49.6,22.8,49z"/><path d="M40.3,49c-0.4-0.7-1.3-0.9-2-0.5l-2.5,1.4V47c0-0.8-0.6-1.4-1.4-1.4c-0.8,0-1.4,0.6-1.4,1.4v2.9l-2.5-1.4     c-0.7-0.4-1.6-0.2-2,0.5c-0.4,0.7-0.2,1.6,0.5,2l2.5,1.4L29,53.8c-0.7,0.4-0.9,1.3-0.5,2c0.3,0.5,0.7,0.7,1.2,0.7     c0.2,0,0.5-0.1,0.7-0.2l2.5-1.4v2.9c0,0.8,0.6,1.4,1.4,1.4c0.8,0,1.4-0.6,1.4-1.4v-2.9l2.5,1.4c0.2,0.1,0.5,0.2,0.7,0.2     c0.5,0,1-0.3,1.2-0.7c0.4-0.7,0.2-1.6-0.5-2l-2.5-1.4l2.5-1.4C40.4,50.5,40.7,49.6,40.3,49z"/><path d="M57.8,49c-0.4-0.7-1.3-0.9-2-0.5l-2.5,1.4V47c0-0.8-0.6-1.4-1.4-1.4c-0.8,0-1.4,0.6-1.4,1.4v2.9l-2.5-1.4     c-0.7-0.4-1.6-0.2-2,0.5c-0.4,0.7-0.2,1.6,0.5,2l2.5,1.4l-2.5,1.4c-0.7,0.4-0.9,1.3-0.5,2c0.3,0.5,0.7,0.7,1.2,0.7     c0.2,0,0.5-0.1,0.7-0.2l2.5-1.4v2.9c0,0.8,0.6,1.4,1.4,1.4c0.8,0,1.4-0.6,1.4-1.4v-2.9l2.5,1.4c0.2,0.1,0.5,0.2,0.7,0.2     c0.5,0,1-0.3,1.2-0.7c0.4-0.7,0.2-1.6-0.5-2l-2.5-1.4l2.5-1.4C57.9,50.5,58.2,49.6,57.8,49z"/><path d="M64.7,40c0-0.8-0.6-1.4-1.4-1.4H10.4c-4.4,0-7.9,3.6-7.9,7.9v11.7c0,4.4,3.6,7.9,7.9,7.9h47.4c0.8,0,1.4-0.6,1.4-1.4     c0-0.8-0.6-1.4-1.4-1.4H10.4c-2.8,0-5.1-2.3-5.1-5.1V46.5c0-2.8,2.3-5.1,5.1-5.1h52.9C64.1,41.5,64.7,40.8,64.7,40z"/></g></g></switch></svg>
                    </div>
                </div>
                <div class="col-12 mt-3" v-if="stepThree">
                    <v-select v-model="city" @search="fetchCities" :options="this.city_list" dir="rtl">
                        <span slot="no-options">موردی یافت نشد</span>
                    </v-select>
                </div>

                <div class="col-12 text-center mt-3 mb-3 mb-lg-0">
                <span data-index="1" @click="stepThree ? setLocation() : stepTwo ? login() : register()" class="btn btn-gradient-blue py-2 px-5 position-relative">
                    <i v-if="loading==1" style='position:absolute;left:7px;top:8px'><svg width='23' class='spin-animation' fill='white' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 16 16' style='enable-background:new 0 0 16 16;' xml:space='preserve'><path d='M8,14c-3.3,0-6-2.7-6-6s2.7-6,6-6c0.4,0,0.8,0.3,0.8,0.8S8.4,3.5,8,3.5c-2.5,0-4.5,2-4.5,4.5s2,4.5,4.5,4.5s4.5-2,4.5-4.5  c0-0.4,0.3-0.8,0.8-0.8S14,7.6,14,8C14,11.3,11.3,14,8,14z'/></svg></i>
                    <span v-if="stepThree">ثبت شهر</span>
                    <span v-else>پردازش</span>
                </span>
                <span data-index="2" v-if="stepTwo" @click="resend()" style="color: #3a92fb" class="btn-outline-blue rounded" :class="loading==2 ? btnStyleLoading : btnStyle">ارسال مجدد <span class="counter-down">({{ countDown}})</span></span>
                </div>
            </div>
<!--            <div class="mt-4">-->
<!--                <label class="custom-control custom-checkbox">-->
<!--                    <input type="checkbox" v-model="policy" class="custom-control-input" id="policy">-->
<!--                    <label class="opacity-70 mr-4 custom-control-label" for="policy">-->
<!--                        <a href="/policies" class="font-weight-bold text-white mr-1 pb-1" id="underline">قوانین و مقررات</a> را قبول دارم.-->
<!--                    </label>-->
<!--                    <span></span>-->
<!--                </label>-->
<!--            </div>-->
        </div>
    </div>
</template>

<script>
    import SimpleButton from "./elements/SimpleButton";

    export default {
        props: ['registerRoute','loginRoute','indexRoute','loadingGif','searchCityRoute','setCityRoute','userPanelRoute','pagesRoute'],
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
                policy: true,
                city_list: [],
                auth: false
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
            if(window.Laravel.Auth){
                this.auth = true
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
                    showAlert("danger",error.response.data.errors.city_id[0],5000);
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

<style>
    .btn-outline-blue{
        border:2px solid #3a92fb;
        color: #3a92fb;
        padding-top:6px !important;
        padding-bottom:6px !important;
    }
    .btn-outline-blue:hover {
        background-color: rgba(58, 146, 251, 0.08);
    }
    input[disabled]{
        background-color: #f7f7f7;
        cursor: not-allowed;
    }
    .phone-editor{
        position: absolute;
        left: 1.7rem;
        top: 11px;
        background-color: #5f99cf;
        border-radius: 7px;
    }
    .login-signin ::-webkit-input-placeholder { /* Edge */
        color: #88a6f9;
    }

    .login-signin :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #88a6f9;
    }

    .login-signin ::placeholder{
        color: #88a6f9;
    }
    .counter-down{
        display: inline-block;
        width:29px;
    }
    .vs__dropdown-toggle{
        height:2.8rem;
    }
    .policy-agreement,.policy-agreement a{
        color: lightgrey;
    }
    .policy-agreement a:hover{
        color: lightskyblue !important;
    }
    .custom-control-label:before, .custom-control-label:after{
        right: -1.5rem;
        top: 0;
    }
    .login-signin .custom-control{
        padding-right:1.7rem;
        padding-left:0 !important;
    }
    .login-signin .custom-control-input:checked ~ .custom-control-label:before {
        border-color: transparent;
        background-color: rgba(111, 178, 242, 0.61);
    }
</style>
