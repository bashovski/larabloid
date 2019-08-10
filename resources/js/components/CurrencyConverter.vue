<template>
    <div>
        <div>
            <!-- Upper input field with dropdown -->
            <div class="d-flex justify-content-center">
                <input type="text" placeholder="Insert amount" v-model="userInput[ 1 ]" class="form-control w-50">
                <div class="dropdown pl-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="upper" data-toggle="dropdown">
                        {{ selected[ 0 ] }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" v-for="currency in currencies" @click="updateCurrency( currency, 0 )">{{ currency }}</a>
                    </div>
                </div>
            </div>
            <!-- Lower input field with dropdown -->
            <div class="d-flex pt-2 justify-content-center">
                <input type="text" v-bind:value="convertCurrency( 1 )" class="form-control w-50" v-text="userInput[ 1 ]">
                <div class="dropdown pl-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="lower" data-toggle="dropdown">
                        {{ selected[ 1 ] }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" v-for="currency in currencies" @click="updateCurrency( currency, 1 )">{{ currency }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CurrencyConverter",
        mounted() {
            this.getCurrencies();
        },
        data() {

            return {

                selected: [ 'EUR', 'USD' ],
                selectedKeys: [],
                obj: [],
                currencies: [],
                values: [],
                userInput: [ 0, 0 ],
                currencyKeys: [],
                proxy: 'https://cors-anywhere.herokuapp.com/'
            }

        },
        methods: {
            getCurrencies: function() {
                axios.get( this.proxy + 'https://api.exchangeratesapi.io/latest' )
                .then( response => {
                    //console.log( JSON.parse( JSON.stringify( response.data ) ) );
                    this.obj = JSON.parse( JSON.stringify( response.data ));
                    //console.log( this.obj.base );

                    for( let i in this.obj.rates ) {
                        this.currencies.push( i );
                        //console.log( i + Object.values( i ) );
                    }
                    this.currencies.push( this.obj.base );
                    this.selected[ 0 ] = this.obj.base;
                    this.$forceUpdate();
                    //console.log( this.currencies );

                    this.assignCurrencies();

                    this.currencyKeys = Object.keys( this.obj.rates );

                    console.log( Object.keys( this.obj.rates ) );
                    //console.log( 'values '+ this.values[ 0 ] );

                }).catch( errors => {
                    console.log( errors );
                });
            },
            updateCurrency: function( currency, dropdownID ) {
                //console.log( 'OLD: '+ this.selected[ dropdownID ]+ ' NEW: '+ currency );
                this.selected[ dropdownID ] = currency;
                this.selectedKeys[ dropdownID ] = this.getCurrencyKeyByID( currency, dropdownID );
                this.$forceUpdate();
            },
            assignCurrencies: function() {
                for( let i in this.currencies ) {
                    this.values.push( this.obj.rates[ this.currencies[ i ] ] );
                }
                this.values.push( 1 ); // Pushing base value (EUR) to an array.
                this.selectedKeys[ 0 ] = 1;
                this.selectedKeys[ 1 ] = 26;
                console.log( 'USD: '+ this.obj.rates[ 'USD'] );
                //console.log( 'Values object: '+ this.values[ 0 ] + ' | currency: '+ this.currencies[ 0 ] );
            },
            convertCurrency: function( id ) {
                let
                    otherid = ( !id ) ? 1 : 0,
                    val = (this.userInput[ id ] * this.selectedKeys[ otherid ] ) * this.values[ this.selectedKeys[ id ] ];
                return ( ( !isNaN( val ) ) ? ( val ) : ( '' ) );
            },
            getCurrencyKeyByID: function( id, keyID ) {
                for( let i in this.currencyKeys ) {
                    if( id == this.currencyKeys[ i ] ) {
                        this.selectedKeys[ keyID ] = i;
                        break;
                    }
                }
                return this.selectedKeys[ keyID ];
            }
        }
    }
</script>

<style scoped>

</style>
