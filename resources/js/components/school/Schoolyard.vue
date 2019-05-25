<template>
    <div>
        <mu-container>
            <mu-card class="school" v-for="index in 15" :key="index">
                <router-link :to="{path:'/school/detail',query:{id:index}}">
                    <mu-card-media>
                        <img src="/school.png">
                    </mu-card-media>
                    <mu-card-title sub-title="" title="河南工业大学" style="text-align: center"></mu-card-title>
                    <mu-flex class="flex-wrapper" align-items="center">
                        <mu-flex class="flex-demo" justify-content="center" fill>社团：100</mu-flex>
                        <mu-flex class="flex-demo" justify-content="center" fill>校友：100</mu-flex>
                    </mu-flex>
                    <mu-flex class="flex-wrapper" align-items="center">
                        <mu-flex class="flex-demo" justify-content="center" fill>星级：</mu-flex>
                        <mu-flex class="flex-demo" justify-content="center" fill>
                            <mu-icon v-for="s in 4" value="star" color="primary" :key="s"></mu-icon>
                        </mu-flex>
                    </mu-flex>
                </router-link>
            </mu-card>
        </mu-container>
    </div>
</template>

<script>
    export default {
        name: "Schoolyard",
        data() {
            return {
                active: 0,
                shift: 'explore'
            };
        },
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
