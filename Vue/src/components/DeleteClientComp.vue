<template>
    <el-container class="info-container">
        <div>Are you sure you want to delete entry:</div>
        <div class="clientInfo">
            <div class="clientNames">
            {{ this.getSelectedClient.client?.first_name }}
            {{ this.getSelectedClient.client?.last_name }}
            </div>
        </div>
        <el-button type="danger" @click="this.deleteClient()">
            Delete
        </el-button>
    </el-container>
</template>

<script>
import { useClientStore } from '@/store/client';
export default {
    name: 'DeleteClientComp',
    setup(){
        const clientStore = useClientStore();
        return {clientStore}
    },
    computed:{
        getSelectedClient(){
            return this.clientStore.getSelectedClient;
        },
    },
    data() {
        return {
        }
    },
    methods: {
        deleteClient(){
            this.clientStore.deleteClient(this.getSelectedClient.client.id);
        }
    },  
}
</script>

<style scoped>
.info-container{
    display: flex;
    flex-direction: row;
    gap: 20px;
    margin-left: 24px;
    margin-right: 24px;
    justify-content: space-between;
    flex-direction: column;
}
.clientInfo{
    display: flex;
    flex-direction: column;
    text-align: center;
    margin-top: 24px;
    margin-bottom: 24px;
}
.clientNames{
    font-size: 16px;
    font-weight: bold;
}
</style>