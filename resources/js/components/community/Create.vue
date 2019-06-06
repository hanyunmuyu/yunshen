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
                    <img :src="logo?logo:'/avatar.jpg'" alt=""
                         :style="`width:${imgWidth};height: ${imgHeight};`" name="avatar">
                </mu-avatar>
            </div>
            上传社团徽标
        </div>


        <mu-form ref="form" :model="validateForm" label-position="left">
            <mu-form-item label="社团名称" help-text="" prop="communityName" :rules="communityNameRules">
                <mu-text-field v-model="validateForm.communityName" prop="communityName"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="社团描述" prop="communityDescription" :rules="communityDescriptionRules">
                <mu-text-field multi-line v-model="validateForm.communityDescription"
                               prop="communityDescription"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="社团分类" prop="category" :rules="categoryRules">
                <mu-flex :key="category.id" v-for="category in categoryList">
                    <mu-checkbox :value="category.id" v-model="validateForm.category"
                                 :label="category.categoryName">

                    </mu-checkbox>
                </mu-flex>
            </mu-form-item>
            <mu-form-item>
                <mu-button :disabled="disabled" color="primary" @click="submit">创建</mu-button>
            </mu-form-item>
        </mu-form>
    </mu-container>
</template>

<script>
    import api from '../../api'

    export default {
        name: "Create",
        data() {
            return {
                file: '',
                showBg: false,
                logo: '',
                categoryList: [],
                communityNameRules: [
                    {validate: (val) => !!val, message: '社团名称不可以为空'},
                    {validate: (val) => val.length >= 3, message: '社团名称长度大于3'}
                ],
                passwordRules: [
                    {validate: (val) => !!val, message: '必须填写密码'},
                    {validate: (val) => val.length >= 3 && val.length <= 10, message: '密码长度大于3小于10'}
                ],
                communityDescriptionRules: [
                    {validate: (val) => !!val, message: '必须填写确认密码'},
                    {validate: (val) => val.length >= 3 && val.length <= 10, message: '密码长度大于3小于10'},
                ],
                categoryRules: [
                    {validate: (val) => !!val, message: '请选择社团类型'},
                    {validate: (val) => val.length, message: '至少选择一个社团分类'},
                ],
                validateForm: {
                    communityName: '',
                    communityDescription: '',
                    category: [],
                    logo: null,
                },
                disabled: false
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
                    if (v.code === 200) {
                        this.validateForm.logo = v.data.path;
                        this.logo = v.data.avatar;
                    }
                });
            },
            back() {
                this.$router.back();
            },
            submit() {
                this.disabled = true;
                setTimeout(() => {
                    this.disabled = false;
                }, 2000);
                if (this.validateForm.logo === null) {
                    this.$toast.error("请选择社团徽标");
                    return;
                }
                this.$refs.form.validate().then((result) => {
                    if (result === true) {
                        api.createCategory(this.validateForm).then((v) => {
                            if (v.code === 200) {
                                this.$router.back();
                            } else {
                                this.$toast.error(v.msg);
                            }
                        })
                    }
                });
            },
            getCommunityCategory() {
                api.getCommunityCategory().then((v) => {
                    this.categoryList = v.data;
                })
            }
        },
        mounted() {
            this.getCommunityCategory();
        }
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
