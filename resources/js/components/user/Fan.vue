<template>
    <mu-appbar style="width: 100%;" color="primary" textColor="white">
        <mu-button icon slot="left" @click="back">
            <mu-icon value="arrow_back"></mu-icon>
        </mu-button>
        <div style="text-align: center;margin: 0 auto">我的粉丝</div>
    </mu-appbar>
</template>

<script>
    export default {
        name: "Fan",
        methods: {
            back() {
                this.$router.back();
            }
        },
    }
</script>

<style scoped>

</style>
