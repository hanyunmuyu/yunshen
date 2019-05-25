<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <!--<mu-text-field slot="default" placeholder="Please input......"></mu-text-field><br/>-->
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <input v-model="keyword" style="display: inline-block;width: 100%;height: 90%;font-size: 18px"
                   placeholder="搜索校园/社团/问答">
            <mu-button flat slot="right" @click="back">
                取消
            </mu-button>
        </mu-appbar>
        <mu-list>
            <mu-list-item v-for="(value,index) in keyword" :key="index">
                <mu-list-item-title>{{value}}</mu-list-item-title>
            </mu-list-item>
        </mu-list>
    </mu-container>
</template>

<script>
    export default {
        name: "search",
        data() {
            return {
                keyword: ''
            }
        },
        methods: {
            back() {
                this.$router.back();
            }
        },
    }
</script>

<style scoped>

</style>
