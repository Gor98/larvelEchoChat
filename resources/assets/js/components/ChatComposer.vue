<template>
    <div class="chatComposer">
        <input type="text" placeholder="start typing..." v-model="messageText" @keyup.enter="sendMessage">
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
        props:['user'],

        methods:{
            sendMessage: function () {
                this.$emit('message-sent',{
                    message: this.messageText,
                    user:{
                        name:this.user.name
                    },
                });
                this.messageText =''
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