<template>
    <div>
        <mu-container ref="container">
            <mu-load-more @refresh="refresh" :refreshing="refreshing" :loading="loading" @load="load">
                <mu-card class="school" v-for="(school,index) in schoolList" :key="index">
                    <router-link :to="{path:'/school/detail',query:{id:school.id}}">
                        <mu-card-media>
                            <img src="/school.png">
                        </mu-card-media>
                        <mu-card-title :sub-title="school.schoolDescription" :title="school.schoolName"
                                       style="text-align: center"></mu-card-title>
                        <mu-flex class="flex-wrapper" align-items="center">
                            <mu-flex class="flex-demo" justify-content="center" fill>社团：{{school.communityNumber}}
                            </mu-flex>
                            <mu-flex class="flex-demo" justify-content="center" fill>校友：{{school.userNumber}}</mu-flex>
                        </mu-flex>
                        <mu-flex class="flex-wrapper" align-items="center">
                            <mu-flex class="flex-demo" justify-content="center" fill>星级：</mu-flex>
                            <mu-flex class="flex-demo" justify-content="center" fill>
                                <mu-icon v-for="s in school.star" value="star" color="primary" :key="s"></mu-icon>
                            </mu-flex>
                        </mu-flex>
                    </router-link>
                </mu-card>

            </mu-load-more>
        </mu-container>
    </div>
</template>

<script>
    import api from '../../api'

    export default {
        name: "Schoolyard",
        data() {
            return {
                active: 0,
                schoolList: [],
                currentPage: 1,
                lastPage: 1,
                refreshing: false,
                loading: false,
            };
        },
        methods: {
            refresh() {
                this.refreshing = true;
                this.$refs.container.scrollTop = 0;
                this.currentPage = 1;
                setTimeout(() => {
                    this.refreshing = false;
                    api.getSchoolList().then((schoolList) => {
                        this.schoolList = schoolList.data.data;
                        this.lastPage = schoolList.data.lastPage;
                        this.currentPage = schoolList.data.currentPage;
                    })
                }, 2000)
            },
            load() {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false;
                    this.currentPage++;
                    api.getSchoolList(this.currentPage).then((schoolList) => {
                        schoolList.data.data.forEach((school) => {
                            this.schoolList.push(school);
                        });
                        this.currentPage = schoolList.data.currentPage;
                    })
                }, 2000)
            }
        },
        mounted() {
            api.getSchoolList().then((schoolList) => {
                console.log(schoolList);
                this.schoolList = schoolList.data.data;
                this.lastPage = schoolList.data.lastPage;
                this.currentPage = schoolList.data.currentPage;
            })
        }
    }
</script>

<style lang="scss">
    .school {
        width: 50%;
        float: left;
        padding: 2px;
        margin-top: 10px;

        a {
            &:link, &:hover, &:active, &:visited {
                text-decoration: none;
                color: black;
            }
        }
    }
</style>
