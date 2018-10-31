<template>
    <div class="message">
        <p>{{this.message.message}} <b><i>{{this.message.user}}</i></b></p>
    </div>
</template>

<script>
    export default {
        props: ['message'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="css">
    .message{
        padding: 1rem;
    }
    .message > p{
        margin-bottom: .5rem;
    }


</style>