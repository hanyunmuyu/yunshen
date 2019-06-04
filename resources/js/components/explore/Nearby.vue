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

                <img v-if="i%3===0" v-for="index in 6" src="/avatar.jpg" style="width: 33.33%;padding: 2px"
                     :key="index">
                <video-player v-if="i%2===0" class="vjs-custom-skin"
                              :id="i"
                              ref="videoPlayer"
                              :options="playerOptions"
                              :playsinline="true"
                              @play="onPlayerPlay($event,i)"
                              @pause="onPlayerPause($event)"
                              @ended="onPlayerEnded($event)"
                              @loadeddata="onPlayerLoadeddata($event)"
                              @waiting="onPlayerWaiting($event)"
                              @playing="onPlayerPlaying($event)"
                              @timeupdate="onPlayerTimeupdate($event)"
                              @canplay="onPlayerCanplay($event)"
                              @canplaythrough="onPlayerCanplaythrough($event)"
                              @ready="playerReadied"
                              @statechanged="playerStateChanged($event)">
                </video-player>
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
        data() {
            return {
                // videojs options
                playerOptions: {
                    height: '150',
                    autoplay: false,
                    muted: false,
                    language: 'en',
                    playbackRates: [0.7, 1.0, 1.5, 2.0],
                    sources: [{
                        src: "/oceans.mp4",
                    }],
                }
            }
        },
        mounted() {

        },
        computed: {
            player() {
                return this.$refs.videoPlayer.player
            }
        },
        methods: {
            // listen event
            onPlayerPlay(player, i) {
                for (let p in  this.$refs.videoPlayer) {
                    if (this.$refs.videoPlayer[p].$attrs.id !== i) {
                        this.$refs.videoPlayer[p].player.pause();
                        // this.$refs.videoPlayer[p].player.currentTime(this.$refs.videoPlayer[p].player.getCurrentTime_());
                    }
                }
            },
            onPlayerPause(player) {
                // console.log('player pause!', player)
            },
            onPlayerEnded(player) {
                // console.log('player ended!', player)
            },
            onPlayerLoadeddata(player) {
                player.currentTime(1);
                // console.log('player Loadeddata!', player)
            },
            onPlayerWaiting(player) {
                // console.log('player Waiting!', player)
            },
            onPlayerPlaying(player) {
                // console.log('player Playing!', player)
            },
            onPlayerTimeupdate(player) {
                // console.log('player Timeupdate!', player.currentTime())
            },
            onPlayerCanplay(player) {
                // console.log('player Canplay!', player)
            },
            onPlayerCanplaythrough(player) {
                // console.log('player Canplaythrough!', player)
            },
            // or listen state event
            playerStateChanged(playerCurrentState) {
                // console.log('player current update state', playerCurrentState)
                // for (let p in  this.$refs.videoPlayer) {
                //     this.$refs.videoPlayer[p].player.pause();
                // }
                // player.play();
            },
            // player is ready
            playerReadied(player) {
                // seek to 10s
                // player.currentTime(1);
                // console.log('example 01: the player is readied', player)
            }
        }
    }
</script>

<style scoped lang="scss">

</style>
