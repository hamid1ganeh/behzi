<template>
    <div>
        <a :href="'#'+this.type" data-toggle="modal" :class="this.type == 'phone' ? 'btn-outline-green' : 'btn-outline-blue'">
            <span :style="this.type == 'phone' ? {color: '#60F688'} : {color: '#6993ff'}" class="h6 pl-1">افزودن </span>
            <svg style="margin-top: -1px;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 46 46"><g transform="translate(-914 -405)"><circle cx="23" cy="23" r="23" transform="translate(914 405)" :fill="this.type == 'phone' ? '#60F688' : '#6993ff'"/><path d="M0,0H31.215" transform="translate(921.393 428.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="3"/><line y2="29" transform="translate(937.5 413.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="3"/></g></svg>
        </a>
        <!--Modal-->
        <div class="modal fade" :id="this.type" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="col-12 text-center row mx-0 pb-5 pt-10">
                        <div class="w-100 text-center mb-3">
                            <img :src="this.logo" width="110" height="110" alt="phone">
                        </div>
                        <h4 class="w-100 text-center mb-10" v-text="this.title"></h4>
                        <form v-if="this.type == 'phone'" action="#" class="w-100">
                            <div class="w-100 d-flex justify-content-center">
                                <div class="col-7">
                                    <form action="#">
                                        <div class="w-100 mb-5">
                                            <input type="text" v-model="name" class="form-control" placeholder="عنوان، بخش، واحد...">
                                            <div class="text-danger w-100" v-if="errors.name" v-text="errors.name[0]"></div>
                                        </div>
                                        <div class="w-100 mb-5">
                                            <input type="text" v-model="number" class="form-control" placeholder="شماره تلفن">
                                            <div class="text-danger w-100" v-if="errors.number" v-text="errors.number[0]"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr style="border-style: dashed">
                            </div>
                            <div class="col-12 row mx-0 px-0">
                                <div class="col-6">
                                    <a @click="this.storePhone" class="btn btn-success font-weight-bold py-3 btn-block" :class="load_btn">افزودن شماره</a>
                                </div>
                                <div class="col-6">
                                    <a data-dismiss="modal" class="btn btn-secondary font-weight-bold py-3 btn-block">انصراف</a>
                                </div>
                            </div>
                        </form>
                        <form v-else-if="this.type == 'social-media'" action="#" class="w-100">
                            <div class="w-100 d-flex justify-content-center">
                                <div class="col-7">
                                    <div class="w-100 mb-5">
                                        <small>نام شبکه اجتماعی</small>
                                        <select class="custom-select" v-model="social_media_type">
                                            <option selected disabled>نوع</option>
                                            <option v-for="socialMedia of this.social_media_list" :key="socialMedia[1]" :value="socialMedia[1]">{{ socialMedia[0] }}</option>
                                        </select>
                                        <div class="text-danger w-100" v-if="errors.type" v-text="errors.type[0]"></div>
                                    </div>
                                    <div class="w-100 mb-5">
                                        <input type="text" v-model="social_media_name" class="form-control" placeholder="عنوان، بخش، واحد..." >
                                        <div class="text-danger w-100" v-if="errors.title" v-text="errors.title[0]"></div>
                                    </div>
                                    <div class="w-100 mb-5">
                                        <input type="text" v-model="value" class="form-control" placeholder="شماره ،آی دی">
                                        <div class="text-danger w-100" v-if="errors.value" v-text="errors.value[0]"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr style="border-style: dashed">
                            </div>
                            <div class="col-12 row mx-0 px-0">
                                <div class="col-6">
                                    <a @click="this.storeSocialMedia" class="btn btn-primary font-weight-bold py-3 btn-block" :class="load_btn">افزودن لینک</a>
                                </div>
                                <div class="col-6">
                                    <a data-dismiss="modal" class="btn btn-secondary font-weight-bold py-3 btn-block">انصراف</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import { PageConnectionType } from '../enums.js';
    export default {
        name: "ConnectionStoreModal",
        props:['type','title','logo','store-route','pageId'],
        data(){
            return{
                name:"",
                number:"",
                load_btn:"",
                errors:[],
                social_media_list: PageConnectionType,
                social_media_type:"",
                social_media_name:"",
                value: ""
            }
        },
        methods:{
            storePhone(){
                axios.post(this.storeRoute,{
                    name: this.name,
                    number: this.number,
                    page_id: this.pageId
                }).then(res => {
                    if(res.data.status){
                        this.load_btn = 'spinner spinner-light spinner-right';
                        location.reload();
                    }
                    else{
                        this.errors = res.data.data.errors;
                        console.log(res.data)
                    }
                }).catch(error =>{
                    this.errors = error.response.data.data.errors;
                });
            },
            storeSocialMedia(){
                axios.post(this.storeRoute,{
                    title: this.social_media_name,
                    value: this.value,
                    page_id: this.pageId,
                    type: this.social_media_type
                }).then(res => {
                    if(res.data.status){
                        this.load_btn = 'spinner spinner-light spinner-right';
                        location.reload();
                    }
                    else{
                        this.errors = res.data.data.errors;
                    }
                }).catch(error =>{
                    this.errors = error.response.data.data.errors;
                });
            }
        }
    }
</script>

<style scoped>
    .btn-outline-green{
        border:1px solid #60F688;
        padding: 7px 9px;
        border-radius: 4px
    }
    .btn-outline-blue{
        border:1px solid #6993ff;
        padding: 7px 9px;
        border-radius: 4px
    }
</style>
