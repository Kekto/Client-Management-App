import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
	state: () => {
		return {
			loggedIn: true,
			data: [
				{
					login: "admin",
					password: "secret",
				},
				{
					login: "user",
					password: "secret",
				},
			],
		};
	},
	actions: {
		login(form) {
			console.log(form);
			if (
				this.data.some(
					(x) => x.login == form.login && x.password == form.password
				)
			) {
				this.loggedIn = true;
				console.log("Logged In");
			}
		},
		logout() {
			console.log("Logged Out");
			this.loggedIn = false;
		},
	},
	getters: {},
});
