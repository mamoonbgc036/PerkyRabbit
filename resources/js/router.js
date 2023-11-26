import { createRouter, createWebHistory } from 'vue-router';
import Login from './Pages/Admin/Login.vue';
import Register from './Pages/Admin/Register.vue';
import Dashboard from './Pages/Dashboard/Dashboard.vue';
import AddDepartment from './Pages/Departments/AddDepartment.vue'
import AddEmployee from './Pages/Employees/AddEmployee.vue'
import AllEmployees from './Pages/Employees/AllEmployees.vue'




const routes = [
  {
    path: '/',
    component: Login,
  },
  {
    path: '/register',
    component: Register,
  },
  {
    path: '/dashboard',
    component: Dashboard,
  },
  {
    path: '/addDepartment',
    component: AddDepartment,
  },
  {
    path: '/allEmployee',
    component: AllEmployees,
  },
  {
    path: '/addEmployee',
    component : AddEmployee
  }
 
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
