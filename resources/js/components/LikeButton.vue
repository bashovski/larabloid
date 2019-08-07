<template>
    <div class="pl-3 pb-1 d-flex align-items-center" @click="likeSubmission()" style="cursor: pointer;">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13pt" height="13pt" viewBox="0 0 20 20" version="1.1">
            <g id="surface1">
                <path style="stroke:none;fill-rule:nonzero;;fill-opacity:1; fill: #ff3366;" v-bind:style="{ fill: colUpdate() }"
                      d="M 0 19.089844 L 3.636719 19.089844 L 3.636719 8.183594 L 0 8.183594 Z M 20 9.089844 C 20 8.089844 19.183594 7.273438 18.183594 7.273438 L 12.453125 7.273438 L 13.363281 3.089844 C 13.363281 3 13.363281 2.910156 13.363281 2.816406 C 13.363281 2.453125 13.183594 2.089844 13 1.816406 L 12 0.910156 L 6 6.910156 C 5.636719 7.183594 5.453125 7.636719 5.453125 8.183594 L 5.453125 17.273438 C 5.453125 18.273438 6.273438 19.089844 7.273438 19.089844 L 15.453125 19.089844 C 16.183594 19.089844 16.816406 18.636719 17.089844 18 L 19.816406 11.546875 C 19.910156 11.363281 19.910156 11.089844 19.910156 10.910156 L 19.910156 9.089844 L 20 9.089844 C 20 9.183594 20 9.089844 20 9.089844 Z M 20 9.089844 ">
                </path>
            </g>
        </svg>
        <span class="pl-1 pt-1" v-text="num"></span>
    </div>
</template>

<script>
    export default {
        name: "LikeButton",
        methods: {

            likeSubmission: function() {
                axios.post( '/like/' + this.submissionId )
                    .then( response => {
                        this.isLiked = !this.isLiked;
                        this.countUpdate();
                        this.colUpdate();
                    }).catch( errors => {
                        if ( errors.response.status == 401 ) {
                            window.location = '/login';
                        }
                    });

            },
            colUpdate: function() {
                return ( this.isLiked ) ? ( '#ff3366' ) : ( '#000000' );
            },
            countUpdate: function() {
                if( !this.isLiked ) return this.num--;
                else this.num++;
            }
        },
        props: [
            'submissionId',
            'likes',
            'likeNum'
        ],
        data() {
            return {
                isLiked: this.likes,
                num: this.likeNum
            }
        },
        mounted() {
            console.log( this.likeNum );
        }
    }
</script>

<style scoped>

</style>
