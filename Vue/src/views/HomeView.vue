<template>
  <el-container class="dead-center">
    <div class="left-column">
      <div>
        <HomeButton
          title="Our Services"
          :image="require(`@/assets/marketplace_image.jpg`)"
        />
      </div>
      <div>
        <HomeButton
          title="bottom-left"
        />
      </div>
    </div>
    <div class="right-column">
      <div>
        <HomeButton
          title="top-right"
        />
      </div>
      <div>
        <HomeButton
          title="Profile"
          :image="require(`@/assets/profile_image.jpg`)"
          :disabled="!this.userStore.loggedIn"
        />
      </div>
    </div>
  </el-container>
</template>

<script>
import { useClientStore } from '@/store/client';
import { useUserStore } from '@/store/user';
import HomeButton from '@/components/HomeButtonComp.vue';

export default {
  name: 'HomeView',
  components:{
    HomeButton
  },
  setup(){
    const clientStore = useClientStore();
    const userStore = useUserStore();

    return {clientStore, userStore}
  },
  computed:{
  },
  data() {
    return {

    }
  },
  methods:{

  }
}
</script>

<style scoped>
.dead-center{
  display: flex;
  height: calc(100vh - 80px);
  justify-content: center;
  align-items: center;
  flex-direction: row;
  gap: 4px;
}
.left-column{
  display: flex;
  flex-direction: column;
  gap: 4px;
  transform: translate(0%,-35px);
}
.right-column{
  display: flex;
  flex-direction: column;
  gap: 4px;
  transform: translate(0%,35px);
}

</style>
