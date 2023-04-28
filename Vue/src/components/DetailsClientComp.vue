<template>
    <el-container class="info-container">
        <div class="clientInfo">
            <div class="clientNames">
            {{ this.getSelectedClient.firstName }}
            {{ this.getSelectedClient.lastName }}
            </div>
            <div class="clientDetails">
                <div>
                    Date of birth: {{ this.getSelectedClient.birthDate }}
                </div>
                <br/>
                <div> Phone Number: {{ this.getSelectedClient.phoneNumber }}</div>
                <div>E-mail: {{ this.getSelectedClient.email }}</div>
            </div>
        </div>
        <div class="employeeInfo">
            <div>Assigned Employee: </div> 
            <div class="employeeNames">
                {{ this.getSelectedClient.employee.firstName }}
                {{ this.getSelectedClient.employee.lastName }} 
            </div>
            <div>
                <div>Car:</div>
                <div>{{ this.getSelectedClient.car }}</div>
            </div>
        </div>
    </el-container>
    <div class="employeeInfo employeeNames">
        {{ this.getCosts }} PLN
    </div>
    <el-container class="purchase-container">
        <el-table :data="this.getSelectedClient.expenses" style="width: 100%">
            <el-table-column prop="itemName" label="Item Name" width="180px" sortable/>
            <el-table-column prop="cost" label="Cost" width="180px" sortable/>
            <el-table-column prop="quantity" label="Quant." width="120px" sortable/>
        </el-table>
    </el-container>
</template>

<script>
import { useClientStore } from '@/store/client';
export default {
    name: 'AddClientComp',
    setup(){
        const clientStore = useClientStore();
        return {clientStore}
    },
    computed:{
        getSelectedClient(){
            return this.clientStore.getSelectedClient;
        },
        getCosts(){
            let sum = 0;
            for(let item of this.clientStore.selectedClient.expenses){
                sum += item.quantity * item.cost;
            }
            return sum.toFixed(2);
        }
    },
    data() {
        return {
        }
    },
    methods: {
    },  
}
</script>

<style scoped>
.info-container{
    display: flex;
    flex-direction: row;
    gap: 50px;
    margin-left: 24px;
    margin-right: 24px;
    margin-bottom: 24px;
    justify-content: space-between;
}
.clientInfo{
    display: flex;
    flex-direction: column;
    text-align: left;
    margin: 5px;
    margin-top: 24px;
}
.clientNames{
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 24px;
}
.clientDetails{
    font-size: 14px;
}
.employeeInfo{
    display: flex;
    flex-direction: column;
    text-align: right;
    margin: 5px;
}
.employeeNames{
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 24px;
}
.purchase-container{
    display: flex;
    flex-direction: row;
    margin-left: 24px;
    margin-right: 24px;
    justify-content: center;
    
}
</style>