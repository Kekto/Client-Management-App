<template>
  <el-container>
    <el-main>
      <div class="searchbar">
        <el-input v-model="this.search"/>
      </div>
      <div class="button-add">
        <el-button type="primary">
          Add
        </el-button>
      </div>
      <el-table :data="getClients" style="width: 100%" class="table">
        <el-table-column fixed prop="firstName" label="First Name" width="200px" sortable/>
        <el-table-column fixed prop="lastName" label="Last Name" width="200px" sortable/>
        <el-table-column prop="car" label="car" width="auto" sortable/>
        <el-table-column prop="employee.firstName" label="employee" width="200px" sortable/>
        <el-table-column fixed="right" label="Operations" width="200px">
          <template #default="props">
            <el-button link type="primary" size="small" @click="clickDetails(props.row.id)">
              Detail
              </el-button>
            <el-button link type="primary" size="small">
              Edit
            </el-button>
            <el-button link type="primary" size="small">
              Delete
            </el-button>
          </template>
        </el-table-column>
      </el-table>
    </el-main>
  </el-container>
</template>

<script>
import { useClientStore } from '@/store/client';
export default {
  name: 'HomeView',
  setup(){
    const clientStore = useClientStore();

    return {clientStore}
  },
  computed:{
    getClients(){
      return this.clientStore.getClients
    },
  },
  data() {
    return {
      search: ''
    }
  },
  methods:{
    clickDetails(id){
      console.log(this.clientStore.getClientByID(id));
    }
  }
}
</script>

<style scoped>
.table{
  display: flex;
}
.button-add{
  display: flex;
  justify-content: end;
  margin: 4px;
  margin-top: 20px;
  margin-right: 28px;
}
</style>
