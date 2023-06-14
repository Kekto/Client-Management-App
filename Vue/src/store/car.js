import { defineStore } from "pinia";
import axios from "axios";

export const useCarStore = defineStore("car", {
	state: () => {
		return {
			data: [],
		};
	},
	actions: {
		async fetchData() {
			await axios
				.get(`http://localhost:8000/api/cars`)
				.then((res) => {
					console.log(res);
					this.data = res.data.car;
				})
				.catch((err) => {
					console.log(err);
				});
		},
		getCarsByID(id) {
			return this.data.find((x) => x.id == id);
		},
	},
	getters: {
		getCars() {
			return this.data;
		},
	},
});
