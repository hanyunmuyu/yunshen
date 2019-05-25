<template>
    <div>
        <mu-tabs :value.sync="active" center @change="change">
            <mu-tab>附近</mu-tab>
            <mu-tab>推荐</mu-tab>
            <mu-tab>关注</mu-tab>
            <mu-tab>活动</mu-tab>
        </mu-tabs>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                active: 0,
                shift: 'explore'
            };
        },
        methods: {
            change(v) {
                switch (v) {
                    case 0:
                        this.active = 0;
                        this.$router.push('/explore');
                        break;
                    case 1:
                        this.$router.push('/explore/recommend');
                        this.active = 1;
                        break;
                    case 2:
                        this.$router.push('/explore/attention');
                        this.active = 2;
                        break;
                    case 3:
                        this.$router.push('/explore/activity');
                        this.active = 3;
                        break;
                }
            }
        },
        mounted() {
            if (this.$route.path.endsWith('/explore')) {
                this.active = 0;
            } else if (this.$route.path.startsWith('/explore/recommend')) {
                this.active = 1;
            } else if (this.$route.path.startsWith('/explore/attention')) {
                this.active = 2;
            } else if (this.$route.path.startsWith('/explore/activity')) {
                this.active = 3;
            }
        }
    }
</script>

<style scoped lang="scss">
    .post-footer {
        margin-top: 8px;
        display: flex;
        list-style: none;

        li {
            flex: 1;
        }
    }
</style>
