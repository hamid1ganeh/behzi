<template>
    <div>
        <date-picker
                v-model="time"
                type="time"
                format="HH:mm"
                display-format="HH:mm"
                editable='editable'
        ></date-picker>
    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    export default {
        props:['init'],
        created() {
          console.log(this.init);
          this.time = this.init;
        },
        data(){
            return {
                editable:true,
                date: '',
                month: '',
                time: '09:00',
            }
        },
        components: {
            datePicker: VuePersianDatetimePicker
        }
    }
</script>