<template>
    <div>
        <mu-container>
            <mu-card v-for="index in 15" style="width: 50%; float: left;padding: 2px;margin-top: 10px" :key="index">
                <mu-card-media>
                    <img src="/school.png">
                </mu-card-media>
                <mu-card-title sub-title="" title="轮滑社团" style="text-align: center"></mu-card-title>
                <mu-flex class="flex-wrapper" align-items="center">
                    <mu-flex class="flex-demo" justify-content="center" fill>社团：100</mu-flex>
                    <mu-flex class="flex-demo" justify-content="center" fill>校友：100</mu-flex>
                </mu-flex>
                <mu-flex class="flex-wrapper" align-items="center">
                    <mu-flex class="flex-demo" justify-content="center" fill>活跃：</mu-flex>
                    <mu-flex class="flex-demo" justify-content="center" fill>
                        <mu-icon v-for="s in 5" value="star" color="primary" :key="s"></mu-icon>
                    </mu-flex>
                </mu-flex>

            </mu-card>
        </mu-container>
    </div>
</template>

<script>
    export default {
        name: "Community"
    }
</script>

<style scoped>

</style>
