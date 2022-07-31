import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Books from '../components/Books/Books';
import AddBook from '../components/Books/AddBook';
import EditBook from '../components/Books/EditBook';

import Scenarios from '../components/Scenarios/Scenarios'
import AddScenario from '../components/Scenarios/Scenarios'
import EditScenario from '../components/Scenarios/Scenarios'

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

    //Example Book routes
    {
        name: 'books',
        path: '/books',
        component: Books
    },
    {
        name: 'addbook',
        path: '/books/add',
        component: AddBook
    },
    {
        name: 'editbook',
        path: '/books/edit/:id',
        component: EditBook
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
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
