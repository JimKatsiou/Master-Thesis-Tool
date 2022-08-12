import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Scenarios from '../components/Scenarios/Scenarios'
import AddScenario from '../components/Scenarios/AddScenario'
import EditScenario from '../components/Scenarios/EditScenario'

import Technologies from '../components/Technologies/Technologies'
import AddTechnology from '../components/Technologies/AddTechnology'
import EditTechnology from '../components/Technologies/EditTechnology'

import TypeOfSystem from '../components/TypeOfSystem/TypeOfSystem'
import AddTypeOfSystem from '../components/TypeOfSystem/AddTypeOfSystem'
import EditTypeOfSystem from '../components/TypeOfSystem/EditTypeOfSystem'

import Matlab from '../components/Matlab/Matlab'

import Charts from '../components/Charts/Charts'
import TablesView from '../components/Tables/TablesView'
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
        component: Technologies
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
        name: 'typeOfSystem',
        path: '/type_of_systems',
        component: TypeOfSystem
    },
    {
        name: 'addTypeOfSystem',
        path: '/type_of_systems/add',
        component: AddTypeOfSystem
    },
    {
        name: 'editTypeOfSystem',
        path: '/type_of_systems/edit/:id',
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
