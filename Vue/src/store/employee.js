import { defineStore } from "pinia";

export const useEmployeeStore = defineStore("employee", {
	state: () => {
		return {
			data: [
				{
					id: 1,
					firstName: "Robert",
					lastName: "Krazuer",
					clientId: 1,
				},
				{
					id: 2,
					firstName: "Monica",
					lastName: "Klin",
					clientId: 1,
				},
				{
					id: 3,
					firstName: "Katherine",
					lastName: "Wang",
					clientId: 1,
				},
			],
		};
	},
	actions: {
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
