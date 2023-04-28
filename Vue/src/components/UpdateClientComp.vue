<template>
    <el-container>
        <!-- TEMPLATE FORM -->
        <el-main style="max-width: 600px;">
            <el-form :model="formTemplate" label-position="left" label-width="120px" style="max-width: auto" :rules="rules" disabled>
                <!-- NAMES -->
                <el-form-item label="First Name" required>
                    <el-input
                        v-model="formTemplate.firstName"
                        placeholder="First Name"
                    />
                </el-form-item>
                <el-form-item label="Last Name" required>
                    <el-input
                        v-model="formTemplate.lastName"
                        placeholder="Last Name"
                    />
                </el-form-item>
                <!-- BIRTH DATE -->
                <el-form-item label="Birth Date" required>
                    <el-date-picker
                        v-model="formTemplate.birthDate"
                        type="date"
                        placeholder="Pick a date"
                        style="width: 100%"
                    />
                </el-form-item>
                <!-- PHONE NUMBER -->
                <el-form-item label="Phone Number" required>
                    <el-input
                            v-model="formTemplate.phoneNumber"
                            placeholder="000 000 000"
                        />
                </el-form-item>
                <!-- EMAIL ADDRESS -->
                <el-form-item label="E-mail" required>
                    <el-input
                            v-model="formTemplate.email"
                            placeholder="your@address.com"
                        />
                </el-form-item>
                <!-- EMPLOYEE -->
                <el-form-item label="Employee" required>
                    <el-select v-model="formTemplate.employee" class="m-2"  size="large">
                        <el-option
                        v-for="item in this.getEmployees"
                        :key="item.id"
                        :label="item.firstName + ' ' + item.lastName"
                        :value="item.id"
                        />
                    </el-select>
                </el-form-item>
            </el-form>
        </el-main>
        <el-aside class="aside">
            <el-button type="primary" class="button" @click="copyForm">
                <el-icon><ArrowRightBold /></el-icon>
            </el-button>
            <br/>
            <el-button type="primary" class="button" @click="cleanForm">
                <el-icon><Delete /></el-icon>
            </el-button>
        </el-aside>
        <!-- ACTIVE FORM -->
        <el-main style="max-width: 500px;">
            <el-form :model="form" ref="form" style="max-width: auto" :rules="rules">
                <!-- NAMES -->
                <el-form-item required prop="firstName">
                    <el-input
                        v-model="form.firstName"
                        label="First Name"
                        placeholder="First Name"
                    />
                </el-form-item>
                <el-form-item required prop="lastName">
                    <el-input
                        v-model="form.lastName"
                        label="Last Name"
                        placeholder="Last Name"
                    />
                </el-form-item>
                <!-- BIRTH DATE -->
                <el-form-item required prop="birthDate">
                    <el-date-picker
                        v-model="form.birthDate"
                        type="date"
                        label="Pick a date"
                        placeholder="Pick a date"
                        value-format="YYYY-MM-DD"
                        style="width: 100%"
                    />
                </el-form-item>
                <!-- PHONE NUMBER -->
                <el-form-item required prop="phoneNumber">
                    <el-input
                            v-model="form.phoneNumber"
                            label="Phone Number"
                            placeholder="000 000 000"
                        />
                </el-form-item>
                <!-- EMAIL ADDRESS -->
                <el-form-item required prop="email">
                    <el-input
                            v-model="form.email"
                            label="email"
                            placeholder="your@address.com"
                        />
                </el-form-item>
                <!-- EMPLOYEE -->
                <el-form-item required prop="employee">
                    <el-select v-model="form.employee" class="m-2" placeholder="Select" size="large" filterable clearable>
                        <el-option
                        v-for="item in this.getEmployees"
                        :key="item.id"
                        :label="item.firstName + ' ' + item.lastName"
                        :value="item.id"
                        />
                    </el-select>
                </el-form-item>
            </el-form>
        </el-main>
    </el-container>
    <el-button type="primary" class="button" @click="submitForm('form')">Update Client</el-button>
</template>

<script>
import { useClientStore } from '@/store/client';
import { useEmployeeStore } from '@/store/employee'
export default {
name: 'UpdateClientComp',
setup(){
    const clientStore = useClientStore();
    const employeeStore = useEmployeeStore();
    return {clientStore, employeeStore}
},
mounted(){
    this.fillForm();
},
computed:{
        getEmployees(){
            return this.employeeStore.getEmployees;
        }
    },
data() {
        return {
            formTemplate:{
                firstName: '',
                lastName: '',
                birthDate: '',
                phoneNumber: '',
                email: '',
                employee: '',
            },
            form: {
                firstName: '',
                lastName: '',
                birthDate: '',
                phoneNumber: '',
                email: '',
                employee: "",
            },
            employees:{
                employee1:{
                    firstName: 'First Name',
                    lastName: 'Last Name1',
                },
                employee2:{
                    firstName: 'First Name',
                    lastName: 'Last Name2',
                },
                employee3:{
                    firstName: 'First Name',
                    lastName: 'Last Name3',
                },
            },
            rules:{
                firstName: [
                    { required: true, message: 'Please input first name', trigger: 'blur' },
                ],
                lastName: [
                    { required: true, message: 'Please input last name', trigger: 'blur' },
                ],
                birthDate: [
                    { required: true, message: 'Please select date', trigger: 'blur' },
                ],
                phoneNumber: [
                    { required: true, message: 'Please input phone number', trigger: 'blur' },
                    { min:9, max:9, message: 'Phone Number must be exactly 9 digits', trigger: 'blur' },
                    { pattern: '^([0-9][0-9]*)$', message: 'Must be a number', trigger: 'blur' },
                ],
                email: [
                    { required: true, message: 'Please input email address', trigger: 'blur' },
                    { type: 'email', message: 'Must be an email address', trigger: 'blur' },
                ],
                employee: [
                    { required: true, message: 'Please select an employee', trigger: 'blur' },
                ],
            },
        }
    },
    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    let id = this.form.employee;
                    this.form.employee = this.employeeStore.getEmployeeByID(id)
                    this.clientStore.updateClient(this.form);
                } else {
                    return false;
                }
            });
        },
        copyForm(){
            this.form.firstName = this.formTemplate.firstName
            this.form.lastName = this.formTemplate.lastName
            this.form.birthDate = this.formTemplate.birthDate
            this.form.phoneNumber = this.formTemplate.phoneNumber
            this.form.email = this.formTemplate.email
            this.form.employee = this.formTemplate.employee
        },
        cleanForm(){
            this.form = {
                firstName: '',
                lastName: '',
                birthDate: '',
                phoneNumber: '',
                email: '',
                employee: '',
            }
        },
        fillForm(){
            this.formTemplate.firstName = this.clientStore.selectedClient.firstName;
            this.formTemplate.lastName = this.clientStore.selectedClient.lastName;
            this.formTemplate.birthDate = this.clientStore.selectedClient.birthDate;
            this.formTemplate.phoneNumber = this.clientStore.selectedClient.phoneNumber;
            this.formTemplate.email = this.clientStore.selectedClient.email;
            this.formTemplate.employee = this.clientStore.selectedClient.employee.id;
        }
    },  
}
</script>

<style scoped>
.button{
    background-color: #9fd3c7;
    border-color: #9fd3c7;
    width: fit-content;
    margin: 5px;
    padding: 10px;
    --el-button-hover-bg-color: #bde6dc;
    --el-button-hover-color: #bde6dc;
    --el-button-hover-text-color: white;
}
.button:hover{
    background-color: #bde6dc;
    border-color: #bde6dc;
    color: white;
}
.aside{
    width: auto;
    display: flex;
    flex-direction: column;
    align-self: center;
    align-items: center;
}
</style>