<template>
  <el-container class="banner-wrapper">
    <div class="banner">
      <img class="image" :src="require(`@/assets/marketplace_image.jpg`)">
      <div class="banner-card right">
        <div class="banner-card-text">
          With many marketplaces to choose from you can find the products you desire most
        </div>
      </div>
    </div>
    <div class="banner">
      <img class="image" :src="require(`@/assets/profile_image.jpg`)">
      <div class="banner-card left">
        <div class="banner-card-text">
          With any problems, questions or needs, you can count on our assistants to make it right
        </div>
      </div>
    </div>
  </el-container>
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
.banner-wrapper{
  display:flex;
  flex-direction: column;
  gap: 5px;
  margin-top: 5px;
}
.banner{
  display: flex;
}
.banner-card{
  display: flex;
  position: absolute;
  background-color: #9FD3C7;
  -webkit-box-shadow: 11px 8px 0px -1px rgba(255, 255, 255, 1);
  -moz-box-shadow: 11px 8px 0px -1px rgba(255, 255, 255, 1);
  box-shadow: 11px 8px 0px -1px rgba(255, 255, 255, 1);
  width:200px;
  padding: 20px;
  align-self: center;
}
.right{
  right: 50px;
}
.left{
  left: 50px;
}
.banner-card-text{
  font-weight: bold;
  font-size: 16px;
  text-justify:auto;
  color: white;

}
.image{
  width: 100vw;
  height: 300px;
  max-width: calc(100vw - 2em);
  box-sizing: border-box;
  object-fit: cover;
}
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
