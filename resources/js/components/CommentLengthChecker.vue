<template>
    <div>
        <textarea id="text" name="text" class="form-control disable-resize"
                  rows="3" v-model="msg"
                  placeholder="Write a comment...">
        </textarea>
        <div class="text-right pt-3">
            <span>
                {{( ( max - msg.length ) < 0 ) ? '0' : max - msg.length  }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CommentLengthChecker",
        data() {
            return {
                max: 255,
                msg: ''
            }
        },
    }
</script>

<style scoped>

</style>
