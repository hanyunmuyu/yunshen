<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary">
            <div style="text-align: center;margin: 0 auto">首页</div>
        </mu-appbar>
        <mu-paper :z-depth="1" class="demo-list-wrap">
            <mu-list toggle-nested>
                <mu-list-item button :ripple="false" nested :open="open === 'send'"
                              @toggle-nested="open = arguments[0] ? 'send' : ''">
                    <mu-list-item-action>
                        <mu-icon value="group"></mu-icon>
                    </mu-list-item-action>
                    <mu-list-item-title>加入的社团</mu-list-item-title>
                    <mu-list-item-action>
                        <mu-icon class="toggle-icon" size="24" value="keyboard_arrow_down"></mu-icon>
                    </mu-list-item-action>
                    <mu-list-item v-for="index in 6" avatar button :ripple="false" slot="nested" :key="index">
                        <mu-list-item-action>
                            <mu-avatar>
                                <img src="/avatar.jpg">
                            </mu-avatar>
                        </mu-list-item-action>
                        <mu-list-item-title>轮滑社团</mu-list-item-title>
                        <mu-list-item-action>
                            <mu-list-item-after-text>2更新</mu-list-item-after-text>
                        </mu-list-item-action>
                    </mu-list-item>
                </mu-list-item>
                <mu-list-item button :ripple="false" nested :open="open === 'drafts'"
                              @toggle-nested="open = arguments[0] ? 'drafts' : ''">
                    <mu-list-item-action>
                        <mu-icon value="school"></mu-icon>
                    </mu-list-item-action>
                    <mu-list-item-title>关注的校园</mu-list-item-title>
                    <mu-list-item-action>
                        <mu-icon class="toggle-icon" size="24" value="keyboard_arrow_down"></mu-icon>
                    </mu-list-item-action>
                    <mu-list-item v-for="index in 6" avatar button :ripple="false" slot="nested" :key="index">
                        <mu-list-item-action>
                            <mu-avatar>
                                <img src="/avatar.jpg">
                            </mu-avatar>
                        </mu-list-item-action>
                        <mu-list-item-title>XX大学</mu-list-item-title>
                        <mu-list-item-action>
                            <mu-list-item-after-text>2动态</mu-list-item-after-text>
                        </mu-list-item-action>
                    </mu-list-item>
                </mu-list-item>
            </mu-list>
        </mu-paper>
        <div>
            <div style="width: 100%;margin-top: 10px">
                <mu-avatar style="float: left">
                    <img src="/avatar.jpg">
                </mu-avatar>
                <div style="float: left;margin-left: 16px">
                    <h5>
                        高校摄影大赛开始了
                    </h5>
                    <h6>
                        2019-05-26
                    </h6>
                </div>
            </div>
            <div style="clear: both">
                <p>
                    春季手机摄影大赛开始报名了，大家用手机拍出自己所在高校的美丽，
                    记录高校生活的点点滴滴，获胜者将得到小米手机一部，
                    平台将在所有才塞着当中随机抽取五名幸者，送小米充电宝一个，望大家积极参与
                </p>
            </div>
            <mu-flex align-items="center">
                <mu-flex justify-content="center" fill>
                    <mu-button flat small>
                        <mu-icon left value="thumb_up_o" color="primary"></mu-icon>
                        1111
                    </mu-button>
                </mu-flex>
                <mu-flex justify-content="center" fill>
                    <mu-button flat small>
                        <mu-icon left value="comment"></mu-icon>
                        1111
                    </mu-button>
                </mu-flex>
            </mu-flex>
        </div>
        <div>
            <div style="width: 100%;margin-top: 10px">
                <mu-avatar style="float: left">
                    <img src="/avatar.jpg">
                </mu-avatar>
                <div style="float: left;margin-left: 16px">
                    <h5>
                        高校足球杯开始了
                    </h5>
                    <h6>
                        2019-05-26
                    </h6>
                </div>
            </div>
            <div style="clear: both">
                <p>
                    高校足球杯开始了，所有在校大学生均可参加，比赛分三个步骤，校内赛，校级赛，市级赛，省级赛，总决赛，
                    最终评选出冠军，季军，亚军，冠军获得一万元奖金，亚军获得五千元奖金，季军获得三千元奖金，欢迎各大高校的
                    运动爱好者参与
                </p>
            </div>
            <mu-flex align-items="center">
                <mu-flex justify-content="center" fill>
                    <mu-button flat small>
                        <mu-icon left value="thumb_up_o" color="primary"></mu-icon>
                        1111
                    </mu-button>
                </mu-flex>
                <mu-flex justify-content="center" fill>
                    <mu-button flat small>
                        <mu-icon left value="comment"></mu-icon>
                        1111
                    </mu-button>
                </mu-flex>
            </mu-flex>
        </div>

    </mu-container>
</template>

<script>

    export default {
        name: "Index",
        mounted() {
        },
        data() {
            return {
                open: ''
            }
        }
    }
</script>

<style scoped>
    .demo-list-wrap {
        width: 100%;
        max-width: 360px;
        overflow: hidden;
    }
</style>
