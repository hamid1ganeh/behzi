<template>
   <div class="shadow-sm px-2 pb-4 pt-3 filter-box sticky-top" style="top:2.5rem">
<!--               <h2 class="h5 p-1">استان مورد نظر</h2>{{ this.selectedProvince}} &#45;&#45; {{ this.selectedCity}} &#45;&#45; {{ this.selectedCategory}} &#45;&#45; {{ this.selectedItem }}-->
           <h2 class="h5 p-1">موقعیت مکانی</h2>
               <div class="pb-3 position-relative">
                   <select class="py-1 w-100" name="province" @change="provinceChanged($event)">
                       <option value="0">همه</option>
                       <option v-for="province in this.provinces" :value="province.id" :selected="selectedProvince == province.id">{{ province.name }}</option>
                   </select>
                   <span class="chevron-down d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.413" height="8.783" viewBox="0 0 15.413 8.783">
                        <g id="Group_85" data-name="Group 85" transform="translate(-164.793 431.207) rotate(-90)">
                            <line id="Line_6" data-name="Line 6" x1="7.368" y2="7.368" transform="translate(423.132 165.5)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                            <line id="Line_7" data-name="Line 7" x1="7.368" y1="6.632" transform="translate(423.132 172.868)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                        </g>
                    </svg>
                   </span>
               </div>
               <div class="position-relative">
                   <select class="py-1 w-100" name="city" @change="citySelected($event)">
                       <option value="0">همه</option>
                       <option v-for="city in this.cities"  :value="city.id" :selected="selectedCity == city.id">{{ city.name }}</option>
                   </select>
                   <span class="chevron-down d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.413" height="8.783" viewBox="0 0 15.413 8.783">
                        <g id="Group_85" data-name="Group 85" transform="translate(-164.793 431.207) rotate(-90)">
                            <line id="Line_6" data-name="Line 6" x1="7.368" y2="7.368" transform="translate(423.132 165.5)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                            <line id="Line_7" data-name="Line 7" x1="7.368" y1="6.632" transform="translate(423.132 172.868)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                        </g>
                    </svg>
                </span>
               </div>
               <!--            <hr>-->

               <h2 class="h5 p-1 mt-2">دسته بندی</h2>
               <div class="pb-3 position-relative">
                   <select class="py-1" name="work_category" @change="categoryChanged($event)">
                       <option value="0">همه</option>
                       <option v-for="category in this.categories" :value="category.id" :selected="selectedCategory == category.id">{{ category.name }}</option>
                   </select>
                   <span class="chevron-down d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.413" height="8.783" viewBox="0 0 15.413 8.783">
                        <g id="Group_85" data-name="Group 85" transform="translate(-164.793 431.207) rotate(-90)">
                            <line id="Line_6" data-name="Line 6" x1="7.368" y2="7.368" transform="translate(423.132 165.5)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                            <line id="Line_7" data-name="Line 7" x1="7.368" y1="6.632" transform="translate(423.132 172.868)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                        </g>
                    </svg>
                </span>
               </div>
               <div class="position-relative">
                   <select class="py-1" name="work_item" @change="itemSelected($event)">
                       <option value="0">همه</option>
                       <option v-for="item in this.items" :value="item.id" :selected="selectedItem == item.id">{{ item.name }}</option>
                   </select>
                   <span class="chevron-down d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.413" height="8.783" viewBox="0 0 15.413 8.783">
                        <g id="Group_85" data-name="Group 85" transform="translate(-164.793 431.207) rotate(-90)">
                            <line id="Line_6" data-name="Line 6" x1="7.368" y2="7.368" transform="translate(423.132 165.5)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                            <line id="Line_7" data-name="Line 7" x1="7.368" y1="6.632" transform="translate(423.132 172.868)" fill="none" stroke="#ffffff" stroke-linecap="square" stroke-width="1"/>
                        </g>
                    </svg>
                </span>
               </div>
               <div class="pt-4">
                   <button class="btn btn-gradient-blue w-100" @click="filterPages()">اعمال بروز رسانی</button>
               </div>
           </div>
</template>

<script>
    import {bus} from '../../app';
    export default {
        props: ['pagesRoute','provincesRoute','categoriesRoute','name','category','item','province','city','sort'],
        mounted() {
        },
        data(){
            return{
                sortItem:null,
                selectedProvince :0,
                selectedCity :0,
                selectedCategory :0,
                selectedItem :0,
                provinces : null,
                cities : null,
                categories : null,
                items : null,
            }
        },
        created() {
            this.selectedProvince   =   this.province;
            this.selectedCity       =   this.city;
            this.selectedCategory   =   this.category;
            this.selectedItem       =   this.item;
            this.sortItem           =   this.sort;
            axios.get(this.provincesRoute,{
            }).then(response => {
                this.provinces = response.data;
                this.selectedProvince = this.province;
                if (this.selectedProvince != 0)
                    this.getProvinceCities(this.selectedCity);
            }).catch(e => {
                console.log(e);
            });
            axios.get(this.categoriesRoute,{
            }).then(response => {
                this.categories = response.data;
                this.selectedCategory = this.category;
                if (this.selectedCategory != 0)
                    this.getCategoryItems(this.selectedItem);
            }).catch(e => {
                console.log(e);
            });

            bus.$on('filterAndSort',(sort)=>{
                this.sortItem = sort;
                this.filterPages();
            });
        },
        methods : {
            getProvinceCities(cId=0) {
                axios.get(this.provincesRoute+'/'+this.selectedProvince+'/cities',{
                }).then(response => {
                    this.selectedCity = cId;
                    this.cities = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
            provinceChanged(event){
                axios.get(this.provincesRoute+'/'+event.target.value+'/cities',{
                }).then(response => {
                    this.selectedProvince = event.target.value;
                    this.selectedCity = 0;
                    this.cities = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
            citySelected(event) {
                this.selectedCity = event.target.value;
            },
            getCategoryItems(iId=0){
                axios.get(this.categoriesRoute+'/'+this.selectedCategory+'/items',{
                }).then(response => {
                    this.selectedItem = iId;
                    this.items = response.data;
                }).catch(e => {
                        console.log(e);
                });
            },
            categoryChanged(event){
                axios.get(this.categoriesRoute+'/'+event.target.value+'/items',{
                })
                    .then(response => {
                        this.selectedCategory = event.target.value;
                        this.selectedItem = 0;
                        this.items = response.data;
                    })
                    .catch(e => {
                        console.log(e);
                    })
            },
            itemSelected(event){
                this.selectedItem = event.target.value;
            },
            filterPages(){

                let url = this.pagesRoute+'?';
                if (this.name != null)
                    url +='name='+this.name+'&';
                if (this.selectedProvince != 0)
                    url +='province='+this.selectedProvince+'&';
                if (this.selectedCity != 0)
                    url += 'city='+this.selectedCity+'&';
                if (this.selectedCategory != 0)
                    url += 'work_category='+this.selectedCategory+'&';
                if (this.selectedItem !=0)
                    url += 'work_item='+this.selectedItem+'&';
                if (this.sortItem != "")
                    url += 'sort='+this.sortItem+'&';
                url = url.substring(0, url.length - 1);
                window.location.href = url;
            }
        },
    }
</script>
