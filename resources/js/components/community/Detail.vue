<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <div style="text-align: center;margin: 0 auto">{{community.communityName}}</div>
            <mu-menu slot="right">
                <mu-button flat>
                    <mu-icon value="more_vert"></mu-icon>
                </mu-button>
                <mu-list slot="content">
                    <mu-list-item button>
                        <mu-list-item-content>
                            <mu-list-item-title>分享</mu-list-item-title>
                        </mu-list-item-content>
                    </mu-list-item>
                    <mu-list-item button>
                        <mu-list-item-content>
                            <mu-list-item-title>取消关注</mu-list-item-title>
                        </mu-list-item-content>
                    </mu-list-item>
                    <mu-list-item button>
                        <mu-list-item-content>
                            <mu-list-item-title>举报</mu-list-item-title>
                        </mu-list-item-content>
                    </mu-list-item>
                </mu-list>
            </mu-menu>
        </mu-appbar>
        <div style="width: 100%;display: flex;align-items: center;margin: 10px">
            <img id="logo" v-lazy="community.communityLogo">
            <div style="margin-left: 10px">
                <div>成员：{{community.memberNumber}}</div>
                <div>关注：{{community.attentionNumber}}</div>
            </div>
            <div style="flex: 1">
                <mu-button v-if="community.isAttention===0" @click="attention" round small color="primary"
                           style="float: right;">关注
                </mu-button>
                <mu-button v-else-if="community.isSignIn===0" @click="signIn" round small color="primary"
                           style="float: right;">签到
                </mu-button>
                <mu-button v-else round small style="float: right;">已签到</mu-button>
            </div>
        </div>
        <div style="margin: 6px;">标签：
            <mu-chip color="primary">运动</mu-chip>
            <mu-chip color="primary">球类</mu-chip>
            <mu-chip color="primary">交友</mu-chip>
        </div>
        <div>
            <mu-expansion-panel :expand="panel === 'panel1'" @change="toggle('panel1')">
                <div slot="header">友情社团</div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada lacus ex, sit amet
                blandit
                leo lobortis eget.
            </mu-expansion-panel>
            <mu-expansion-panel :expand="panel === 'panel2'" @change="toggle('panel2')">
                <div slot="header">社团简介</div>
                <div style="margin-top: 6px">{{community.description}}</div>
            </mu-expansion-panel>
            <mu-expansion-panel :expand="panel === 'panel3'" @change="toggle('panel3')">
                <div slot="header">精选活动</div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada lacus ex, sit amet
                blandit
                leo lobortis eget.
            </mu-expansion-panel>
        </div>
        <mu-tabs :value.sync="active" inverse color="primary" center @change="change">
            <mu-tab>动态</mu-tab>
            <mu-tab>活动</mu-tab>
            <mu-tab>成员</mu-tab>
        </mu-tabs>
    </mu-container>
</template>

<script>
    import api from '../../api'

    export default {
        name: "CommunityDetail",
        data() {
            return {
                active: 0,
                shift: 'explore',
                panel: '',
                community: {}
            };
        },
        methods: {
            change(v) {
                // switch (v) {
                //     case 0:
                //         this.active = 0;
                //         this.$router.push('/explore');
                //         break;
                //     case 1:
                //         this.$router.push('/explore/recommend');
                //         this.active = 1;
                //         break;
                //     case 2:
                //         this.$router.push('/explore/attention');
                //         this.active = 2;
                //         break;
                //     case 3:
                //         this.$router.push('/explore/activity');
                //         this.active = 3;
                //         break;
                // }
            },
            back() {
                this.$router.back();
            },
            toggle(panel) {
                this.panel = panel === this.panel ? '' : panel;
            },
            attention() {
                api.payAttentionToCommunity(this.community.id).then((result) => {
                    if (result.code === 200) {
                        this.community.isAttention = 1;
                    }
                });
            },
            signIn() {
                api.signToCommunity(this.community.id).then((result) => {
                    if (result.code === 200) {
                        this.community.isSignIn = 1;
                    }
                });
            }
        },
        mounted() {
            // if (this.$route.path.endsWith('/explore')) {
            //     this.active = 0;
            // } else if (this.$route.path.startsWith('/explore/recommend')) {
            //     this.active = 1;
            // } else if (this.$route.path.startsWith('/explore/attention')) {
            //     this.active = 2;
            // } else if (this.$route.path.startsWith('/explore/activity')) {
            //     this.active = 3;
            // }
            api.getCommunityDetail(this.$route.query.id).then((json) => {
                if (json.code === 200) {
                    this.community = json.data;
                }
            })
        },
    }
</script>

<style lang="scss">
    #logo {
        border-radius: 8px;
        width: 56px;
        height: 56px;
    }
</style>
