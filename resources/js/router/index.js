import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Scenarios from '../components/Scenarios/Scenarios'
import AddScenario from '../components/Scenarios/Scenarios'
import EditScenario from '../components/Scenarios/Scenarios'

import Technology from '../components/Technologies/Technologies'
import AddTechnology from '../components/Technologies/AddTechnology'
import EditTechnology from '../components/Technologies/EditTechnology'

import TypeOfSystem from '../components/TypeOfSystem/TypeOfSystem'
import AddTypeOfSystem from '../components/TypeOfSystem/AddTypeOfSystem'
import EditTypeOfSystem from '../components/TypeOfSystem/EditTypeOfSystem'

import Charts from '../components/Charts/Charts'
import TablesView from '../components/Tables/TablesView'
import Matlab from '../components/Matlab/Matlab'
import Documentation from '../components/Documentation'

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },

    // Scenarios routes
    {
        name: 'scenarios',
        path: '/scenarios',
        component: Scenarios
    },
    {
        name: 'addscenario',
        path: '/scenarios/add',
        component: AddScenario
    },
    {
        name: 'editscenario',
        path: '/scenarios/edit/:id',
        component: EditScenario
    },

    //Technologies routes
    {
        name: 'technologies',
        path: '/technologies',
        component: Technology
    },
    {
        name: 'addtechnology',
        path: '/technologies/add',
        component: AddTechnology
    },
    {
        name: 'edittechnology',
        path: '/technologies/edit/:id',
        component: EditTechnology
    },

    //TypeOfSystem routes
    {
        name: 'TypeOfSystem',
        path: '/TypeOfSystem',
        component: TypeOfSystem
    },
    {
        name: 'addTypeOfSystem',
        path: '/TypeOfSystem/add',
        component: AddTypeOfSystem
    },
    {
        name: 'editTypeOfSystem',
        path: '/TypeOfSystem/edit/:id',
        component: EditTypeOfSystem
    },

    {
        name: 'Charts',
        path: '/charts',
        component: Charts
    },

    {
        name: 'testing-matlab',
        path: '/testing-matlab',
        component: Matlab
    },

    {
        name: 'Tables',
        path: '/tables',
        component: TablesView
    },

    {
        name: 'Documentation',
        path: '/documentation',
        component: Documentation
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
