<template>

</template>

<script>
    export default {
        name: "UpdateDomain",
        props:['domainUpdateRoute','pageId','domainName','domainId'],
        data(){
            return{
                errors:[],
                name:'',
                title:'',
                aboutUs:'',
                privacyPolicy:'',
            }
        },
        created() {
            this.name = this.domainName
        },
        methods:{
            store(){
                axios.patch(this.domainUpdateRoute,{
                    domain_id: this.domainId,
                    name:this.name,
                    page_id: this.pageId,
                    title:this.title,
                    aboutUs:this.aboutUs,
                    privacyPolicy:this.privacyPolicy
                }).then(res => {
                    if(res.status == 200){
                        console.log(res);
                    }
                }).catch( error => {
                    this.errors = error.response.data.errors;
                    console.log(error.response.data.message)
                })
            }
        }
    }
</script>