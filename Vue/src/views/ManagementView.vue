<template>
  <el-container>
    <el-aside width="120px"/>
    <div class="demo-collapse">
      <el-collapse v-model="activeName" accordion>
        <el-collapse-item title="Add User" name="1">
          <AddUserComp/>
        </el-collapse-item>
        <el-collapse-item title="Update User" name="2">
          <UpdateUserComp/>
        </el-collapse-item>
        <el-collapse-item title="Delete User" name="3">
          <DeleteUserComp/>
        </el-collapse-item>
      </el-collapse>
    </div>
    <el-aside width="120px"/>
  </el-container>
</template>

<script>
import AddUserComp from '@/components/AddUserComp.vue'
import UpdateUserComp from '@/components/UpdateUserComp.vue'
import DeleteUserComp from '@/components/DeleteUserComp.vue'
export default {
  name: 'ManagementView',
  components:{
    AddUserComp, UpdateUserComp, DeleteUserComp
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