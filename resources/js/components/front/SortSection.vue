<template>
        <div class="col-xl-4 text-center text-md-left px-0 mt-3 mb-2 mt-md-0">
            <small class="text-muted">مرتب سازی بر اساس</small>
            <span @click="sortAction('created_at')"  :class="sort == 'created_at' ? activeButton : button">جدیدترین</span>
            <span @click="sortAction('rate')"  :class="sort == 'rate' ? activeButton : button">بهترین</span>
        </div>
</template>
<script>
    import {bus} from '../../app';
    export default {
        props: ['sort'],
        mounted() {
            console.log(this.sort)
        },
        data(){
            return{
                activeButton : 'btn btn-light btn-circle small btn-sm mr-2 active',
                button : 'btn btn-light btn-circle small btn-sm mr-2',
            }
        },
        created() {
        },
        methods : {
            sortAction(item)
            {
                bus.$emit("filterAndSort",item);
            }
        }
    }
</script>