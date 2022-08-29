<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="MainVue">
            <v-app>
                <v-main>
                    <v-text-field
                        v-model="FIO"
                        v-if="vis"
                    >
                    </v-text-field>
                    <v-btn
                        @click="setVisible">
                        Visible
                    </v-btn>
                    <v-btn
                        @click ="sendName">
                        Send
                    </v-btn>
                    <v-data-table>

                    </v-data-table>
                </v-main>
            </v-app>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            new Vue({
                el: '#MainVue',
                vuetify: new Vuetify(),
                data(){
                    return({
                            FIO: 'Ivanov',
                            vis: true,
                        }
                    )},
                methods:
                    {
                        setVisible(){
                            //this.vis = (this.vis === true) ? false : true
                            this.vis = !this.vis
                        },

                        sendName(){
                            let data = new FormData()
                            data.append('FIO', this.FIO)


                            fetch('/sendName',{
                                method: 'POST',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                body: data
                            })

                            .then((response)=>{
                                return response.json()
                            })

                                .then((data)=>{
                                    console.log(data)
                                })


                        },

                        beforePrint(){
                            //
                        }
                    },

                mounted: function(){
                   beforePrint();
                   console.log("sdfsdf")
                }
            })
        </script>
    </body>
</html>
