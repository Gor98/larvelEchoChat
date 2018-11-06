
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: [

        ],
        usersInChannel: [],
        isTyping:  false,
        usertyping:''
    },
    methods:{
        addMessage(massage){
            this.messages.push(massage);
            axios.post('/message',massage).then(response =>{

            });
        },

    },

    created(){
        axios.get('/messages').then(response =>{
            this.messages = response.data
        });



        let channel = Echo.join('chatroom')
            .here( (users) => {
                this.usersInChannel = users;
            })
            .joining( (user) => {
                this.usersInChannel.push(user);
            } )
            .leaving( (user) => {
                this.usersInChannel = this.usersInChannel.filter(u => u != user);
            })
            .listen('MessagePost', (e) => {
                this.messages.push({
                   message: e.message.message,
                   user: e.user
               });
            })
            .listenForWhisper('typing', (e) => {
                this.usertyping = e.name;
                setTimeout(function() {
                    Echo.join('chatroom').whisper('typing', {
                        name: '',
                    });

                }, 500);

            });

        //
        // Echo.private('chatroom')
        //     .listen('MessagePost', (e) => {
        //         console.log(e);
        //     });




    }

});
