<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <div style="text-align: center;margin: 0 auto">邂逅</div>
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
                            <mu-list-item-title>举报</mu-list-item-title>
                        </mu-list-item-content>
                    </mu-list-item>
                </mu-list>
            </mu-menu>
        </mu-appbar>

        <mu-carousel :active="active" style="margin-top: 10px">
            <template slot="indicator" slot-scope="{ index, active }">
                <mu-button icon class="mu-carousel-indicator-button"
                           :class="{'mu-carousel-indicator-button__active': active}" @click="changeActive(index)">
                    <span class="rect-indicator"></span>
                </mu-button>
            </template>
            <mu-carousel-item v-for="index in 10" :key="index">
                <img src="/school.png">
            </mu-carousel-item>
        </mu-carousel>
        <div id="bottom">
            <mu-avatar>
                <img src="/avatar.jpg">
            </mu-avatar>
            <ul>
                <li>我想静静</li>
                <li>29-河南-郑州</li>
                <li>甜甜的爱情在哪里</li>
            </ul>
        </div>
    </mu-container>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                active: 0
            }
        },
        methods: {
            changeActive(index) {
                this.active = index;
            }
        }
    }
</script>

<style lang="scss">
    #bottom {
        margin-top: 30px;
        display: flex;

        ul {
            flex: 1;
            list-style: none;
        }
    }
</style>
