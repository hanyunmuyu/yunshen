<template>
    <mu-container>
        <mu-list>
            <mu-list-item v-for="user in 15" avatar ripple button :key="user">
                <mu-list-item-action>
                    <mu-avatar>
                        <img src="/avatar.jpg">
                    </mu-avatar>
                </mu-list-item-action>
                <mu-list-item-content>
                    <mu-list-item-title>这个周末一起吃饭么?</mu-list-item-title>
                    <mu-list-item-sub-title>
                        周末要来你这里出差，要不要一起吃个饭呀，实在编不下去了,哈哈哈哈哈哈
                    </mu-list-item-sub-title>
                </mu-list-item-content>
                <mu-button round small color="primary">关注</mu-button>
            </mu-list-item>
        </mu-list>
    </mu-container>
</template>

<script>
    export default {
        name: "Student"
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }
</style>
