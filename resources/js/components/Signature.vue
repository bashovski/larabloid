<template>
    <div>
        <span id="signature">Anur Basic</span>
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