<template>
    <div v-if="!this.userStore.loggedIn">
        <el-menu
            :default-active="this.activeIndex"
            class="el-menu-demo"
            mode="horizontal"
            @select="handleSelect">
            <el-menu-item 
                v-for="(element, index) in linkBase" 
                :key="index" 
                :index="`${index+1}`">
                <router-link class="router-link" :to="{name: element.link}">{{ element.label }}</router-link>
            </el-menu-item>
        </el-menu>
    </div>
    <div v-else>
        <el-menu
            :default-active="this.activeIndex"
            class="el-menu-demo"
            mode="horizontal"
            @select="handleSelect">
            <el-menu-item 
                v-for="(element, index) in linkLogged" 
                :key="index" 
                :index="`${index+1}`">
                <router-link class="router-link" :to="{name: element.link}">{{ element.label }}</router-link>
            </el-menu-item>
            <el-menu-item @click="userStore.logout">
                <router-link class="router-link" :to="{name: 'home'}"> Log out </router-link>
            </el-menu-item>
        </el-menu>
    </div>

</template>
  
<script>
import { useUserStore } from '@/store/user';
export default {
    name: "NavigationComponent",
    setup(){
        const userStore = useUserStore();
        return {userStore}
    },
    data() {
        return {
        activeIndex: "1",
        linkBase: [
            {label: 'Home', link: 'home'},
            {label: 'Login', link: 'login'},
        ],
        linkLogged: [
            {label: 'Home', link: 'home'},
            {label: 'Clients', link: 'clients'},
            {label: 'Employees', link: 'employees'},
            {label: 'Cars', link: 'cars'},
        ]
        };
    },
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        }
    },
};
</script>

<style scoped>
a {
    text-decoration: none;
    display: flex;
    padding: 0 30px;
    color: white !important;
}
a:hover {
    background-color: #142d4c;
}
li:is(.el-menu-item) {
    padding: 0;
}
.el-menu-demo{
    display: flex;
    position: sticky;
    top: 0;
    z-index: 2;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    background: #9fd3c7;
    border-bottom: none !important;
}

li:has(.right) {
    display: flex;
    align-self: flex-end;
    margin-right: 0;
}

</style>