import { defineStore } from "pinia";

export const useClientStore = defineStore("client", {
	state: () => {
		return {
			selectedClient: Object,
			data: [
				{
					id: 1,
					firstName: "Adam",
					lastName: "Harvey",
					birthDate: "1984-10-12",
					phoneNumber: "612612763",
					email: "adam@harvey.com",
					car: "",
					employee: {
						id: 1,
						firstName: "Robert",
						lastName: "Krazuer",
					},
					expenses: [
						{
							itemName: "Bulbulator",
							cost: 19.99,
							quantity: 3,
						},
						{
							itemName: "Dymiarka",
							cost: 62.49,
							quantity: 1,
						},
					],
				},
				{
					id: 2,
					firstName: "Matthew",
					lastName: "Redestvoic",
					birthDate: "1999-01-30",
					phoneNumber: "754165153",
					email: "matthew@redestvoic.com",
					car: "Car1",
					employee: {
						id: 1,
						firstName: "Robert",
						lastName: "Krazuer",
					},
					expenses: [
						{
							itemName: "Dymiarka V.2",
							cost: 199.99,
							quantity: 1,
						},
					],
				},
				{
					id: 3,
					firstName: "Leona",
					lastName: "Kard",
					birthDate: "1979-05-15",
					phoneNumber: "123321123",
					email: "leona@kard.com",
					car: "Car3",
					employee: {
						id: 2,
						firstName: "Monica",
						lastName: "Klin",
					},
					expenses: [],
				},
			],
		};
	},
	actions: {
		getClientByID(id) {
			return this.data.find((x) => x.id == id);
		},
		addClient(form) {
			let id = 0;
			for (let d of this.data) {
				if (d.id > id) {
					id = d.id;
				}
			}
			id += 1;
			form.id = id;
			this.data.push(form);
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
			delete this.data[this.data.indexOf(this.selectedClient)];
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
