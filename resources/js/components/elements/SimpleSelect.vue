<template>
    <div>
        <select class="form-control selectpicker" :name="this.name"  data-size="7" :data-live-search="this.searchable">
            <option value="">انتخاب ...</option>
            <option v-for="item in list" :value="item.id">{{ item.name }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: ['name','searchable','serverSide','dataSource'],
        mounted() {
        },
        data(){
            return{
                list :[
                    {
                        id:1,
                        value:"item1",
                    },
                    {
                        id:2,
                        value:"item2",
                    },
                    {
                        id:3,
                        value:"item3",
                    },
                    {
                        id:4,
                        value:"item4",
                    },
                ]
            }
        },
        created() {
            if (this.serverSide)
            {

            }
            else
            {
            }
        },
        methods : {
        },

    }
</script>
