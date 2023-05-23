<template>
  <el-form :model="form" ref="form" label-position="left" label-width="160px" style="max-width: 540px" :rules="rules">
    <!-- NAMES -->
    <el-form-item label="First Name" required prop="firstName">
        <el-input
            v-model="form.firstName"
            label="First Name"
            placeholder="First Name"
        />
    </el-form-item>
    <el-form-item label="Last Name" required prop="lastName">
        <el-input
            v-model="form.lastName"
            label="Last Name"
            placeholder="Last Name"
        />
    </el-form-item>
    <!-- BIRTH DATE -->
    <el-form-item label="Birth Date" required prop="birthDate">
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
    <el-form-item label="Phone Number" required prop="phoneNumber">
        <el-input
                v-model="form.phoneNumber"
                label="Phone Number"
                placeholder="000 000 000"
            />
    </el-form-item>
    <!-- EMAIL ADDRESS -->
    <el-form-item label="E-mail" required prop="email">
        <el-input
                v-model="form.email"
                label="email"
                placeholder="your@address.com"
            />
    </el-form-item>
    <!-- EMPLOYEE -->
    <el-form-item label="Employee" required prop="employee">
        <el-select v-model="form.employee" class="m-2" placeholder="Select" size="large" filterable clearable>
            <el-option
            v-for="item in this.getEmployees"
            :key="item.id"
            :label="item.first_name + ' ' + item.last_name"
            :value="item.id"
            />
        </el-select>
    </el-form-item>
    <el-button type="primary" class="button" @click="submitForm('form')">Add Client</el-button>
  </el-form>
</template>

<script>
import { useClientStore } from '@/store/client';
import { useEmployeeStore } from '@/store/employee'
export default {
    name: 'AddClientComp',
    setup(){
        const clientStore = useClientStore();
        const employeeStore = useEmployeeStore();
        return {clientStore, employeeStore}
    },
    computed:{
        getEmployees(){
            return this.employeeStore.getEmployees;
        }
    },
    data() {
        return {
            form: {
                firstName: '',
                lastName: '',
                birthDate: '',
                phoneNumber: '',
                email: '',
                employee: '',
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
                    this.clientStore.addClient(this.form);
                } else {
                    return false;
                }
            });
        },
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
</style>