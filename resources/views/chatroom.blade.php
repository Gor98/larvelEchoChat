@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Open Chatroom</h1>
                <chat-log :messages="messages"></chat-log>
                <chat-composer :user="{{Auth::user()}}" v-on:message-sent="addMessage"></chat-composer>
            </div>
        </div>

@endsection
