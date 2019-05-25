<template>
    <div class="home">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style lang="scss">
    .home {
        width: 100%;
        height: 100%;
    }
</style>
