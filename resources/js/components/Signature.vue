<template>
    <div>
        <a href="https://github.com/bashovski" id="signature">Anur Basic</a>
    </div>
</template>

<script>

    export default {
        mounted() {
            var date = new Date();
            document.getElementById( 'signature' ).innerHTML = "Anur Bašić, " + date.getFullYear() + ".";
        }
    }
</script>

<style scoped>

</style>