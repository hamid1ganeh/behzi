<template>
    <div>
        <div style="min-height:38px">
                    <span class="rate-panel" dir="ltr">
                        <span v-for="n of 5">
                            <svg @mouseover="lightUp(n)" @mouseout="resetRate()" @click="trigger(n)" :id="n" :key="n"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin-right: -8px" width="38" height="38" viewBox="0 0 571.999 572.852">
                                <defs>
                                    <filter id="Path_102" x="0" y="0" width="571.999" height="572.852" filterUnits="userSpaceOnUse">
                                        <feOffset input="SourceAlpha"/>
                                        <feGaussianBlur stdDeviation="12.5" result="blur"/>
                                        <feFlood flood-opacity="0.451"/>
                                        <feComposite operator="in" in2="blur"/>
                                        <feComposite in="SourceGraphic"/>
                                    </filter>
                                </defs>
                                <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Path_102)">
                                    <path data-name="Path 102" d="M2314.53,2197.07l314.618,34.532L2389.46,2013.11l78.122,321.536,116.939-297.506Z" transform="matrix(0.77, -0.64, 0.64, 0.77, -3004.88, 210.02)" stroke-linecap="round" stroke-linejoin="round" stroke-width="35"/>
                                </g>
                            </svg>
                        </span>
                    </span>
            <a class="btn btn-light btn-sm py-1 mr-2 mt-2" @click="showStars" v-text="button_text">امتیاز دهید</a>
        </div>
        <hr class="my-1 border-bottom-0 border-light">
        <div style="min-width:233px">
            <small class="text-light pr-2 pt-1 float-right">امتیاز {{this.rateNumber }} از ۵</small>
            <img v-for="n in 5-parseInt(rateNumber)" :key="n+5" :src="imageUrl+'/images/static/star-off.svg'"  width="30" height="30"><img v-for="n in parseInt(rateNumber)" :key="n" :src="imageUrl+'/images/static/star.svg'"  width="30" height="30">
        </div>
    </div>
</template>

<script>

    export default {
        name: "RatePanel",
        props:['page','rate','userRate','saveRoute','imageUrl'],
        data(){
            return{
                button_text:'امتیاز دهید',
                rateNumber:this.rate,
                userRateNumber:this.userRate,
                login:false
            }
        },
        created() {
            this.login = window.Laravel.Auth;
        },
        mounted() {
            for(let i=0;i<=this.userRate;i++){
                $('.rate-panel #'+i).addClass('light-up');
            }
        },
        methods:{
            showStars(){
                if(this.login){
                    $('.rate-panel').css('display','inline-block');
                    setTimeout( ()=> {
                        $('.rate-panel').css('opacity',1);
                    }, 400);
                    this.button_text = 'روی ستاره کلیک کنید'
                }else {
                    showAlert('danger','جهت دسترسی ورود یا ثبت‌نام کنید',6000)
                }
            },
            hideStars(){
                $('.rate-panel').css('transition-delay','.8s').css('opacity',0);
                setTimeout( ()=> {
                    this.button_text = 'امتیاز دهید';
                    $('.rate-panel').css('opacity',0).css('display','none');
                }, 1200);
            },
            lightUp(star_id){
                for(let i=0;i<=star_id;i++){
                    $('.rate-panel #'+i).removeClass('light-down').addClass('light-up');
                }
                for(let i=star_id+1;i<=5;i++){
                    $('.rate-panel #'+i).removeClass('light-up').addClass('light-down');
                }
            },
            resetRate(){
                $('.rate-panel svg').removeClass('light-up');
                for(let i=0;i<=this.userRateNumber;i++){
                    $('.rate-panel #'+i).addClass('light-up');
                }
            },
            trigger(rate){
                axios.post(this.saveRoute,{
                        rate: rate
                }).then(response => {
                    if(response.status === 200){
                        $('.rate-panel svg').removeClass('light-up');
                        for(let i=0;i<=rate;i++){
                            $('.rate-panel #'+i).addClass('light-up')
                        }
                        this.rateNumber = response.data.avgRate;
                        this.userRateNumber = rate;
                        showAlert('success', response.data.message, 5000);
                        this.hideStars();
                    }
                    else{
                        showAlert('danger', response.data, 5000);
                    }
                })
                    .catch(error=> {
                        showAlert('danger', response.data, 5000);
                    });
            }
        }
    }
</script>
