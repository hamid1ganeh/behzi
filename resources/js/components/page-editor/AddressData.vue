<template>
    <div class="w-100">
        <div @click="this.open" class="btn-light w-100 rounded p-4" id="heading3" data-toggle="collapse" data-target="#collapse3"
             aria-expanded="false" aria-controls="collapse3">
            موقعیت مکانی
            <span class="float-right text-center mr-md-5">
                <i class="fa fa-chevron-down chevron-1"></i><br>
                <i class="fa fa-chevron-down chevron-2"></i>
            </span>
        </div>
        <div id="collapse3" class="col-12 collapse" aria-labelledby="heading3" data-parent="#accordion">
                <div class="form-group row pt-5">
                    <div class="col-lg-6">
                        <label class="">استان و شهر</label>
                        <div>
                            <select class="form-control selectpicker" name="city_id" v-model="city" data-size="7" data-live-search="true">
                                <option v-for="city of cities_list" :value="city.id">{{ city.province.name }} ({{ city.name }})</option>
                            </select>
                            <span class="form-text text-danger city-error" v-if="errors.city_id">{{ errors.city_id[0] }}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>آدرس</label>
                        <input name="address" type="text" class="form-control" v-model="address" placeholder="آدرس را وارد کنید."/>
                        <span class="form-text text-danger address-error" v-if="errors.address">{{ errors.address[0] }}</span>
                    </div>
                    <div class="row col-12 pt-3 px-0 mx-0">
                        <div class="col-lg-6">
                            <label>عرض جغرافیایی</label>
                            <input name="lat" id="lat" type="text" v-model="lat" class="form-control" placeholder="عرض جغرافیایی را وارد یا از نقشه انتخاب کنید."/>
                            <span class="form-text text-danger lat-error" v-if="errors.lat">{{ errors.lat[0] }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label>طول جغرافیایی</label>
                            <input name="lng" id="lng" type="text" v-model="lng" class="form-control" placeholder="طول جغرافیایی را وارد یا از نقشه انتخاب کنید."/>
                            <span class="form-text text-danger lng-error" v-if="errors.lng">{{ errors.lng[0] }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div id="my-map"></div>
                    </div>
                </div>
                <div class="col-12 text-right">
                    <span @click="updateForm" class="btn btn-success px-20 mb-3" :class="load_spinner">ذخیره</span>
                </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "ImageData",
        props:['lat','lng','city','address','provinces','updateRoute'],
        data(){
            return{
                cities_list:[],
                load_spinner: '',
                errors:[]
            }
        },
        mounted() {
            this.cities_list = JSON.parse(this.provinces);
        },
        methods:{
            updateForm(){
                this.load_spinner = "spinner spinner-light spinner-right";
                axios.patch(this.updateRoute,{
                    city_id: this.city,
                    address: this.address,
                    lat: this.lat,
                    lng: this.lng
                }).then(response =>{
                    if(response.status == 200){
                        this.load_spinner = '';
                        this.errors = [];
                        this.$toast.success("موقعیت مکانی با موفقیت بروز رسانی شد");
                    }
                }).catch(err => {
                    this.load_spinner = '';
                    this.errors = err.response.data.errors;
                    this.$toast.error("لطفا موارد مشخص شده را پر کنید")
                })
            },
            showMap(){
                document.getElementById('my-map').innerHTML = "<div id='map'></div>";
                let osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
                        ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">BEHZI</a>',
                    osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
                // let lat = this.lat;
                // let long = this.lng;
                let myMap= new L.Map('map');
                myMap.setView(new L.LatLng(this.lat, this.lng), 14);
                myMap.addLayer(osmLayer);
                let marker = L.marker([this.lat, this.lng],{draggable: true}).addTo(myMap).bindPopup("موقعیت مکانی فعلی").openPopup();
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
                // OnDrag
                marker.on('dragend', (ev) =>{
                    let newLat = ev.target.getLatLng().lat;
                    let newLng = ev.target.getLatLng().lng;
                    this.setLatLngValue(newLat,newLng)
                });
                $('#reset_map').click(()=>{
                    this.setLatLngValue('','');
                    setTimeout(this.showMap,800);
                })
            },
            setLatLngValue(lat,lng){
                this.lat = lat;
                this.lng = lng;
            },
            open(){
                setTimeout(this.showMap,800)
            }
        }
    }
</script>

<style scoped>

</style>