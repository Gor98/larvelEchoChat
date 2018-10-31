<template>
    <div class="chatLog">
        <chat-message v-for="(message,index) in messages" :message='message'></chat-message>
    </div>
</template>

<script>
    export default {
        props: ['messages'],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="css">
    .chatLog .message:nth-child(even){
        background-color: #ccc;
    }
</style>