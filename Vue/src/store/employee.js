import { defineStore } from "pinia";
import axios from "axios";

export const useEmployeeStore = defineStore("employee", {
	state: () => {
		return {
			data: [],
		};
	},
	actions: {
		async fetchData() {
			await axios
				.get(`http://localhost:8000/api/employees`)
				.then((res) => {
					console.log(res);
					this.data = res.data.employee;
				})
				.catch((err) => {
					console.log(err);
				});
		},
		getEmployeeByID(id) {
			return this.data.find((x) => x.id == id);
		},
	},
	getters: {
		getEmployees() {
			return this.data;
		},
	},
});
