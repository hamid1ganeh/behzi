<template>
    <span
            v-if="ifStatement"
            @click="onClickFunction"
            :class="isLoading ? buttonLoadingStyle : buttonStyle"
            >
<!--        {{ text }}-->
    </span>
</template>

<script>
    export default {
        props: ['ifStatement','onClickFunction','text','buttonStyle','isLoading','buttonLoadingStyle','buttonText'],
        mounted() {
        },
        data(){
            return{}
        },
        created() {
            console.log(this.buttonText);
        },
        methods : {
        },

    }
</script>
