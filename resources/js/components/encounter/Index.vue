<template>
    <mu-container>
        <mu-carousel :active="active">
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
