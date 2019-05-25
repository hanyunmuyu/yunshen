<template>
    <div>
        <mu-container>
            <div v-if="active === 0">
                <div v-for="i in 15" class="post" :key="i">
                    <div style="width: 100%;margin-top: 10px">
                        <mu-avatar style="float: left">
                            <img src="/avatar.jpg">
                        </mu-avatar>
                        <div style="float: left;margin-left: 16px">
                            <h5>
                                莘莘
                            </h5>
                            <h6>
                                2019-05-26
                            </h6>
                        </div>
                    </div>
                    <div style="clear: both">
                        <p>“我的心从来没有这么坚定过，所以我会为了补偿而死，也可以为了补偿而死……一辈子，急辈子都无所谓，我绝不后退！”</p>
                    </div>
                    <img v-for="index in 6" src="/avatar.jpg" style="width: 33.33%;padding: 2px" :key="index">
                    <ul class="post-footer">
                        <li>
                            <mu-icon color="primary" value="share"></mu-icon>
                            1
                        </li>
                        <li>
                            <mu-icon color="primary" value="thumb_up_o"></mu-icon>
                            111
                        </li>
                        <li>
                            <mu-icon color="primary" value="comment"></mu-icon>
                            222
                        </li>
                    </ul>
                </div>
            </div>
            <div class="demo-text" v-if="active === 1">
                <p>“我的心从来没有这么坚定过，所以我会为了补偿而死，也可以为了补偿而死……一辈子，急辈子都无所谓，我绝不后退！”</p>
                <p>“如果我后退呢？如果我想要死呢？我不想你再次背对着我逃跑了……”</p>
                <p>“那么就去地狱找到你，我绝对不逃！”</p>
                <p>“白痴，你也哭了？因为那些软弱拖累你的脚步？”</p>
            </div>
            <div class="demo-text" v-if="active === 2">
                <p>“不，这泪水……是因为勇气，因为力量，因为信任，……你不会懂的！”</p>
                <p>“我不会帮你，想要什么样的未来……自己去追寻吧！”</p>
                <p>“我不需要你的帮忙！未来我会一手开启，什么样的敌人我也不会惧怕……还有，其实我们可以成为朋友的……”</p>
                <p>“也许吧，未来……给你了。”</p>
            </div>
            <div class="demo-text" v-if="active === 3">
                <p>“不，这泪水……是因为勇气，因为力量，因为信任，……你不会懂的！”</p>
                <p>“我不会帮你，想要什么样的未来……自己去追寻吧！”</p>
                <p>“我不需要你的帮忙！未来我会一手开启，什么样的敌人我也不会惧怕……还有，其实我们可以成为朋友的……”</p>
                <p>“也许吧，未来……给你了。”</p>
            </div>
        </mu-container>

    </div>
</template>

<script>
    export default {
        name: "Activity",
        data() {
            return {
                active: 0,
                shift: 'explore'
            };
        },

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
