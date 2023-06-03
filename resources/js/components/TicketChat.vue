<template>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Chat-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Body-->
                            <div class="card-body px-2 px-md-5 py-5">
                                <!--begin:Search-->
                                <div class="px-4">
                                    <div class="input-group input-group-solid">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:/cp/assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        </div>
                                        <input @keyup="searchTicket" type="text" class="form-control py-4 h-auto" placeholder="جستجو موضوع" />
                                    </div>
                                </div>
                                <!--end:Search-->
                                <!--begin:Users-->
                                <div class="my-6 table-responsive" style="overflow-x: scroll">
                                    <div class="height-370">
                                        <!--begin-->
                                        <div class="col-12 px-1 row mx-0 my-3 py-2 pointer-event text-hover-primary bg-lighter" v-for="ticket of tickets" :key="ticket.id" :class="{ 'active': selectedTicket.id==ticket.id  }"  @click="fetchMessages(ticket)">
                                            <div class="col-8 col-md-9">
                                                <span class="bullet bullet-bar bg-success align-self-stretch mr-2"
                                                      style="height: 100%;position:absolute;right:0;"></span>
                                                <div class="col-12 px-1">
                                                    <div class="col-12 px-0 font-weight-bold font-size-lg text-truncate" v-text="ticket.title"></div>
                                                    <div class="w-100 text-muted font-weight-bold font-size-sm" v-text="ticket.date"></div>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-3 d-flex my-auto px-0 justify-content-center">
                                                <span v-if="ticket.status.class" class="font-weight-bold label label-inline py-3 font-size-xs" :class="[ticket.status.class]" v-text="ticket.status.title"></span>
<!--                                            <span v-if="ticket.new_message" class="label label-sm bg-green ml-2"></span>-->
                                            </div>
                                        </div>
                                        <!--end-->
                                        <div v-if="loading" class="d-flex justify-content-center align-items-center mb-10" style="height:100px">
                                            <div>
                                                <span class="spinner spinner-darker-success spinner-right"></span>
                                            </div>
                                        </div>
                                        <!--end:User-->
                                    </div>
                                    <!--end:Users-->

                                </div>
                                <!--begin:create-->
                                <div class="w-100">
                                    <span class="btn btn-primary w-100" @click="haveTicket">ثبت تیکت جدید
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                            <title>Stockholm-icons / Code / Plus</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g id="Stockholm-icons-/-Code-/-Plus" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <circle id="Oval-5" fill="#ffffff" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" id="Combined-Shape" fill="#ffffff"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header align-items-center px-4 py-3">
                                <div class="text-left flex-grow-1">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                                    <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>

                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                        <span class="svg-icon svg-icon-lg">
                                            <i class="flaticon-refresh" @click="fetchMessages(selectedTicket)"></i>
                                        </span>
                                    </button>

                                    <!--end::Aside Mobile Toggle-->
                                    <!--begin::Dropdown Menu-->
<!--                                    <div class="dropdown dropdown-inline">-->
<!--                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                            <i class="ki ki-bold-more-hor icon-md"></i>-->
<!--                                        </button>-->
<!--                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-left dropdown-menu-md">-->
<!--                                            &lt;!&ndash;begin::Navigation&ndash;&gt;-->
<!--                                            <ul class="navi navi-hover py-5">-->
<!--                                                <li class="navi-item">-->
<!--                                                    <a href="#" class="navi-link">-->
<!--																		<span class="navi-icon">-->
<!--																			<i class="flaticon2-drop"></i>-->
<!--																		</span>-->
<!--                                                        <span class="navi-text">New Group</span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                            &lt;!&ndash;end::Navigation&ndash;&gt;-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    end::Dropdown Menu-->
                                </div>
                                <div class="text-center flex-grow-1">
                                    <div class="text-dark-75 font-weight-bold font-size-h5">{{ this.selectedTicket.title }}</div>
                                </div>
                                <div class="text-right flex-grow-1 text-success">
                                    <small>{{ this.selectedTicket.date }}</small>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div>
                                <div class="card-body chat-screen scroll scroll-pull table-responsive" :style="{ backgroundImage: 'url(' + poster_path + ')' }">
                                    <!--begin::Scroll-->
                                    <div class="height-350" data-mobile-height="350">
                                        <!--begin::Messages-->
                                        <div class="messages">
                                        <span v-if="!temp_loading_message" v-for="message of messages">
                                            <!--begin::Message In-->
                                            <div v-if="message.owner == 'user'" class="d-flex flex-column mb-5 align-items-start">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                        <img alt="Pic" :src="user_image" />
                                                    </div>
                                                    <div>
<!--                                                     <span class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"></span>-->
                                                    </div>
                                                </div>
                                                <div class="mt-2 rounded px-5 pt-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                    <span v-if="message.attachment">
                                                        <img :src="base_url+'images/static/'+message.attachment.type.key+'.png'" width="50" height="62">
                                                    </span>
                                                    {{ message.text }}
                                                    <div class="text-muted mt-2 mb-1 d-block font-size-sm text-left" v-text="message.time"></div></div>
                                            </div>

                                            <!--begin::Message Out-->
                                            <div v-else-if="message.owner == 'operator'" class="d-flex flex-column mb-5 align-items-end">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <span class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">پشتیبانی</span>
                                                    </div>
                                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                                        <img alt="Pic" :src="admin_image" />
                                                    </div>
                                                </div>
                                                <div class="mt-2 rounded px-5 pt-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px" v-cloak>{{ message.text }}<div class="text-muted mt-2 mb-1 d-block font-size-sm text-right" v-text="message.time"></div></div>
                                            </div>
                                        </span>

                                            <div v-if="temp_loading_message" class="d-flex flex-column mb-5 align-items-start">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                        <img alt="Pic" :src="user_image" style="filter:opacity(.4)" />
                                                    </div>
                                                </div>
                                                <div class="mt-2 rounded px-5 pt-5 bg-light-green text-left max-w-400px">
                                                    <div class="temp-message">
                                                        <span class="spinner spinner-darker-success spinner-right"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Messages-->
                                    </div>
                                    <!--end::Scroll-->

                                </div>
<!--                                <div v-if="file_upload_status" class="file-upload-loading w-100 justify-content-center">-->
<!--                                    <div class="col-12 col-md-6 mb-5 bg-white-o-95 rounded text-center">-->
<!--                                        <img :src="file_upload_image" id="file_upload_image" width="40px" class="mr-2 py-2">-->
<!--                                        <span>در حال آپلود <i class="spinner spinner-darker-success spinner-right ml-3"></i></span>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer align-items-center px-0 py-2" @click="checkSelectedTicket()">
                                <!--begin::Compose-->
                                <div class="col-12 row mx-0">
                                    <div class="col-1 px-0 text-center">
                                        <input type="file" hidden class="ch-file" @change="fileChange">
                                        <span class="btn btn-clean btn-icon btn-md mr-1 border" @click="openFile()">
                                            <i class="fa fa-paperclip"></i>
                                        </span>
                                    </div>
                                    <div class="col-11 px-0">
                                        <textarea v-model="newMessage" class="form-control border-0" style="padding-left: 100px" rows="1" placeholder="یک پیام بنویسید"></textarea>
                                        <div class="btn-submit">
                                            <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-8" @click="sendMessage()"> ارسال<i :class="btn_loading"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-container small ml-18 my-1 text-muted">
                                    <span class="bg-light rounded p-2">
                                        <i class="fa fa-file text-warning px-2"></i>
                                        <span class="pr-2" id="file_text"></span>
                                        <i class="fa fa-times-circle pointer" @click="removeFile"></i>
                                    </span>
                                </div>
                                <!--begin::Compose-->
                            </div>
                            <!--end::Footer-->
                            <div v-if="white_cover" class="position-absolute rounded left-0 white-cover d-flex align-items-center justify-content-center">
                                <div class="col-lg-6">
                                    <form action="" v-if="new_ticket">
                                        <div class="font-size-h5 pr-3 mb-3 text-center text-dark">نام تیکت جدید</div>
                                        <input type="text" class="form-control shadow-sm w-100" v-model="newTicket.title">
                                        <div class="pt-4 pb-2">
                                            <select name="" id="" class="custom-select shadow-sm w-100" v-model="newTicket.department_id">
                                                <option disabled selected value="0">Please select one</option>
                                                <option v-for="department of departments" v-bind:value="department.id" v-text="department.name"></option>
                                            </select>
                                        </div>
                                        <div class="w-100 text-center">
                                            <span @click="storeNewTicket" class="btn btn-success mt-5 shadow-lg py-2 px-8">ثبت</span>
                                        </div>
                                    </form>
                                    <div v-if="what_to_do" class="text-center">
                                        <img :src="chat_logo_path" width="160" alt="chat">
                                        <h4>سامانه‌ی پرسش و پاسخ بهزی</h4>
                                        <div class="py-13 text-dark-50">برای شروع لطفا یک تیکت ثبت کنید و یا بر روی تیکت های ثبت شده کلیک کنید</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Chat-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
</template>

<script>
    export default {
        props :['ticketBaseRoute'],
        data(){
            return {
                newTicket:{
                  title:null,
                  department_id: 0,
                },
                newMessage : null,
                selectedTicket : {
                    id: 0,
                    title:null,
                    date:null
                },
                loading: true,
                temp_loading_message:false,
                btn_loading:'',
                new_ticket: false,
                white_cover: true,
                what_to_do:true,
                departments:[],
                tickets:[],
                test_tickets:[
                    {
                        id:1,title:'نمیتونم موقعیت مکانی خودم رو ثبت کنم وای وای وای ',time:'2 روز پیش',message_id:23,new_message:false, reply_status:'در صف بررسی'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    },
                    {
                        id:2,title:'فراموشی پسورد',time:'99/6/11',message_id:96,new_message:true, reply_status:'پیام جدید'
                    }
                ],
                user_image: window.Laravel.assets+'cp/assets/media/users/blank.png',
                admin_image: window.Laravel.assets+'cp/assets/media/users/300_21.jpg',
                file_upload_image: window.Laravel.assets+'images/static/upload-file.png',
                messages:[],
                poster_path:window.Laravel.assets+'cp/assets/media/bg/bg-9.jpg',
                chat_logo_path:window.Laravel.assets+'images/static/chat.png',
                file: null,
                base_url : ''
            }
        },
        created() {
            this.getDepartments();
            this.getTickets();
        },
        mounted() {
            this.base_url = window.Laravel.assets;
        },
        methods:{
            fetchTickets(){
                setTimeout(()=>{
                    this.tickets = this.test_tickets;
                    this.loading = false
                },2000);

            },
            // Runs when ticket title clicked
            fetchMessages(ticket){
                this.selectedTicket.id = ticket.id;
                this.selectedTicket.title = ticket.title;
                this.selectedTicket.date = ticket.date;
                this.temp_loading_message = true;
                axios.get(this.ticketBaseRoute+'/'+ticket.id+'/messages')
                    .then(response => {
                        this.temp_loading_message = false;
                        this.messages = response.data;
                        this.scrollDown();
                    })
                    .catch(e => {
                        this.$toast.error("فرم درخواست رو کامل پر کنید.");
                    });
                this.new_ticket = false;
                this.what_to_do = false;
                this.white_cover = false;
                // todo: scroll down function should be called with await
                setTimeout(this.scrollDown,1500)
            },
            // search the tickets title
            searchTicket(ticket_id){

            },
            storeNewTicket(){
                setTimeout(()=>{
                    axios.post(this.ticketBaseRoute,{
                        title:this.newTicket.title,
                        department_id:this.newTicket.department_id
                    })
                        .then(response => {
                            this.getTickets();
                            this.newTicket.title = null;
                            this.newTicket.department_id = 0;
                            this.new_ticket= false;
                            this.fetchMessages(response.data);
                            this.$toast.success("تیکت ثبت شد ، پیام خود را بفرستین.");
                        })
                        .catch(e => {
                            this.$toast.error("فرم درخواست رو کامل پر کنید.");
                        })
                },1000);
            },
            sendMessage()
            {
                this.btn_loading = 'spinner spinner-darker-light spinner-right ml-3';
                if(this.selectedTicket.id != 0)
                {
                    setTimeout(()=>{
                        // send Text message
                        axios.post(this.ticketBaseRoute+'/'+this.selectedTicket.id+'/messages',{
                            content:this.newMessage,
                        })
                            .then(response => {
                                this.fetchMessages(this.selectedTicket);
                                this.newMessage = "";
                                setTimeout(this.scrollDown,500);
                                this.btn_loading = "";
                            })
                            .catch(e => {
                                this.$toast.error("فرم درخواست رو کامل پر کنید.");
                            });
                        // send File message
                        const formData = new FormData();
                        if(document.querySelector(".ch-file").value){
                            formData.append('file',this.file);
                            axios.post(this.ticketBaseRoute+'/'+this.selectedTicket.id+'/messages/send-file', formData
                            ).then(res => {
                                setTimeout(this.scrollDown,500);
                                if(res.data.status){
                                    this.removeFile();
                                }else {
                                    this.$toast.error(res.data.errors.file[0]);
                                }
                            }).catch(e => {
                                this.$toast.error("مشکل در ارسال فایل");
                            })
                        }
                    },1000);
                }
                else
                    this.$toast.error("اول تیکت رو انتخاب کنید.");
            },
            getDepartments(){
                    axios.get(this.ticketBaseRoute+'/departments',{
                    })
                    .then(response => {
                        this.departments = response.data;
                    })
                    .catch(e => {
                        this.$toast.error("مشکل در دریافت اطلاعات");
                    });
            },
            getTickets(){
                setTimeout(()=>{
                    axios.get(this.ticketBaseRoute+'/list',{
                    })
                        .then(response => {
                            this.tickets = response.data;
                            this.loading = false;
                        })
                        .catch(e => {
                            this.$toast.error("مشکل در دریافت اطلاعات");
                        });
                },2000);
            },
            checkSelectedTicket(){
                if(this.messages.length < 1) this.new_ticket = true;
            },
            openFile() {
                document.querySelector(".ch-file").click();
            },
            //scroll-down
            scrollDown(){
                let container = document.querySelector('.chat-screen');
                container.scrollTop = container.scrollHeight;
            },
            haveTicket(){
                this.new_ticket = true;
                this.white_cover = true;
                this.what_to_do = false;
            },
            fileChange(event){
                this.file = event.target.files[0];
                $(".file-container").css('display','block');
                document.querySelector("#file_text").innerText = event.target.files[0].name;
            },
            removeFile(){
                const input = document.querySelector(".ch-file");
                input.value = '';
                $(".file-container").css('display','none');
            }
        }
    }
</script>

<style scoped>
    .file-upload-loading{
        display:flex;
        position:absolute;
        bottom:72px;
        right:0;
    }
    .bg-green{
        background-color: lime;
    }
    .btn-submit{
        position: absolute;
        left:1rem;
        bottom:6px;
    }
    .height-350{
        height:350px;
    }
    .height-370{
        height:370px;
    }
    @media (max-width: 992px) {
        .height-370 {
            height:76vh;
        }
    }
    .pointer-event{
        cursor:pointer
    }
    .file-container{
        display:none
    }
    .white-cover{
        background-color: rgba(255, 255, 255, 0.78);
        width:100%;
        height: calc(100% - 49px);
        top: 49px;
    }
    .spinner.spinner-right::before{
        left:auto
    }
    .chat-screen{
        background-size:cover;
        overflow-y: scroll;
    }
    .table-responsive{
        cursor: default;
    }
    .active{
        background-color: #f6f9fc;
        border-radius: 10px;
    }
    .temp-message{
        width: 200px;
        height: 40px;
    }
    .bg-light-green{
        background-color: rgba(201, 247, 245, 0.5);
    }
    button .spinner::before {
        width: 13px;
        height: 13px;
        margin-top: -6px;
    }
    #file_upload_image{
        animation: flash 1s infinite;
    }
    @keyframes flash {
        from{ opacity: 0}
        to{ opacity: .5}
    }
    .bg-lighter{
        background-color: #fdfdfd;
    }
    .pointer{
        cursor: pointer;
    }
</style>