import { defineStore } from "pinia";
import axios from "axios";

export const useCarStore = defineStore("car", {
	state: () => {
		return {
			data: [
				{
					id: 1,
					modelName: "Fiat Punto",
					clientId: "1",
				},
				{
					id: 2,
					modelName: "Piat Funto",
					clientId: "1",
				},
				{
					id: 3,
					modelName: "Biat Bunto",
					clientId: "2",
				},
			],
		};
	},
	actions: {
		async fetchData() {
			await axios
				.get("cars")
				.then((res) => {
					console.log(res);
					this.data = res.data;
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
