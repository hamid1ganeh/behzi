<template>
    <div class="gutter-b" ref="formContainer">
        <!--begin::Header-->
        <div class="card-header border-0 py-3"  v-if="connectionsNew.length">
            <h3 class="card-title align-items-start flex-column text-dark">
                <span class="text-dark">لیست شماره تماس‌ها</span>
            </h3>
            <div class="card-toolbar"></div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0 px-1 px-lg-6 mt-n3">
            <!--begin::Table-->
            <div class="table-responsive" v-if="connectionsNew.length">
                <table class="table table-borderless table-vertical-center">
                    <thead>
                    <tr>
                        <th class="p-0"></th>
                        <th class="p-0"></th>
                        <th class="p-0"></th>
                        <th class="p-0"></th>
                    </tr>
                    </thead>
                    <draggable :list="connectionsNew" :options="{animation:200,handle:'.handle'}" :element="'tbody'" @change="update">
                        <tr v-for="(connection , i) in connectionsNew" class="border-bottom">
                            <td class="pl-0">
                                <div class="symbol symbol-50 symbol-fixed mr-2 mt-2">
                                    <i class="fa fa-arrows-alt-v handle"></i>
                                </div>
                            </td>
                            <td class="pl-0 text-left connection-responsive-text">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary mb-1 ">{{ connection.name  }}</a>
                                <span class="font-size-lg text-muted font-weight-bold d-block">{{ connection.number  }}</span>
                            </td>
                            <td class="text-right">
<!--                                <i @click="updateConnection(connection)" data-toggle="modal" data-target="#editmodal" class="fa fa-edit text-primary"></i>-->
                                <span @click="updateConnection(connection)" data-toggle="modal" data-target="#editmodal" class="label label-lg label-light-warning label-inline bg-hover-warning-o-1">
                                    <i class="fa fa-edit px-2 text-warning font-size-lg"></i>ویرایش</span>
                            </td>
                            <td>
<!--                                <i @click="deleteConnection(connection.id)" class="flaticon-delete-1 text-danger"></i>-->
                                <span @click="deleteConnection(connection.id)" class="label label-lg label-light-danger label-inline bg-hover-danger-o-1">
                                    <i class="fa fa-trash px-2 text-danger font-size-lg"></i>حذف</span>
                            </td>
                        </tr>
                    </draggable>
            </table>
        </div>
            <div  v-else class="w-100 mt-10">
                <img :src="this.base_url+'images/static/not-found.png'" width="146" height="137">
            </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="namel">به روز رسانی</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" v-model="editConnection.name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" v-model="editConnection.number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بیخیال</button>
                        <button data-index="1" type="button" @click="saveEdit()" :class="loading==1 ? btnStyleLoading : btnPrimaryStyle">ذخیره</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import draggable from 'vuedraggable';
    export default {
        components:{
            draggable
        },
        props :['updateRoute','baseRoute','fetchRoute','pageId','title'],
        data()
        {
            return{
                connectionsNew:'',
                loader:null,
                fullPage:null,
                base_url: '',
                editConnection:{
                    id:0,
                    name:'',
                    number:'',
                    status:'',
                    priority:''
                },
                loading:0,
                btnPrimaryStyle: "btn btn-primary mr-2",
                btnStyleLoading: "btn btn-primary mr-2 spinner spinner-light spinner-right"
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.fetchConnections();
            this.base_url = window.Laravel.assets;
        },
        methods:{
            fetchConnections(){
                axios.get(this.fetchRoute,{
                    params:{
                        page_id : this.pageId
                    }
                }).then(res => {
                    this.connectionsNew = res.data;
                }).catch(error => {
                    console.log(error)
                })
            },
            update() {
                this.pageLoading();
                this.connectionsNew.map((connection,index)=>{
                    connection.priority = index+1;
                });
                console.log('changed');
                setTimeout(()=>{
                    axios.post(this.updateRoute,{
                        page_id: this.pageId,
                        phones:this.connectionsNew,
                    })
                        .then(response => {
                            if (response.status == 200)
                            {
                                this.connectionsNew = response.data.phones;
                                this.$toast.info("مرتب شد.");
                                this.pageLoading(true);
                            }
                        })
                        .catch(e => {
                            this.loading = 0;
                            console.log(e.response);
                        })
                },1000);
            },
            pageLoading(finsih=false) {
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
            },
            deleteConnection(connectionId)
            {
                this.pageLoading();
                axios.delete(this.baseRoute+'/user/panel/pages/phones',{
                    data:{
                        phone_id: connectionId
                    }
                })
                    .then(res => {
                        if(res.data.status){
                            this.connectionsNew = res.data.data.phones;
                            this.$toast.info("با موفقیت حذف شد.");
                            this.pageLoading(true);
                        }
                        else{
                            this.$toast.danger(res.data.message);
                        }
                    }).catch(error => {
                        console.log(error)
                });
            },
            updateConnection(connection)
            {
                this.editConnection.id    = connection.id;
                this.editConnection.name = connection.name;
                this.editConnection.number = connection.number;
                this.editConnection.status = connection.status;
                this.editConnection.priority = connection.priority;
            },
            saveEdit()
            {
                this.loading = 1;
                axios.patch(this.baseRoute+'/user/panel/pages/phones/',{
                    phone_id:this.editConnection.id,
                    name:this.editConnection.name,
                    number:this.editConnection.number,
                    status:this.editConnection.status,
                    priority:this.editConnection.priority
                }).then(res => {
                    if(res.data.status){
                        this.loading = 0;
                        this.connectionsNew = res.data.data.phones;
                        $('#editmodal').modal('hide');
                        this.$toast.success("با موفقیت ذخیره شد.");
                    }
                    else{
                        this.$toast.danger(res.data.message);
                    }
                }).catch(error => {
                    this.loading = 0;
                    console.log(error)
                });
            }
        }
    }
</script>
