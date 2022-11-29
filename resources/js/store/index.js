import Vue from "vue";
import Vuex from 'vuex';
import charts from './modules/charts'


export default new Vuex.Store({
    modules: {
        charts,
    }
})
