<template>
    <div class="footer">
        <mu-container>
            <mu-bottom-nav :value.sync="home" @change="change">
                <mu-bottom-nav-item to="/encounter" title="邂逅" value="/encounter" icon="favorite"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/school" title="高校" value="/school" icon="school"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/" title="首页" value="/" icon="home"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/explore" title="发现" value="/explore" icon="explore"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/user" title="我的" value="/user" icon="person"></mu-bottom-nav-item>
            </mu-bottom-nav>
        </mu-container>
    </div>
</template>

<script>
    export default {
        name: "AppFooter",
        data() {
            return {
                home: '/explore'
            }
        },
        methods: {
            change(v) {
                this.$data.home = v;
            }
        },
        watch: {
            $route(to, from) {
                if (this.$route.path.endsWith('/')) {
                    this.$data.home = '/';
                } else if (this.$route.path.startsWith('/school')) {
                    this.$data.home = '/school';
                } else if (this.$route.path.startsWith('/explore')) {
                    this.$data.home = '/explore';
                } else if (this.$route.path.startsWith('/encounter')) {
                    this.$data.home = '/encounter';
                } else if (this.$route.path.startsWith('/user')) {
                    this.$data.home = '/user';
                }
            }
        },
        mounted() {
            if (this.$route.path.endsWith('/')) {
                this.$data.home = '/';
            } else if (this.$route.path.startsWith('/school')) {
                this.$data.home = '/school';
            } else if (this.$route.path.startsWith('/explore')) {
                this.$data.home = '/explore';
            } else if (this.$route.path.startsWith('/encounter')) {
                this.$data.home = '/encounter';
            } else if (this.$route.path.startsWith('/user')) {
                this.$data.home = '/user';
            }
        }
    }
</script>

<style lang="scss">
    .footer {
        width: 100%;
        position: fixed;
        bottom: 0;
    }
</style>
