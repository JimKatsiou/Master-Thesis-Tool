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

import Sensors from '../components/Sensors/Sensors'
import AddSensor from '../components/Sensors/AddSensor'
import EditSensor from '../components/Sensors/EditSensor'

import Gateways from '../components/Gateways/Gateways'
import AddGateway from '../components/Gateways/AddGateway'
import EditGateway from '../components/Gateways/EditGateway'

import FiveGSolutions from '../components/FiveGSolutions/FiveGSolutions'
import AddFiveGSolution from '../components/FiveGSolutions/AddfiveGSolution'
import EditFiveGSolution from '../components/FiveGSolutions/EditfiveGSolution'

import LoraSolutions from '../components/loraSolutions/LoraSolutions'
import AddloraSolution from '../components/loraSolutions/AddLoraSolution'
import EditloraSolution from '../components/loraSolutions/EditLoraSolution'

import NbSolutions from '../components/nbSolutions/nbSolutions'
import AddNbSolution from '../components/nbSolutions/AddnbSolution'
import EditNbSolution from '../components/nbSolutions/EditNbSolution'

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

    // Sensors routes
    {
        name: 'sensors',
        path: '/sensors',
        component: Sensors
    },
    {
        name: 'addsensor',
        path: '/sensors/add',
        component: AddSensor
    },
    {
        name: 'editsensor',
        path: '/sensors/edit/:id',
        component: EditSensor
    },

    // Gateways routes
    {
        name: 'gateways',
        path: '/gateways',
        component: Gateways
    },
    {
        name: 'addgateway',
        path: '/gateways/add',
        component: AddGateway
    },
    {
        name: 'editgateway',
        path: '/gateways/edit/:id',
        component: EditGateway
    },

    // 5G Solution routes
    {
        name: 'fiveGSolutions',
        path: '/fiveGSolutions',
        component: FiveGSolutions
    },
    {
        name: 'addfiveGSolution',
        path: '/fiveGSolutions/add',
        component: AddFiveGSolution
    },
    {
        name: 'editfiveGSolution',
        path: '/fiveGSolutions/edit/:id',
        component: EditFiveGSolution
    },

    // Lora Solution routes
    {
        name: 'loraSolutions',
        path: '/loraSolutions',
        component: LoraSolutions
    },
    {
        name: 'addloraSolutions',
        path: '/loraSolutions/add',
        component: AddloraSolution
    },
    {
        name: 'editloraSolutions',
        path: '/loraSolutions/edit/:id',
        component: EditloraSolution
    },

    // NB Solution routes
    {
        name: 'nbSolutions',
        path: '/nbSolutions',
        component: NbSolutions
    },
    {
        name: 'addnbSolution',
        path: '/nbSolutions/add',
        component: AddNbSolution
    },
    {
        name: 'editnbSolution',
        path: '/nbSolutions/edit/:id',
        component: EditNbSolution
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
