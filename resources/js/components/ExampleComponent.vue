<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{greeting}}
                        <button type='button' class='btn btn-sm btn-primary' full_names ='kibu germain' @click='updateTime'>{{full_names}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {


        data(){
            return {
            greeting: 'I am an example Component'
            }
        },

        props:{
        full_names: String
        },

        methods:{
            updateTime(){

                this.greeting = new Date().toLocaleString();
                this.full_names = 'Click to refresh time';
            }
        },
        mounted() {
            console.log('Example component Component mounted.')
        }
    }
</script>