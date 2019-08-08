<template>
    <div class="d-flex justify-content-center">
        <div class="row m-1">
            <div class="border col-md-6 justify-content-center">
                <div class="nowrap justify-content-center">
                    <img src="http://openweathermap.org/img/wn/01d@2x.png" alt="">
                    <span style="font-weight: bold;">{{ randomTemp() }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 0 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img src="http://openweathermap.org/img/wn/01d@2x.png" alt="">
                    <span style="font-weight: bold;">{{ randomTemp() }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 1 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img src="http://openweathermap.org/img/wn/01d@2x.png" alt="">
                    <span style="font-weight: bold;">{{ randomTemp() }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 2 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img src="http://openweathermap.org/img/wn/01d@2x.png" alt="">
                    <span style="font-weight: bold;">{{ randomTemp() }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 3 ].name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    /**
     *  NOTICE: In order to make this Vue component fully work
     *  it is needed to spend decent amount of money for API access
     *  which will lead to full functionality of this feature.
     *
     *  At the time I found out I couldn't successfully retrieve
     *  successful request data using axios, but only Postman/Insomnia
     *  as an API development environment it was too late to just remove
     *  the functionality.
     *
     *  Instead, I've decided to print out randomized temperature values
     *  expressed in Celsius and to display a random image of weather
     *  which result of display might be changed by the temperature value.
     *
     *  As soon as I find a right source and a right API which
     *  is compatiable with my CORS settings which I have modified
     *  for at least five hours, I will readapt and modify the feature
     *  and fully implement the planned (and unluckily unfinished) features.
     *
     *  INFO: locationID is already prepared to be used with OpenWeatherMap.
     */

    export default {
        name: "WeatherPanel",
        data() {
            return {
                locations: [

                    { name: 'New York, NY', locationID: 5664535 },
                    { name: 'Sarajevo, BiH', locationID: 3191281 },
                    { name: 'Amsterdam, NL', locationID: 2759794 },
                    { name: 'San Francisco, CA', locationID: 5391959 }

                ]
            }
        },
        methods: {
            randomTemp: function() {
                return Math.floor( Math.random() * Math.floor(19) +12);
            }
            /*loadWeatherData: function() {
                axios.get( '' )
                    .then( function( response ) {
                        console.log( response.data );
                }).catch( errors => {
                    console.log( errors+' ne radi');
                });
            }*/
        }
    }
</script>

<style scoped>

</style>
