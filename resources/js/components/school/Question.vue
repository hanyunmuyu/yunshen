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
                    <mu-list-item-title>怎么谈恋爱</mu-list-item-title>
                    <mu-list-item-sub-title>
                        想谈一场甜甜的恋爱，怎么开始呢？想谈一场甜甜的恋爱，怎么开始呢？
                    </mu-list-item-sub-title>
                </mu-list-item-content>
            </mu-list-item>
        </mu-list>
    </mu-container>
</template>

<script>
    export default {
        name: "Question"
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }
</style>
