<template>
    <div class="footer">
        <mu-container>
            <mu-bottom-nav :value.sync="home" @change="change">
                <mu-bottom-nav-item to="/" title="邂逅" value="/" icon="favorite"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/school" title="高校" value="/school" icon="school"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/explore" title="发现" value="/explore" icon="explore"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/chat" title="消息" value="chat" icon="chat"></mu-bottom-nav-item>
                <mu-bottom-nav-item to="/person" title="我的" value="person" icon="person"></mu-bottom-nav-item>
            </mu-bottom-nav>
        </mu-container>
    </div>
</template>

<script>
    export default {
        name: "AppFooter",
        data() {
            return {
                home: '/'
            }
        },
        methods: {
            change(v) {
                this.$data.home = v;
            }
        },
        watch: {
            $route(to, from) {
                this.$data.home = this.$route.path;
            }
        },
        mounted() {
            if (this.$route.path.endsWith('/')) {
                this.$data.home = '/';
            } else if (this.$route.path.endsWith('/school')) {
                this.$data.home = '/school';
            } else if (this.$route.path.endsWith('/explore')) {
                this.$data.home = '/explore';
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
