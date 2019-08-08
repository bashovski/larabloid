<template>
    <div class="d-flex justify-content-center">
        <div class="row m-1">
            <div class="border col-md-6 justify-content-center">
                <div class="nowrap justify-content-center">
                    <img v-bind:src="icon[ 0 ]" alt="">
                    <span style="font-weight: bold;">{{ temperature[ 0 ]}}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 0 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img v-bind:src="icon[ 1 ]" alt="">
                    <span style="font-weight: bold;">{{ temperature[ 1 ] }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 1 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img v-bind:src="icon[ 2 ]" alt="">
                    <span style="font-weight: bold;">{{ temperature[ 2 ] }}°</span>
                </div>
                <div class="justify-content-center text-md-center">
                    {{ locations[ 2 ].name }}
                </div>
            </div>
            <div class="border col-md-6 justify-content-center pb-3">
                <div class="nowrap justify-content-center">
                    <img v-bind:src="icon[ 3 ]" alt="">
                    <span style="font-weight: bold;">{{ temperature[ 3 ] }}°</span>
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
     * UPDATE SINCE THE LAST COMMIT:
     *
     * External API from OWM has been implemented and
     * is fully working at the moment with the limit of
     * 60 req. per minute which is sufficient for this type
     * of app in this type of development environment.
     */

    export default {
        name: "WeatherPanel",
        mounted() {
            for( let i = 0; i < 4; i++ ) {
                this.loadWeatherData( i );
                this.$forceUpdate();
            }
        },
        data() {
            return {
                locations: [

                    // locationID element is unused here, we are using locationIDS as reference in method below...
                    { name: 'New York, NY', locationID: 5128581 },
                    { name: 'Sarajevo, BiH', locationID: 3191281 },
                    { name: 'Amsterdam, NL', locationID: 2759794 },
                    { name: 'San Francisco, CA', locationID: 5391959 }

                ],
                locationIDs: [
                    5128581,
                    3191281,
                    2759794,
                    5391959
                ],
                proxy: 'https://cors-anywhere.herokuapp.com/',
                temperature: [
                    0, 0, 0, 0
                ],
                icon: [
                    'http://openweathermap.org/img/wn/01d@2x.png',
                    'http://openweathermap.org/img/wn/01d@2x.png',
                    'http://openweathermap.org/img/wn/01d@2x.png',
                    'http://openweathermap.org/img/wn/01d@2x.png'
                ]
            }
        },
        methods: {
            loadWeatherData: function( id ) {
                axios.get( this.proxy + 'http://api.openweathermap.org/data/2.5/weather?units=metric&id='+ this.locationIDs[ id ] +'&appid=65c63737a69855a4698b42e71f3d1b57' )
                    .then( response => {

                        console.log( JSON.parse( JSON.stringify( response.data['weather'][ 0 ].icon ) ) );
                        this.temperature[ id ] = parseInt( JSON.parse( JSON.stringify( response.data[ 'main' ] ) ).temp );
                        this.icon[ id ] =
                            'http://openweathermap.org/img/wn/' +
                            String( JSON.parse( JSON.stringify( response.data['weather'][ 0 ].icon ) ) )  +
                            '@2x.png';
                        return this.update( id );
                }).catch( errors => {
                    console.log( errors );
                });
            },
            update: function( id ) {
                this.$forceUpdate();
                return this.icon[ id ];
            }
        }
    }
</script>

<style scoped>

</style>
