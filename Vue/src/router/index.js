import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import LoginView from "../views/LoginView.vue";
import ClientsView from "../views/ClientsView.vue";

const routes = [
	{
		path: "/",
		name: "home",
		component: HomeView,
	},
	{
		path: "/login",
		name: "login",
		component: LoginView,
	},
	{
		path: "/clients",
		name: "clients",
		component: ClientsView,
	},
];

const router = createRouter({
	history: createWebHashHistory(),
	routes,
});

export default router;
