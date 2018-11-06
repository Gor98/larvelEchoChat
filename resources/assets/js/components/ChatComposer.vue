<template>
    <div class="chatComposer">
        <input type="text" :placeholder="usertyping" v-model="messageText" @keyup="typing"  @keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messageText: ''
            }
        },
        props:['user','usertyping'],

        methods:{
            sendMessage: function () {
                this.$emit('message-sent',{
                    message: this.messageText,
                    user:{
                        name:this.user.name
                    },
                });
                this.messageText =''
            },
            typing(){
                Echo.join('chatroom').whisper('typing', {
                    name: this.user.name+' is typing... ',
                })
            }
       },

        mounted() {
           
        }
    }
</script>

<style lang="css">
    .chatComposer {
        display: flex;
    }
    .chatComposer input{
        flex: 1 auto;
    }
    .chatComposer button{
        border-radius: 0;
    }
</style>