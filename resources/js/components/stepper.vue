<template>
    <div class="col-12 stepper position-relative px-0 px-md-3">
        <vue-good-wizard
                ref="wizard"
                :steps="steps"
                :onNext="nextClicked"
                :onBack="backClicked"
                previousStepLabel="مرحله قبل"
                nextStepLabel="مرحله بعد"
                finalStepLabel="ذخیره">
            <div slot="page1">
                <div :class="loading==1 ? 'white-div d-flex justify-content-center align-items-center' : ''">
                    <img :class="loading==1 ? 'd-block' : 'd-none'" :src="this.base_url+'images/static/load.gif'" id="loading" height="70">
                </div>
                <div class="col-12 row mx-0 pt-8 px-0 px-md-4">
                    <div class="col-lg-8 row mx-0 px-0 px-md-4 order-1 order-md-0">
                        <div class="col-lg-6 text-left"><label>نام صفحه:</label>
                            <input name="name" type="text" v-model="name" placeholder="لطفا نام صفحه را وارد کنید" value=""
                                   class="form-control">
                            <span class="form-text text-danger" v-if="errors.name" v-text="errors.name[0]"></span>
                        </div>

                        <div class="col-lg-6 text-left">
                            <label>دسته بندی:</label>
                            <div>
                                <v-select v-model="category" @search="fetchCategory" :options="this.category_list" dir="rtl">
                                    <span slot="no-options">موردی یافت نشد</span>
                                </v-select>
                                <!--<div class="dropdown">
                                    <select class="form-control" v-model="category">
                                        <option value="">انتخاب ...</option>
                                        <option v-for="work_items of work_category_list" :value="work_items.id">{{ work_items.name }} ({{ work_items.work_category.name }})</option>
                                    </select>
                                </div>-->
                            </div>
                            <span class="form-text text-danger" v-if="errors.work_item_id" v-text="errors.work_item_id[0]"></span>
                        </div>

                        <div class="col-lg-12 text-left pt-5"><label>توضیحات :</label>
                            <textarea cols="30" rows="5" class="form-control line-height-2" v-model="descript"></textarea>
                            <span class="form-text text-danger" v-if="errors.description" v-text="errors.description[0]"></span>
                        </div>

                    </div>

                    <div class="col-lg-4 order-0 order-md-1">
                        <img :src="this.base_url+'images/static/job-intro.png'" class="img-fluid" alt="165">
                        <h3 class="h1 text-primary pt-3">معرفی شغل</h3>
                    </div>
                </div>
            </div>
            <div slot="page2">
                <div :class="loading==1 ? 'white-div d-flex justify-content-center align-items-center' : ''">
                    <img :class="loading==1 ? 'd-block' : 'd-none'" :src="this.base_url+'images/static/load.gif'" id="loading" height="70">
                </div>
                <div class="col-12 row mx-0 pt-8 px-0 px-md-4">
                    <div class="col-lg-8 row mx-0 my-auto order-1 order-md-0">

                        <div class="col-lg-12 text-left pt-5"><label>لطفا تصویری مناسب معرفی شغل خود بارگذاری کنید :</label>
                            <!--todo: dont forget css and js links for cropper -->

                            <div class="w-100">
                                <div class="file-pond text-center py-3" @click="upload()">
                                    <div><i class="fa fa-upload fa-sm px-2"></i>آپلود تصویر</div>
                                    <img :src="this.currentImage" id="upload-preview" :style="{height: preview_image_height}"
                                         class="w-75 border border-white border-3 shadow mt-3 mb-4 rounded">
                                </div>
                                <div class="text-danger" v-if="errors.updated_image" v-text="errors.updated_image[0]"></div>
                                <input type="file" hidden class="image-input" accept=".png, .jpg, .jpeg" @change="readURL">
                                <input type="hidden" v-model="this.original_image" name="original_image" disabled>
                                <input type="hidden" v-model="this.updated_image" name="updated_image" disabled>
                                <!-- Start Modal for cropper -->
                                <div class="modal fade" id="cropper_modal" tabindex="-1" role="dialog" data-backdrop="static"
                                     data-keyboard="false" aria-labelledby="CropperTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ویرایش تصویر</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pb-0">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <img id="image" src="" class="img-fluid"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0 border-0">
                                                <div class="col-12 px-0 row mx-0 justify-content-center">
                                                    <div class="row mx-0 pb-5">
                                                        <div id="cropper-buttons">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary mb-3" data-method="setDragMode"
                                                                        data-option="move">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt"></span>
                                        </span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary mb-3" data-method="setDragMode"
                                                                        data-option="crop">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-crop-alt"></span>
                                        </span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary mb-3" data-method="zoom"
                                                                        data-option="0.1" title="Zoom In">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-search-plus"></span>
                                        </span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary mb-3" data-method="zoom"
                                                                        data-option="-0.1" title="Zoom Out">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-search-minus"></span>
                                        </span>
                                                                </button>
                                                            </div>

                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary mb-3" data-method="rotate"
                                                                        data-option="-45">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-undo-alt"></span>
                                        </span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary mb-3" data-method="rotate"
                                                                        data-option="45">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-redo-alt"></span>
                                        </span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary mb-3" data-method="scaleX"
                                                                        data-option="-1">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt-h"></span>
                                        </span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary mb-3" data-option="-1">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt-v"></span>
                                        </span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group">

                                                            </div>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-secondary mb-3 py-1" data-method="reset">
                                            <span data-toggle="kt-tooltip">
                                                <span class="fa fa-sync-alt"></span><span class="px-2"
                                                                                          style="font-size: 15px">بازیابی</span>
                                            </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 px-1">
                                                        <button type="button" class="btn btn-success w-100 showPreview">ذخیره</button>
                                                    </div>
                                                    <div class="col-6 px-1">
                                                        <button type="button" class="btn btn-secondary w-100 removeCropper"
                                                                data-dismiss="modal">انصراف
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="form-text text-danger"></span>
                        </div>

                    </div>

                    <div class="col-lg-4 order-0 order-md-1">
                        <img :src="this.base_url+'images/static/upload.png'" class="img-fluid px-3" alt="165">
                        <h3 class="h1 text-primary pt-3">آپلود تصویر</h3>
                    </div>
                </div>
            </div>
            <div slot="page3">
                <div :class="loading==1 ? 'white-div d-flex justify-content-center align-items-center' : ''">
                    <img :class="loading==1 ? 'd-block' : 'd-none'" :src="this.base_url+'images/static/load.gif'" id="loading" height="70">
                </div>
                <div class="col-12 row mx-0 pt-8 px-0 px-md-4">
                    <div class="col-lg-8 row mx-0 px-0 px-md-3 order-1 order-md-0">

                        <div class="col-lg-12 text-left">
                            <label>شهر و استان</label>
                            <div>
                                <v-select v-model="city" @search="fetchCity" :options="this.cities_list" dir="rtl">
                                    <span slot="no-options">موردی یافت نشد</span>
                                </v-select>
<!--                                <div class="dropdown">-->
<!--                                    <select class="form-control" v-model="city">-->
<!--                                        <option value="" disabled>انتخاب ...</option>-->
<!--                                        <option v-for="city of cities_list" :value="city.id">{{ city.province.name }} ({{ city.name }})</option>-->
<!--                                    </select>-->
<!--                                </div>-->
                            </div>
                            <span class="form-text text-danger" v-if="errors.city_id" v-text="errors.city_id[0]"></span>
                        </div>
                        <div class="col-lg-12 text-left pt-5"><label>آدرس</label>
                            <textarea cols="30" rows="1" class="form-control" v-model="address"></textarea>
                            <span class="form-text text-danger" v-if="errors.address" v-text="errors.address[0]"></span>
                        </div>
                        <div class="col-lg-12 px-0 row mx-0 text-left pt-5">
                            <div class="col-6">
                                <label>عرض جغرافیایی</label>
                                <input name="lat" id="lat" type="text" v-model="lat" class="form-control" placeholder="عرض جغرافیایی را وارد یا از نقشه انتخاب کنید." value=""/>
                                <span class="form-text text-danger" v-if="errors.lat" v-text="errors.lat[0]"></span>
                            </div>
                            <div class="col-6">
                                <label>طول جغرافیایی</label>
                                <input name="lng" id="lng" type="text" v-model="long" class="form-control" placeholder="طول جغرافیایی را وارد یا از نقشه انتخاب کنید." value=""/>
                                <span class="form-text text-danger" v-if="errors.lng" v-text="errors.lng[0]"></span>
                            </div>
                            <div class="col-md-12 pt-2">
                                <span id="reset_map" class="btn bg-warning-o-95 bg-hover-warning-o-10 text-white show-map-btn" title="بارگذاری مجدد">
                                    <i class="flaticon2-reload text-white" style="padding-left: 0"></i>
                                </span>
                                <div id="my-map" class="rounded"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 my-auto order-0 order-md-1">
                        <img :src="this.base_url+'images/static/set-location.png'" class="img-fluid" alt="165">
                        <h3 class="h1 text-primary pt-3">موقعیت مکانی</h3>
                    </div>
                </div>
            </div>

        </vue-good-wizard>
    </div>
</template>

<script>
    import "vue-select/src/scss/vue-select.scss";
    let cropper;
    export default {

        props:['validate1-route','validate2-route','validate3-route','workItems','searchWorkItemsRoute','provinces','searchCityRoute'],
        data() {
            return {
                name:'',
                category:'',
                address:'',
                city:'',
                descript:'',
                lat:'',
                long:'',
                croppedWidth:720, croppedHeight:360, currentImage:'',
                original_image : '',
                updated_image : '',
                errors: [],
                loading: 0,
                valid: false,
                category_list:[],
                base_url: '',
                cities_list:[],
                preview_image_height: '0px',
                steps: [
                    {
                        label: 'معرفی کلی',
                        slot: 'page1',
                    },
                    {
                        label: 'انتخاب تصویر',
                        slot: 'page2',
                    },
                    {
                        label: 'موقعیت مکانی',
                        slot: 'page3',
                    }
                ]
            };
        },
        mounted() {
            this.fetchAllCategories();
            this.base_url = window.Laravel.assets;
        },
        methods: {
            nextClicked(currentPage) {
                const _this = this;
                if(currentPage == 0){
                    this.onStep1().then(function(isValid) {
                        if (isValid)
                            _this.$refs.wizard.goNext(true);
                    });
                }
                if(currentPage == 1){
                    this.onStep2().then(function(isValid) {
                        if (isValid)
                            _this.$refs.wizard.goNext(true);
                    });
                }
                if(currentPage == 2){
                    this.onStep3().then(function(isValid) {
                        if (isValid){
                            _this.$refs.wizard.goNext(true);
                        }
                    });
                    return false;
                }
                //return false if you want to prevent moving to next page
            },
            backClicked(currentPage) {
                return true; //return false if you want to prevent moving to previous page
            },

            onStep1(){
                this.loading = 1;
                // let categories = [];
                // this.category.map((item,index)=>{
                //     categories[index] = item.id;
                // });
                return  axios.post(this.validate1Route,{
                    name : this.name,
                    work_item_id : this.category.id,
                    description : this.descript
                })
                    .then(res => {
                        this.loading = 0;
                        if(res.data.status){
                            this.errors = [];
                            return true
                        }
                        else{
                            this.errors = res.data.data.errors;
                            console.log(this.errors);
                            return false
                        }
                    })
                    .catch((error)=> {
                        this.loading = 0;
                        // showAlert('danger',error,5000);
                        return false;
                    });
            },
            onStep2(){
                this.loading = 1;
                return axios.post(this.validate2Route,{
                    original_image : this.original_image,
                    updated_image : this.updated_image
                })
                    .then(res => {
                        this.loading = 0;
                        if(res.data.status){
                            setTimeout(this.showMap,2000);
                            this.errors = [];
                            console.log(res.data);
                            return true
                        }
                        else{
                            this.errors = res.data.data.errors;
                            return false
                        }
                    })
                    .catch((error)=> {
                        this.loading = 0;
                        // showAlert('danger',error,5000);
                        return false;
                    });
            },
            onStep3(){
                this.loading = 1;
                return  axios.post(this.validate3Route,{
                    name : this.name,
                    work_item_id : this.category.id,
                    description : this.descript,
                    original_image : this.original_image,
                    updated_image : this.updated_image,
                    city_id : this.city.id,
                    address : this.address,
                    lat : this.lat,
                    lng : this.long,
                })
                    .then(res => {
                        if(res.data.status){
                            this.errors = [];
                            this.pageId = res.data.page.id;
                            this.$toast.success(res.data.message);
                            window.location.href = res.data.nextUrl;
                            // return true
                        }
                        else{
                            this.errors = res.data.data.errors;
                            this.loading = 0;
                            return false;
                        }
                    })
                    .catch((error)=> {
                        this.loading = 0;
                        // showAlert('danger',error,5000);
                        return false;
                    });
            },
            showMap(){
                document.getElementById('my-map').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
                let osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
                        ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">BEHZI</a>',
                    osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
                // let myMap;
                let lat = '37.2465557';
                let long = '49.5437885';
                // myMap = new L.Map('map', {zoomControl: true}).setView([lat, long], 10);
                // myMap.setMaxBounds([[84.67351256610522, -174.0234375], [-58.995311187950925, 223.2421875]]);
                let myMap= new L.Map('map');
                myMap.setView(new L.LatLng(lat,long), 10);
                myMap.addLayer(osmLayer);
                let marker = L.marker(['', ''],{draggable: true}).addTo(myMap);
                this.loading = 0;
                // OnClick
                myMap.on('click',
                    (e) =>{
                        if(marker){
                            myMap.removeLayer(marker); // remove
                        }
                        let marker2 = new L.marker(e.latlng,{draggable: true}).addTo(myMap);
                        marker = marker2;
                        this.setLatLngValue(e.latlng.lat,e.latlng.lng);
                        // OnDrag
                        marker.on('dragend', (ev) =>{
                            let newLat = ev.target.getLatLng().lat;
                            let newLng = ev.target.getLatLng().lng;
                            this.setLatLngValue(newLat,newLng)
                        });
                    }
                );
                $('#reset_map').click(()=>{
                    this.setLatLngValue('','');
                    setTimeout(this.showMap,800);
                })
            },
            setLatLngValue(lat,lng){
                this.lat = lat;
                this.long = lng;
            },
            // Cropper functions
            readURL(element) {
                let input = element.target;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    console.log(input.files[0]);
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    };
                    $('#cropper_modal').modal('show');
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                    setTimeout(this.initCropper, 1000);
                }
            },
            initCropper() {
                cropper = new Cropper($('#image')[0]);
                cropper.setAspectRatio(this.croppedWidth / this.croppedHeight);
                cropper.getCroppedCanvas({width: this.croppedWidth, height: this.croppedHeight});
                $('.removeCropper').click(function () {
                    cropper.destroy();
                    // $("input[name='updated_image']")[0].value = '';
                    $('.cropper-container').css('display', 'none')
                });
                // On save
                $('.showPreview').click(() => {
                    this.preview_image_height = 'auto';
                    this.currentImage = cropper.getCroppedCanvas().toDataURL();
                    this.updated_image = cropper.getCroppedCanvas({
                        width: this.croppedWidth,
                        height: this.croppedHeight
                    }).toDataURL();
                    this.original_image = $('#image').attr('src');
                    $("input[name='updated_image']").removeAttr("disabled");
                    $("input[name='original_image']").removeAttr("disabled");
                    $("#upload-preview").show();
                    cropper.destroy();
                    $('#cropper_modal').modal('hide');
                });
                // Reset Cropper
                $('Button[data-method="reset"]').click(function () {
                    cropper.reset();
                });
                // Rotate image
                $('Button[data-method="rotate"]').click(function () {
                    cropper.rotate($(this).attr('data-option'));
                });
                // Zoom image
                $('Button[data-method="zoom"]').click(function () {
                    cropper.zoom($(this).attr('data-option'));
                });
                // scales image
                $('Button[data-method="scaleY"]').click(function () {
                    cropper.scaleY($(this).attr('data-option'));
                });
                $('Button[data-method="scaleX"]').click(function () {
                    cropper.scaleX($(this).attr('data-option'));
                });
                // Allow dragging or moving the image
                $('Button[data-method="setDragMode"]').click(function () {
                    cropper.setDragMode($(this).attr('data-option'));
                });
            },
            upload() {
                $(".image-input").click();
            },
            fetchCategory(search ,loading){
                if(search.length > 1){
                    loading(true);
                    axios.get(this.searchWorkItemsRoute,{
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
                            this.category_list = data;
                            loading(false)
                        }
                    })
                }
            },
            fetchCity(search ,loading){
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
                            this.cities_list = data;
                            loading(false)
                        }
                    })
                }
            },
            fetchAllCategories(){
                let data = [];
                let res = JSON.parse(this.workItems);
                res.forEach(function(value,index){
                    data[index] = {label:value.name , id:value.id};
                });
                this.category_list = data;
            }
        },
    };
</script>

<style>
    .wizard__step:not(:first-child) .wizard__step__line {
        left: auto !important;
        right: -50%;
    }

    .wizard__step__label {
        color: white !important;
    }
    .wizard__body{
        border:none !important;
        border-radius:10px !important;
    }
    .wizard__body__actions{
        border-radius:0 0 10px 10px;
    }
    .wizard__next{
        border-radius: 0 0 0 10px;
    }
    .wizard__back{
        border-radius: 0 0 10px 0;
    }

    .vgw-next {
        left: 9px
    }
    .vs__dropdown-toggle{
        border: 1px solid #E5EAEE !important;
    }
    .v-select[dir="rtl"] .vs__actions {
        padding: 5px 3px 0 9px !important;
    }
</style>
<style scoped>
    .dropdown-menu,.filter-option{
        text-align: right !important;
    }

    .file-pond {
        background-color: lightgrey;
        border-radius: 10px;
        cursor: pointer;
    }

    .white-div{
        width:100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.75);
        z-index: 5;
        top:0;
        right:0;
        position:absolute;
        border-radius:10px;
    }

    #my-map{
        width: 100%;
        height: 200px;
        background: #eee;
        border: 2px solid #aaa;
        margin: 0 auto;
    }
    .show-map-btn{
        position : absolute;
        z-index: 2;
        width:30px;
        height:30px;
        top:16px;
        right:24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #upload-preview{
        height: 0;
    }
    .line-height-2{
        line-height: 2;
    }
</style>