import axios from "axios";
import { defineStore } from "pinia";

export const useClientStore = defineStore("client", {
	state: () => {
		return {
			selectedClient: [],
			data: [],
		};
	},
	actions: {
		async fetchData() {
			await axios
				.get(`http://localhost:8000/api/clients`)
				.then((res) => {
					console.log(res);
					this.data = res.data.client;
				})
				.catch((err) => {
					console.log(err);
				});
		},
		async getClientByID(id) {
			await axios
				.get(`http://localhost:8000/api/clients/details/${id}`)
				.then((res) => {
					console.log(res);
					this.selectedClient = res.data.client;
				})
				.catch((err) => {
					console.log(err);
				});
		},
		async addClient(form) {
			await axios
				.post(`http://localhost:8000/api/clients`, form)
				.then((res) => {
					console.log(res);
				})
				.catch((err) => {
					console.log(err);
				});
		},
		async updateClient(id, form) {
			await axios
				.put(`http://localhost:8000/api/clients/${id}`, form)
				.then((res) => {
					console.log(res);
				})
				.catch((err) => {
					console.log(err);
				});
		},
		async deleteClient(id) {
			await axios
				.delete(`http://localhost:8000/api/clients/${id}`)
				.then((res) => {
					console.log(res);
				})
				.catch((err) => {
					console.log(err);
				});
		},
	},
	getters: {
		getClients() {
			return this.data;
		},
		getSelectedClient() {
			return this.selectedClient;
		},
	},
});
