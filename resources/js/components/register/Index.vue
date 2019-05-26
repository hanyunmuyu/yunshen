<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <div style="text-align: center;margin: 0 auto">注册</div>
        </mu-appbar>
        <mu-form ref="form" :model="validateForm" label-position="left">
            <mu-form-item label="用户名" help-text="" prop="username" :rules="usernameRules">
                <mu-text-field v-model="validateForm.username" prop="username"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="密码" prop="password" :rules="passwordRules">
                <mu-text-field type="password" v-model="validateForm.password" prop="password"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="确认密码" prop="confirmPassword" :rules="confirmPasswordRules">
                <mu-text-field type="password" v-model="validateForm.confirmPassword"
                               prop="confirmPassword"></mu-text-field>
            </mu-form-item>
            <mu-form-item>
                <mu-button color="primary" @click="submit">提交</mu-button>
            </mu-form-item>
        </mu-form>
    </mu-container>
</template>

<script>
    import storage from '../../storage'
    import api from '../../api'

    export default {
        name: "Login",
        data() {
            return {
                usernameRules: [
                    {validate: (val) => !!val, message: '必须填写用户名'},
                    {validate: (val) => val.length >= 3, message: '用户名长度大于3'}
                ],
                passwordRules: [
                    {validate: (val) => !!val, message: '必须填写密码'},
                    {validate: (val) => val.length >= 3 && val.length <= 10, message: '密码长度大于3小于10'}
                ],
                confirmPasswordRules: [
                    {validate: (val) => !!val, message: '必须填写确认密码'},
                    {validate: (val) => val.length >= 3 && val.length <= 10, message: '密码长度大于3小于10'},
                ],
                validateForm: {
                    username: 'hanyun',
                    password: '123456',
                    confirmPassword: '123456',
                }
            }
        },
        methods: {
            back() {
                this.$router.back();
            },
            submit() {
                this.$refs.form.validate().then((result) => {
                    if (result === true) {
                        api.register(this.validateForm).then((v) => {
                            console.log(v.code);
                            if (v.code === 200) {
                                // storage.setItem('user', v);
                                this.$router.back()
                            } else {

                            }
                        })
                    }
                });
            },
        },
    }
</script>

<style scoped>

</style>
