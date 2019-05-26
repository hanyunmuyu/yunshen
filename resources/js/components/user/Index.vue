<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <div style="text-align: center;margin: 0 auto">我的</div>
        </mu-appbar>
        <div class="user-header" v-if="user===null">
            <mu-avatar style="margin:10px">
                <img src="/login.png">
            </mu-avatar>
            <div>
                <mu-button flat to="/login">未登录</mu-button>
            </div>
        </div>
        <div class="user-header" v-else>
            <mu-avatar style="margin:10px">
                <img v-lazy="user.avatar">
            </mu-avatar>
            <div>
                <div>我想静静</div>
                <div>我想静静</div>
            </div>
            <div style="flex: 1;float: right;text-align:end">
                <mu-button flat :to="{path:'/user/info'}">
                    个人信息
                    <mu-icon value="keyboard_arrow_right"></mu-icon>
                </mu-button>
            </div>
        </div>
        <ul id="user">
            <li>
                <router-link :to="{path:'/user/attention'}">
                    <div>11</div>
                    <div>关注</div>
                </router-link>
            </li>
            <li>
                <router-link :to="{path:'/user/fan'}">
                    <div>11</div>
                    <div>粉丝</div>
                </router-link>
            </li>
            <li>
                <router-link :to="{path:'/user/community'}">
                    <div>11</div>
                    <div>社团</div>
                </router-link>
            </li>
            <li>
                <router-link :to="{path:'/user/question'}">
                    <div>11</div>
                    <div>问答</div>
                </router-link>
            </li>
        </ul>
    </mu-container>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                user: null
            }
        },
        mounted() {
            let user = this.$store.state.user;
            if (user === null) {
                // this.$router.push('/login');
                this.$data.user = user;
            } else {
                this.$data.user = user;
            }
        }
    }
</script>

<style lang="scss">
    .user-header {
        width: 100%;
        display: flex;
        align-items: Center;
    }

    #user {
        margin-top: 8px;
        list-style: none;
        display: flex;

        li {
            flex: 1;
            text-align: center;

            a {
                div {
                    color: black;
                }
            }
        }
    }


</style>
