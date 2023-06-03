<template>
    <div class="position-absolute" :class="subject">

        <div class="position-relative" style="z-index: 5">
            <input type="text" @focus="trigger" @blur="blur" :placeholder="placeholder" class="default text-secondary bg-white py-2 border-0 text-center custom-select">
            <div class="mr-3 list" :class="list_status">
                <ul class="bg-white shadow-sm px-0 list-unstyled text-center small">
                    <a href=""><li class="py-2">تهران</li></a>
                    <a href=""><li class="py-2">گلستان</li></a>
                    <a href=""><li class="py-2">مازندران</li></a>
                    <a href=""><li class="py-2">البرز</li></a>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchFilterInline",
        props:['placeholder','subject'],
        data(){
            return{
                list_status:'d-none'
            }
        },
        methods:{
            trigger(){
                this.list_status='d-block'
            },
            blur(){
                this.list_status='d-none'
            }
        }

    }
</script>

<style scoped>
    input{
        box-shadow: none !important;
        cursor: default;
    }
    .list{
        margin-top: 1px;
    }
    ul a:not(:last-child) li{
        border-bottom: 1px solid #eeeeee !important;
    }
    ul{
        border-radius: 0 0 10px 10px;
        border:1px solid #eeeeee;
    }
</style>