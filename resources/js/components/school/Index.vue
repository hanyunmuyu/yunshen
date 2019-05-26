<template>
    <div>
        <mu-appbar style="width: 100%;" color="primary">
            <mu-tabs :value.sync="active" center @change="change">
                <mu-tab>校园</mu-tab>
                <mu-tab>社团</mu-tab>
                <mu-tab>同学</mu-tab>
                <mu-tab>问答</mu-tab>
            </mu-tabs>
            <mu-button flat slot="right" to="/search">
                <mu-icon value="search"></mu-icon>
            </mu-button>
        </mu-appbar>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
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
                        this.$router.push('/school');
                        break;
                    case 1:
                        this.$router.push('/school/community');
                        this.active = 1;
                        break;
                    case 2:
                        this.$router.push('/school/student');
                        this.active = 2;
                        break;
                    case 3:
                        this.$router.push('/school/question');
                        this.active = 3;
                        break;
                }
            }
        },
        mounted() {
            if (this.$route.path.endsWith('/school')) {
                this.active = 0;
            } else if (this.$route.path.startsWith('/school/community')) {
                this.active = 1;
            } else if (this.$route.path.startsWith('/school/student')) {
                this.active = 2;
            } else if (this.$route.path.startsWith('/school/question')) {
                this.active = 3;
            }
        },
    }
</script>

<style scoped>

</style>
