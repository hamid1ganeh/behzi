<template>
    <div class="card card-custom gutter-b" ref="formContainer">
        <!--begin::Header-->
        <div class="card-header border-0 mt-5">
            <h3 class="card-title align-items-start flex-column text-dark">
                <span class="text-dark">لیست تصاویر</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
            </h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0 mt-n3">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-borderless table-vertical-center">
                    <thead>
                    <tr>
                        <th class="p-0"></th>
                        <th class="p-0"></th>
                        <th class="p-0"></th>
                    </tr>
                    </thead>

                    <draggable :list="images" :options="{animation:200,handle:'.handle'}" :element="'tbody'" @change="update">
                        <tr v-for="(image , i) in imagesNew">
                            <td class="pl-0">
                                <div class="symbol symbol-50 symbol-fixed mr-2 mt-2">
                                    <i class="fa fa-arrows-alt-v handle"></i>
                                </div>
                            </td>
                            <td class="pl-0">
                                <div class="symbol symbol-50 symbol-fixed mr-2 mt-2">
                                    <div class="symbol-label">
                                        <img :src="imageUrl+'/'+image.image.name['thumbnail']" class="h-75 align-self-end" alt="">
                                    </div>
                                </div>
                            </td>
                            <td class="pl-0">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ image.title  }}</a>
<!--                                <span class="text-muted font-weight-bold d-block">Quona Rice</span>-->
                            </td>
                        </tr>
                    </draggable>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
    </div>
</template>

<script>
    import draggable from 'vuedraggable';
    export default {
        components:{
            draggable
        },
        props :['images','updateRoute','imageUrl'],
        data()
        {
            return{
                imagesNew:this.images,
                loader:null,
                fullPage:null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            update() {
                this.pageLoading();
                this.imagesNew.map((image,index)=>{
                    image.priority = index+1;
                });
                console.log('changed');
                setTimeout(()=>{
                    axios.patch(this.updateRoute,{
                        images:this.imagesNew,
                    })
                        .then(response => {
                            console.log(response.data);
                            // this.loading = 0;
                            if (response.status == 200)
                            {
                                this.imagesNew = response.data.images;
                                this.images = response.data.images;
                                this.$toast.info("مرتب شد.");
                                this.pageLoading(true);
                            }
                            //     window.location.href = this.indexRoute;
                        })
                        .catch(e => {
                            // this.loading = 0;
                            // this.$toast.error("کد sms شده را درست وارد کنید.");
                            console.log(e);
                        })
                },1000);
            },
            pageLoading(finsih=false)
            {
                if (!finsih)
                {
                    this.loader= this.$loading.show({
                        // Optional parameters
                        container: this.fullPage ? null : this.$refs.formContainer,
                        canCancel: true,
                        onCancel: this.onCancel,
                    });
                }
                else
                {
                    this.loader.hide()
                }

                // // simulate AJAX
                // setTimeout(() => {
                //     loader.hide()
                // },5000)
            },
        }
    }
</script>
