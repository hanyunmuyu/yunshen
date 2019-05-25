<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <div style="text-align: center;margin: 0 auto">我的</div>
        </mu-appbar>
        <div id="user-header">
            <mu-avatar style="margin:10px">
                <img src="/avatar.jpg">
            </mu-avatar>
            <div>
                <div>我想静静</div>
                <div>我想静静</div>
            </div>
            <div style="flex: 1;float: right;text-align:end">
                <mu-button flat>
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
        name: "Index"
    }
</script>

<style lang="scss">
    #user-header {
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
