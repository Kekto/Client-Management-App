import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ManagementView from "../views/ManagementView.vue";

const routes = [
	{
		path: "/",
		name: "home",
		component: HomeView,
	},
	{
		path: "/management",
		name: "management",
		component: ManagementView,
	},
];

const router = createRouter({
	history: createWebHashHistory(),
	routes,
});

export default router;
