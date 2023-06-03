<template>
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-clock mr-2"></i>ساعت کاری</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">

                    <div data-index="3" v-if="loading==3" class="spinner spinner-primary mr-10"></div>
                </div>
            </div>
        </div>
        <div class="card-body px-1 px-md-6" v-if="loading!=3">
            <div>
                <div v-for="(saturday,index) in this.saturdays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    شنبه&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success" >
                                        <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index != 0">
                                        <button @click="removeSWorkTime(saturdays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(saturdays,1)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.sundays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    یکشنبه&nbsp;&nbsp;&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success">
                                        <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(sundays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(sundays,2)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.mondays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    دوشنبه&nbsp;&nbsp;&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success">
                                        <input type="checkbox" v-model="saturday.enable"  :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(mondays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(mondays,3)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.tuesdays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    سه شنبه&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success">
                                        <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(tuesdays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(tuesdays,4)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.wednesdays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    چهارشنبه&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success">
                                        <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(wednesdays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(wednesdays,5)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.thursdays">
                    <div class="row" :class="index!==0 && 'mt-m'" >
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" v-if="index==0">
                                    پنجشنبه&nbsp;&nbsp;
                                    <label class="checkbox checkbox-single checkbox-light-success">
                                        <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                        <span></span>
                                    </label>
                                </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    آغاز&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                    <div class="input-group-prepend">
                                <span class="input-group-text px-2 px-md-6">
                                    پایان&nbsp;
                                </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(thursdays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(thursdays,6)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="(saturday,index) in this.fridays">
                    <div class="row" :class="index!==0 && 'mt-m'">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" v-if="index==0">
                                            جمعه&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox checkbox-single checkbox-light-success">
                                                <input type="checkbox" v-model="saturday.enable" :checked="saturday.enable">
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="input-group-text bg-white" style="min-width:93px" v-else>
                                           نیمه ی دوم :
                                        </span>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text px-2 px-md-6">
                                            آغاز&nbsp;
                                        </span>
                                            </div>
                                            <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.start" dir="ltr"></vue-timepicker>
                                            <div class="input-group-prepend">
                                        <span class="input-group-text px-2 px-md-6">
                                            پایان&nbsp;
                                        </span>
                                    </div>
                                    <vue-timepicker hide-clear-button hour-label="ساعت" minute-label="دقیقه" :minute-interval="5" class="form-control p-0" v-model="saturday.finish" dir="ltr"></vue-timepicker>
                                    <div class="input-group-append" v-if="index!=0">
                                        <button @click="removeSWorkTime(fridays,index,saturday)" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="input-group-append" v-if="index==0">
                                        <button @click="addWorkTime(fridays,7)" class="btn btn-primary" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span data-index="1" @click="save()" class="px-13 px-md-15" :class="loading==1 ? btnStyleLoading : btnPrimaryStyle"><i class="fa fa-save"></i> ذخیره</span>
                    <span data-index="2" @click="ignore()" class="px-13 px-md-15" :class="loading==2 ? btnStyleLoading : btnDarkStyle">انصراف</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .mt-m{
        margin-top:-19px;
    }
    .clock-picker__input, .clock-picker__canvas{
        text-align: center;
        border: none;
        cursor:pointer;
    }
    .clock-picker__dialog-header{
        background-color: #008b9c !important;
    }
    .clock-picker__dialog-actions button{
        color: rgba(0, 100, 148, 0.85) !important;
    }
    /**/
    .display-time{
        width:100% !important;
        height:100% !important
    }
    .vue__time-picker input.display-time{
        text-align: right;
        padding: .3em 1.5rem;
        border:none
    }
    .vue__time-picker .dropdown .select-list,.dropdown{
        width:100% !important;
    }
    .vue__time-picker .dropdown ul li:not([disabled]).active,
    .vue__time-picker .dropdown ul li:not([disabled]).active:focus,
    .vue__time-picker .dropdown ul li:not([disabled]).active:hover{
        background: #00ecbc;
    }
    .checkbox.checkbox-light-success > input:checked ~ span{
        background-color: #15DD7F !important;
    }
    @media(max-width:992px){
        .input-group-append .btn{
            padding:0 3px 0 0 !important;

        }
    }

</style>
<script>
    // import VueClockPicker from '@pencilpix/vue2-clock-picker';
    // import '@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.min.css';
    import VueTimepicker from 'vue2-timepicker';
    import 'vue2-timepicker/dist/VueTimepicker.css'
    export default {
        components: {
            // VueClockPicker,
            VueTimepicker
        },
        props: ['pageId','saveRoute','updateRoute','successRedirectRoute','getPageWorkTimesRoute'],
        mounted() {

        },
        data(){
            return{
                saturdays:[
                    {
                        "id":1,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                sundays:[
                    {
                        "id":2,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                mondays:[
                    {
                        "id":3,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                tuesdays:[
                    {
                        "id":4,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                wednesdays:[
                    {
                        "id":5,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                thursdays:[
                    {
                        "id":6,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                fridays:[
                    {
                        "id":7,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0,
                    }
                ],
                deleteList:[],
                isUpdate : false,
                //--
                loading:0,
                btnPrimaryStyle: "btn btn-primary mr-2",
                btnDarkStyle: "btn btn-light border mr-2",
                btnStyleLoading: "btn btn-primary mr-2 spinner spinner-light spinner-right"
            }
        },
        created() {
            this.getPageWorkTimes();
        },
        methods : {
            addWorkTime(list,id,ev) {
                if (list.length < 2)
                {
                    list.push({
                        "id":id,
                        "enable":true,
                        "start":"09:00",
                        "finish":"16:00",
                        "rowId":0
                    });
                }
            },
            initWorkTime(list,id,object) {
                // console.log(object);
                if (list.length < 2)
                {
                    list.push({
                        "id":id,
                        "enable":object.status,
                        "start":object.startTime,
                        "finish":object.endTime,
                        "rowId":object.id,
                    });
                }
            },
            removeSWorkTime(list,id,object) {
                if (list.length>1)
                {
                    list.splice(id, 1);
                    if (object.rowId != 0)
                        this.deleteList.push(object.rowId);
                }
            },
            resetWorkTime(list,id) {
                    list.splice(id, 1);
            },
            getPageWorkTimes()
            {
                this.loading = 3;
                setTimeout(()=>{
                    axios.get(this.getPageWorkTimesRoute,{
                    })
                        .then(response => {
                            let workTimes = response.data.workTimes;
                            if(workTimes.length > 0)
                            {
                                console.log('delete');
                                this.resetWorkTime(this.saturdays,0);
                                this.resetWorkTime(this.sundays,0);
                                this.resetWorkTime(this.mondays,0);
                                this.resetWorkTime(this.tuesdays,0);
                                this.resetWorkTime(this.wednesdays,0);
                                this.resetWorkTime(this.thursdays,0);
                                this.resetWorkTime(this.fridays,0);
                                //delete default object from week days and add fetch days to that object
                                for(let i=0;i<workTimes.length;i++)
                                {
                                    switch (workTimes[i].week_day_id)
                                    {
                                        case 1:
                                            this.initWorkTime(this.saturdays,1,workTimes[i]);
                                            break;
                                        case 2:
                                            this.initWorkTime(this.sundays,2,workTimes[i]);
                                            break;
                                        case 3:
                                            this.initWorkTime(this.mondays,2,workTimes[i]);
                                            break;
                                        case 4:
                                            this.initWorkTime(this.tuesdays,4,workTimes[i]);
                                            break;
                                        case 5:
                                            this.initWorkTime(this.wednesdays,5,workTimes[i]);
                                            break;
                                        case 6:
                                            this.initWorkTime(this.thursdays,6,workTimes[i]);
                                            break;
                                        case 7:
                                            this.initWorkTime(this.fridays,7,workTimes[i]);
                                            break;
                                    }
                                }
                                this.isUpdate = true
                            }
                            else{
                                //show default
                                this.isUpdate = false
                            }
                            this.loading = 0;
                        })
                        .catch(e => {
                            this.loading = 0;
                            this.$toast.error("مشکل در سرور دوباره تلاش کنید.");
                        })
                },1000);
            },
            save() {
                this.loading = 1;
                setTimeout(()=>{
                    axios.post(this.saveRoute,{
                        'weekDays':[
                            this.saturdays,
                            this.sundays,
                            this.mondays,
                            this.tuesdays,
                            this.wednesdays,
                            this.thursdays,
                            this.fridays,
                        ],
                        'deleteList':this.deleteList,
                        'isUpdate':this.isUpdate
                    })
                        .then(response => {
                            this.loading = 0;
                            window.location.href = this.successRedirectRoute;
                            this.$toast.info("زمان های کاری با موفقیت ذخیره شد.",);
                        })
                        .catch(e => {
                            this.loading = 0;
                            this.$toast.error("اطلاعات را درست وارد کنید.");
                        })
                },1000);
            },
            ignore() {
                this.loading = 2;
                setTimeout(()=>{
                    this.loading = 0;
                    window.location.href = this.successRedirectRoute;
                },1000);
            },
        }
    }
</script>
