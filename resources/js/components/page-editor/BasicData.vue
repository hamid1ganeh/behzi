<template>
    <div id="collapseOne" class="col-12 collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="form-group row pt-4">
            <div class="col-lg-6">
                <label>نام صفحه :</label>
                <input name="name" type="text" class="form-control" v-model="name" placeholder="لطفا نام صفحه را وارد کنید" />
                <span class="form-text text-danger name-error" v-if="errors.name">{{ errors.name[0] }}</span>
            </div>
            <div class="col-lg-6">
                <label class="">دسته بندی</label>
                <div>
                    <select class="form-control selectpicker" name="work_item_id" v-model="category" data-size="7" data-live-search="true">
                        <option v-for="work_items of work_category_list" :value="work_items.id">{{ work_items.name }} ({{ work_items.work_category.name }})</option>
                    </select>
                    <span class="form-text text-danger work-item-error" v-if="errors.work_item_id">{{ errors.work_item_id[0] }}</span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label>توضیحات</label>
                <textarea name="description" v-model="description" type="text" class="form-control"></textarea>
                <span class="form-text text-danger description-error" v-if="errors.description">{{ errors.description[0] }}</span>
            </div>
        </div>
        <div class="col-12 text-right">
            <span @click="updateForm" class="btn btn-success px-20 mb-3" :class="load_spinner">ذخیره</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BasicData",
        props:['name','category','description','workItems','updateRoute'],
        data(){
            return{
                load_spinner: '',
                work_category_list:[],
                errors:[]
            }
        },
        mounted() {
            this.work_category_list = JSON.parse(this.workItems);
        },
        methods:{
            updateForm(){
                this.load_spinner = "spinner spinner-light spinner-right";
                axios.patch(this.updateRoute,{
                    name: this.name,
                    work_item_id: this.category,
                    description: this.description
                }).then(response =>{
                    this.load_spinner ='';
                    if(response.status == 200){
                        this.errors = [];
                        this.$toast.success("اطلاعات جامع با موفقیت بروز رسانی شد");
                    }
                }).catch(err => {
                    this.load_spinner ='';
                    this.errors = err.response.data.errors;
                    this.$toast.error("لطفا مورد مشخص شده پر کنید")
                })
            }
        }
    }
</script>

<style scoped>

</style>