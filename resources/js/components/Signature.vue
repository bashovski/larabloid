<template>
    <div>
        <a href="https://github.com/bashovski" id="signature">Anur Basic</a>
    </div>
</template>

<script>

    export default {
        name: "Signature",
        mounted() {
            var date = new Date();
            document.getElementById( 'signature' ).innerHTML = "Anur Bašić, " + date.getFullYear() + ".";
            console.log( '[Vue.js] :: [Signature] - mounted.' );
        }
    }
</script>

<style scoped>

</style>
