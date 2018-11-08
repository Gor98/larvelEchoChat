<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urlData">
                        <td>{{url.title}}</td>
                        <td>{{url.url}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'urlData'
        ],
        mounted() {
           this.update();
        },
        methods:{
            update: function () {
                console.log(this.urlData);
            }
        }
    }
</script>
