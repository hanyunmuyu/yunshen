<template>
    <mu-container ref="container">
        <mu-load-more @refresh="refresh" :refreshing="refreshing" :loading="loading" @load="load">
            <mu-list>
                <mu-list-item style="margin-bottom: 10px" v-for="(user,index) in userList" avatar ripple button :key="index">
                    <mu-list-item-action>
                        <mu-avatar>
                            <img v-lazy="user.avatar">
                        </mu-avatar>
                    </mu-list-item-action>
                    <mu-list-item-content>
                        <mu-list-item-title>{{user.name}}?</mu-list-item-title>
                        <mu-list-item-sub-title>
                            周末要来你这里出差，要不要一起吃个饭呀，实在编不下去了,哈哈哈哈哈哈
                        </mu-list-item-sub-title>
                    </mu-list-item-content>
                    <mu-button round small color="primary">关注</mu-button>
                </mu-list-item>
            </mu-list>
        </mu-load-more>
    </mu-container>
</template>

<script>
    import api from '../../api'

    export default {
        name: "Student",
        data() {
            return {
                active: 0,
                userList: [],
                currentPage: 1,
                lastPage: 1,
                refreshing: false,
                loading: false,
            };
        },
        methods: {
            refresh() {
                if (!this.refreshing) {
                    this.refreshing = true;
                    this.$refs.container.scrollTop = 0;
                    this.currentPage = 1;
                    setTimeout(() => {
                        this.refreshing = false;
                    }, 500);
                    api.getUserList().then((userList) => {
                        this.userList = userList.data.data;
                        this.lastPage = userList.data.lastPage;
                        this.currentPage = userList.data.currentPage;
                        this.refreshing = false;
                    })
                }
            },
            load() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false;
                    this.currentPage++;
                    api.getUserList(this.currentPage).then((userList) => {
                        userList.data.data.forEach((school) => {
                            this.userList.push(school);
                        });
                        this.currentPage = userList.data.currentPage;
                    })
                }, 2000)
            }
        },
        mounted() {
            this.refresh()
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }
</style>
