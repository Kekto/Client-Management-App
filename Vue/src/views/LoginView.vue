<template>
    <el-container class="container">
        <el-form :model="form" label-width="120px">
            <el-form-item label="Login">
                <el-input v-model="form.login" />
            </el-form-item>
            <el-form-item label="Password">
                <el-input v-model="form.password" type="password" show-password />
            </el-form-item>
        </el-form>
        <el-button class="button" @click="login"> Login</el-button>
        <div style="margin-top: 50px;">
            The two accounts working locally on pinia:
            <div>l: admin p: password</div>
            <div>l: user p: password</div>
        </div>
    </el-container>
</template>

<script>
import { useUserStore } from '@/store/user';
export default {
    name: 'LoginView',
    setup(){
        const userStore = useUserStore();

        return {userStore}
    },
    computed:{
    },
    data() {
        return {
            form:{
                login: '',
                password: '',
            }
        }
    },
    methods:{
        login(){
            this.userStore.login(this.form);
        }
    }
    }
</script>

<style scoped>
.container{
    display: flex;
    flex-direction: column;
    margin-top: 48px;
    margin-left:20%;
    margin-right:20%;
    justify-content: center;
}

.button{
    background-color: #9fd3c7;
    border-color: #9fd3c7;
    width: fit-content;
    display: flex;
    align-self: center;  
    padding: 10px;
    --el-button-hover-bg-color: #bde6dc;
    --el-button-hover-color: #bde6dc;
    --el-button-hover-text-color: white;
    color: white;
}
.button:hover{
    background-color: #bde6dc;
    border-color: #bde6dc;
    color: white;
}
</style>
  