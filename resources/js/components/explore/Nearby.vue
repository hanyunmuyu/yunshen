<template>
    <div>
        <mu-container>
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

    </div>
</template>

<script>
    export default {
        name: "Nearby",
    }
</script>

<style scoped lang="scss">

</style>
