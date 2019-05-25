<template>
    <mu-container>
        <div v-for="i in 15" class="post" :key="i">
            <div style="width: 100%;margin-top: 10px">
                <mu-avatar style="float: left">
                    <img src="/avatar.jpg">
                </mu-avatar>
                <div style="float: left;margin-left: 16px">
                    <h5>
                        羽毛球社团
                    </h5>
                    <h6>
                        2019-05-26
                    </h6>
                </div>
            </div>
            <div style="clear: both">
                <p><span>举办方：</span>河南工业大学-羽毛球社团</p>
                <p><span>活动介绍：</span>河南工业大学，羽毛球社团于今天下午3点钟举行活动，望大家前来观看</p>
                <p><span>时间：</span>2019-05-25 15:00 - 2019-05-25 17:00</p>
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
        name: "Activity",
    }
</script>

<style scoped lang="scss">

</style>
