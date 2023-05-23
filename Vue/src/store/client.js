import axios from "axios";
import { defineStore } from "pinia";

export const useClientStore = defineStore("client", {
	state: () => {
		return {
			selectedClient: Object,
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
		updateClient(form) {
			this.data[this.data.indexOf(this.selectedClient)].firstName =
				form.firstName;
			this.data[this.data.indexOf(this.selectedClient)].lastName =
				form.lastName;
			this.data[this.data.indexOf(this.selectedClient)].birthDate =
				form.birthDate;
			this.data[this.data.indexOf(this.selectedClient)].email = form.email;
			this.data[this.data.indexOf(this.selectedClient)].phoneNumber =
				form.phoneNumber;
			this.data[this.data.indexOf(this.selectedClient)].employee =
				form.employee;
			console.log(this.data[this.data.indexOf(this.selectedClient)]);
		},
		deleteClient() {
			let temp = this.data.splice(this.data.indexOf(this.selectedClient));
			this.data = this.data.concat(temp.slice(1));
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
