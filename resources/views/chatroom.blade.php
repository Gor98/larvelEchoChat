@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="app">
                    <h1>Open Chatroom</h1>
                    <h3><span class="badge badge-dark">@{{ usersInChannel.length }}</span></h3>
                        <ul v-for="user in usersInChannel">
                            <li>@{{user.name}}</li>
                        </ul>
                    <chat-log :messages="messages" ></chat-log>
                    <chat-composer :usertyping="usertyping" :user="{{Auth::user()}}" v-on:message-sent="addMessage"></chat-composer>
                </div>
            </div>
        </div>

@endsection

