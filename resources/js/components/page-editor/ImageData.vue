<template>
    <div id="collapse2" class="col-12 collapse" aria-labelledby="heading2" data-parent="#accordion">
        <div class="form-group row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="col-6 my-5">
                    <cropper-single cropped-width="720" cropped-height="360" :current-image="image"></cropper-single>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <span @click="updateForm" class="btn btn-success px-20 mb-3" :class="load_spinner">ذخیره</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImageData",
        props:['image','updateRoute'],
        data(){
            return{
                load_spinner: ''
            }
        },
        methods:{
            updateForm(){
                if($('[name="original_image"]')[0].value){
                    this.load_spinner = "spinner spinner-light spinner-right";
                    axios.patch(this.updateRoute,{
                        original_image: $('[name="original_image"]')[0].value,
                        updated_image: $('[name="updated_image"]')[0].value
                    }).then(response =>{
                        if(response.status == 200){
                            this.load_spinner = '';
                            this.$toast.success("تصویر با موفقیت بروز رسانی شد");
                        }
                    }).catch(err => {
                        this.load_spinner = '';
                        this.$toast.error("اشکال در بروز رسانی");
                    })
                }else{
                    this.$toast.info("تصویر جدیدی انتخاب نشد!");
                }
            }
        }
    }
</script>

<style scoped>

</style>