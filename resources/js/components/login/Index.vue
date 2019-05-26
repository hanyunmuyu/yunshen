<template>
    <mu-container>
        <mu-appbar style="width: 100%;" color="primary" textColor="white">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
            <div style="text-align: center;margin: 0 auto">登录</div>
        </mu-appbar>
        <mu-form ref="form" :model="validateForm" label-position="left">
            <mu-form-item label="用户名" help-text="" prop="username" :rules="usernameRules">
                <mu-text-field v-model="validateForm.username" prop="username"></mu-text-field>
            </mu-form-item>
            <mu-form-item label="密码" prop="password" :rules="passwordRules">
                <mu-text-field type="password" v-model="validateForm.password" prop="password"></mu-text-field>
            </mu-form-item>
            <mu-form-item>
                <mu-button :disabled="disabled" color="primary" @click="submit">登录</mu-button>
                <mu-button to="/register">注册</mu-button>
                <mu-button flat>忘记密码</mu-button>
            </mu-form-item>
        </mu-form>
    </mu-container>
</template>

<script>
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
                validateForm: {
                    username: 'hanyun',
                    password: '123456',
                },
                disabled: false,
            }
        },
        methods: {
            back() {
                this.$router.back();
            },
            submit() {
                this.disabled = true;
                setTimeout(() => {
                    this.disabled = false;
                }, 2000);
                this.$refs.form.validate().then((result) => {
                    if (result === true) {
                        api.login(this.validateForm).then((v) => {
                            if (v.code === 200) {
                                this.$store.dispatch('login', v.data)
                                this.$router.back()
                            } else {
                                this.$toast.error(v.msg);
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
