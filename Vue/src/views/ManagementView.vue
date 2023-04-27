<template>
  <h1>Management View</h1>
  <el-container>
    <el-aside width="120px"/>
    <div class="demo-collapse">
      <el-collapse v-model="activeName" accordion>
        <el-collapse-item title="Add Client" name="1">
          <AddClientComp/>
        </el-collapse-item>
        <el-collapse-item title="Update Client" name="2">
          <UpdateClientComp/>
        </el-collapse-item>
        <el-collapse-item title="Delete Client" name="3">
          <DeleteClientComp/>
        </el-collapse-item>
      </el-collapse>
    </div>
    <el-aside width="120px"/>
  </el-container>
</template>

<script>
import AddClientComp from '@/components/AddClientComp.vue'
import UpdateClientComp from '@/components/UpdateClientComp.vue'
import DeleteClientComp from '@/components/DeleteClientComp.vue'
export default {
  name: 'ManagementView',
  components:{
    AddClientComp, UpdateClientComp, DeleteClientComp
  },
  data() {
    return {
      activeName: '0'
    }
  },
}
</script>

<style scoped>
.demo-collapse{
  width: 100%;
  margin-top: 24px;
}
</style>