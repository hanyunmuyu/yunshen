<template>
    <div>
        <mu-container ref="container">
            <mu-load-more @refresh="refresh" :refreshing="refreshing" :loading="loading" @load="load">
                <mu-card v-for="(community,index) in communityList"
                         style="width: 50%; float: left;padding: 2px;margin-top: 10px" :key="index">
                    <mu-card-media>
                        <img v-lazy="community.communityLogo">
                    </mu-card-media>
                    <mu-card-title sub-title="" :title="community.communityName"
                                   style="text-align: center"></mu-card-title>
                    <mu-flex class="flex-wrapper" align-items="center">
                        <mu-flex class="flex-demo" justify-content="center" fill>成员：{{community.memberNumber}}</mu-flex>
                        <mu-flex class="flex-demo" justify-content="center" fill>关注：{{community.attentionNumber}}
                        </mu-flex>
                    </mu-flex>
                    <mu-flex class="flex-wrapper" align-items="center">
                        <mu-flex class="flex-demo" justify-content="center" fill>活跃：</mu-flex>
                        <mu-flex class="flex-demo" justify-content="center" fill>
                            <mu-icon v-for="s in community.star" value="star" color="primary" :key="s"></mu-icon>
                        </mu-flex>
                    </mu-flex>

                </mu-card>
            </mu-load-more>

        </mu-container>
    </div>
</template>

<script>
    import api from '../../api'

    export default {
        name: "Community",
        data() {
            return {
                communityList: [],
                currentPage: 1,
                lastPage: 1,
                refreshing: false,
                loading: false,
            }
        },
        methods: {
            refresh() {
                this.refreshing = true;
                this.$refs.container.scrollTop = 0;
                this.currentPage = 1;
                setTimeout(() => {
                    this.refreshing = false;
                    api.getCommunityList(this.currentPage).then((result) => {
                        this.communityList = result.data.data;
                        this.lastPage = result.data.lastPage;
                        this.currentPage = result.data.currentPage;
                    })
                }, 2000)
            },
            load() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false;
                    this.currentPage++;
                    api.getCommunityList(this.currentPage).then((result) => {
                        result.data.data.forEach((school) => {
                            this.communityList.push(school);
                        });
                        this.currentPage = result.data.currentPage;
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

</style>
