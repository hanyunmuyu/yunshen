<template>
    <div>
        <mu-appbar style="width: 100%;" color="primary">
            <mu-tabs :value.sync="active" center @change="change">
                <mu-tab>校园</mu-tab>
                <mu-tab>社团</mu-tab>
                <mu-tab>同学</mu-tab>
                <mu-tab>问答</mu-tab>
            </mu-tabs>
            <mu-button flat slot="right">
                <mu-icon value="search"></mu-icon>
            </mu-button>
        </mu-appbar>
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
                        this.$router.push('/school');
                        break;
                    case 1:
                        this.$router.push('/school/community');
                        this.active = 1;
                        break;
                }
            }
        },
        mounted() {
            if (this.$route.path.endsWith('/school')) {
                this.active = 0;
            }else if (this.$route.path.startsWith('/school/community')) {
                this.active = 1;
            }
        }
    }
</script>

<style scoped>

</style>
