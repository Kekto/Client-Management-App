<template>
  <div v-if="!userStore.loggedIn" class="logged-out">
    Log in first to manage Clients
  </div>
  <div v-else>
    <el-container>
      <el-main>
        <div class="search-header">
          <div class="searchbar">
            <el-input v-model="this.search"/>
          </div>
          <div class="button-add">
            <el-button class="button" type="primary" @click="addDialogToggle = !addDialogToggle">
              Add
            </el-button>
          </div>
        </div>

        <!-- CLIENT TABLE -->
        <el-table :data="paginated" style="width: 100%" class="table">
          <el-table-column fixed prop="first_name" label="First Name" width="180px" sortable/>
          <el-table-column fixed prop="last_name" label="Last Name" width="fit-content" sortable/>
          <!-- <el-table-column prop="car" label="Car" width="fit-content" sortable/> -->
          <el-table-column prop="employees_last_name" label="Employee" width="200px" sortable/>
          <el-table-column fixed="right" label="Operations" width="200px">
            <template #default="props">
              <el-button link type="primary" size="small" @click="clickDetails(props.row.id)">
                Detail
                </el-button>
              <el-button link type="primary" size="small" @click="clickEdit(props.row.id)">
                Edit
              </el-button>
              <el-button link type="primary" size="small" @click="clickDelete(props.row.id)">
                Delete
              </el-button>
            </template>
          </el-table-column>
        </el-table>
      </el-main>
    </el-container>
    <el-pagination
        small
        background
        layout="prev, pager, next"
        :total="filteredClients.length"
        :page-size="pageSize"
        v-model:current-page="current"
        class="mt-4"

        style="justify-content: center;"
      />
    <!-- ADD CLIENT DIALOG -->
    <el-dialog
      v-model="addDialogToggle"
      width="fit-content"
      destroy-on-close
    >
      <AddClientComp/>
    </el-dialog>
    <!-- DETAILS CLIENT DIALOG -->
    <el-dialog
      v-model="detailsDialogToggle"
      width="fit-content"
      destroy-on-close
    >
      <DetailsClientComp/>
    </el-dialog>
    <!-- EDIT CLIENT DIALOG -->
    <el-dialog
      v-model="editDialogToggle"
      width="fit-content"
      destroy-on-close
    >
      <UpdateClientComp/>
    </el-dialog>
  </div>

  <!-- DELETE CLIENT DIALOG -->
</template>

<script>
import { useClientStore } from '@/store/client';
import { useUserStore } from '@/store/user';
import { useCarStore } from '@/store/car';
import { useEmployeeStore } from '@/store/employee';
import AddClientComp from '@/components/AddClientComp.vue';
import DetailsClientComp from '@/components/DetailsClientComp.vue';
import UpdateClientComp from '@/components/UpdateClientComp.vue';
export default {
  name: 'HomeView',
  components:{
    AddClientComp, DetailsClientComp, UpdateClientComp
  },
  setup(){
    const clientStore = useClientStore();
    const userStore = useUserStore();
    const carStore = useCarStore();
    const employeeStore = useEmployeeStore();

    clientStore.fetchData();
    employeeStore.fetchData();


    return {clientStore, userStore, carStore}
  },
  computed:{
    getClients(){
      return this.clientStore.getClients
    },
    filteredClients(){
      return this.clientStore.getClients.filter(
        client => 
          !this.search || 
           this.search.split(' ').every(w => 
            client.first_name.toLowerCase().includes(w.toLowerCase()) 
            || client.last_name.toLowerCase().includes(w.toLowerCase()) 
            )
        )
    },
    indexStart() {
      return (this.current - 1) * this.pageSize;
    },
    indexEnd() {
      return this.indexStart + this.pageSize;
    },
    paginated(){
      return this.filteredClients.slice(this.indexStart, this.indexEnd);
    }
  },
  data() {
    return {
      search: '',
      current: 1,
      pageSize: 10,
      addDialogToggle: false,
      detailsDialogToggle: false,
      editDialogToggle: false,
      deleteDialogToggle: false,
    }
  },
  methods:{
    clickDetails(id){
      this.detailsDialogToggle = !this.detailsDialogToggle;
      // console.log(id)
      this.clientStore.getClientByID(id);
    },
    clickEdit(id){
      this.editDialogToggle = !this.editDialogToggle;
      this.clientStore.selectedClient = this.clientStore.getClientByID(id);
    },
    clickDelete(id){
      this.deleteDialogToggle = !this.deleteDialogToggle;
      console.log(id)
      this.clientStore.selectedClient = this.clientStore.getClientByID(id);
      this.clientStore.deleteClient();
    },
  }
}
</script>

<style scoped>
.logged-out{
  display: block;
  position: fixed;
  font-size: 28px;
  color: #9fd3c7;
  font-weight: bold;
  height: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%,0);
}
.search-header{
  display: flex;
  align-items: center;
  margin-bottom: 24px;
  justify-content: center;
}
.searchbar{
  width: 40vw;
}
.table{
  display: flex;
}
.button-add{
  display: flex;
  justify-content: end;
  margin: 4px;
  margin-right: 28px;
}
.button{
    background-color: #9fd3c7;
    border-color: #9fd3c7;
    width: fit-content;
    padding: 10px;
    --el-button-hover-bg-color: #bde6dc;
    --el-button-hover-color: #bde6dc;
    --el-button-hover-text-color: white;
}
.button:hover{
    background-color: #bde6dc;
    border-color: #bde6dc;
    color: white;
}
</style>
