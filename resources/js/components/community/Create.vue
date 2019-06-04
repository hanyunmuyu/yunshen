<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <div style="text-align: center;margin: 0 auto">创建社团</div>
        </mu-appbar>

        <div class="avatar">
            <div @mouseover="showBg=true" @mouseleave="showBg=false">
                <input type="file" class="input-file" name="avatar"
                       ref="avatarInput" @change="changeImage($event)"
                       accept="image/gif,image/jpeg,image/jpg,image/png">
                <mu-avatar>
                    <img :src="avatar?avatar:'/avatar.jpg'" alt=""
                         :style="`width:${imgWidth};height: ${imgHeight};`" name="avatar">
                </mu-avatar>
            </div>
            上传社团徽标
        </div>
    </mu-container>
</template>

<script>
    import api from '../../api'

    export default {
        name: "Create",
        data() {
            return {
                avatar: '',
                file: '',
                showBg: false
            }
        },
        props: ["uploadType", "imgUrl", "imgWidth", "imgHeight"],
        created() {
            this.avatar = this.imgUrl
        },
        methods: {
            changeImage: function (e) {
                let file = e.target.files[0];
                if (file) {
                    this.file = file
                    let reader = new FileReader()
                    let that = this
                    reader.readAsDataURL(file)
                    reader.onload = function (e) {
                        // 这里的this 指向reader
                        that.avatar = this.result
                    }
                    this.upload();
                }
            },
            upload: function () {
                let files = this.$refs.avatarInput.files
                let fileData = {}
                if (files instanceof Array) {
                    fileData = files[0]
                } else {
                    fileData = this.file
                }
                // console.log('fileData', typeof fileData, fileData)
                let data = new FormData()
                data.append('avatar', fileData)
                data.append('operaType', this.uploadType)
                api.upload(data).then((v) => {
                    if (v.data.code === 200) {
                        this.avatar = v.data.avatar;
                    }
                });
            },
            back() {
                this.$router.back();
            }
        },
    }
</script>

<style scoped lang="scss">
    .avatar {
        cursor: pointer;
        position: relative;
        margin: 0 auto;
        text-align: center;

        .input-file {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
    }
</style>
