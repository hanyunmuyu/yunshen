<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <div style="text-align: center;margin: 0 auto">{{school.schoolName}}</div>
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
            <img id="logo" v-lazy="school.schoolLogo">
            <div style="margin-left: 10px">
                <div>校友：{{school.userNumber}}</div>
                <div>社团：{{school.communityNumber}}</div>
                <div>关注：{{school.attentionNumber}}</div>
            </div>
            <div style="flex: 1">
                <mu-button round small color="primary" style="float: right;">关注</mu-button>
            </div>
        </div>
        <div>
            <mu-expansion-panel :expand="panel === 'panel1'" @change="toggle('panel1')">
                <div slot="header">社团推荐</div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada lacus ex, sit amet
                blandit
                leo lobortis eget.
            </mu-expansion-panel>
            <mu-expansion-panel :expand="panel === 'panel2'" @change="toggle('panel2')">
                <div slot="header">通知公告</div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada lacus ex, sit amet
                blandit
                leo lobortis eget.
            </mu-expansion-panel>
            <mu-expansion-panel :expand="panel === 'panel3'" @change="toggle('panel3')">
                <div slot="header">校园简介</div>
                <div style="margin-top: 6px">{{school.schoolDescription}}</div>
            </mu-expansion-panel>
        </div>
        <mu-tabs :value.sync="active" inverse color="primary" center @change="change">
            <mu-tab>动态</mu-tab>
            <mu-tab>社团</mu-tab>
            <mu-tab>校友</mu-tab>
            <mu-tab>问答</mu-tab>
        </mu-tabs>
        <mu-container v-show="active===1" ref="container">
            <mu-load-more @refresh="refresh" :refreshing="refreshing" :loading="loading" @load="load">
                <mu-card class="community" v-for="(community,index) in communityList"
                         style="width: 50%; float: left;padding: 2px;margin-top: 10px" :key="index">
                    <router-link :to="{path:'/community/detail',query:{id:community.id}}">

                        <mu-card-media>
                            <img v-lazy="community.communityLogo">
                        </mu-card-media>
                        <mu-card-title sub-title="" :title="community.communityName"
                                       style="text-align: center"></mu-card-title>
                        <mu-flex class="flex-wrapper" align-items="center">
                            <mu-flex class="flex-demo" justify-content="center" fill>成员：{{community.memberNumber}}
                            </mu-flex>
                            <mu-flex class="flex-demo" justify-content="center" fill>关注：{{community.attentionNumber}}
                            </mu-flex>
                        </mu-flex>
                        <mu-flex class="flex-wrapper" align-items="center">
                            <mu-flex class="flex-demo" justify-content="center" fill>活跃：</mu-flex>
                            <mu-flex class="flex-demo" justify-content="center" fill>
                                <mu-icon v-for="s in community.star" value="star" color="primary" :key="s"></mu-icon>
                            </mu-flex>
                        </mu-flex>
                    </router-link>

                </mu-card>
            </mu-load-more>

        </mu-container>
    </mu-container>
</template>

<script>
    import api from '../../../api'

    export default {
        name: "Index",
        data() {
            return {
                active: 0,
                shift: 'explore',
                panel: '',
                school: {},
                communityList: [],
                communityCurrentPage: 1,
                communityLastPage: 1,
                refreshing: false,
                loading: false,
            };
        },
        methods: {
            change(v) {
                switch (v) {
                    case 0:
                        this.active = 0;
                        break;
                    case 1:
                        this.active = 1;
                        this.refresh()
                        break;
                    case 2:
                        this.active = 2;
                        break;
                    case 3:
                        this.active = 3;
                        break;
                }
            },
            back() {
                this.$router.back();
            },
            refresh() {
                if (!this.refreshing) {
                    this.refreshing = true;
                    this.$refs.container.scrollTop = 0;
                    this.communityCurrentPage = 1;
                    setTimeout(() => {
                        this.refreshing = false;
                    }, 500);
                    api.getSchoolCommunityList(this.$route.query.id, this.communityCurrentPage).then((result) => {
                        this.communityList = result.data.data;
                        this.communityLastPage = result.data.lastPage;
                        this.communityCurrentPage = result.data.currentPage;
                    });
                }
            },
            load() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false;
                    this.communityCurrentPage++;
                    api.getSchoolCommunityList(this.$route.query.id, this.communityCurrentPage).then((result) => {
                        result.data.data.forEach((school) => {
                            this.communityList.push(school);
                        });
                        this.communityCurrentPage = result.data.currentPage;
                    })
                }, 2000)
            },
            toggle(panel) {
                this.panel = panel === this.panel ? '' : panel;
            }
        },
        mounted() {
            api.getSchoolDetail(this.$route.query.id).then((school) => {
                if (school.code === 200) {
                    this.school = school.data;
                }
            });
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
