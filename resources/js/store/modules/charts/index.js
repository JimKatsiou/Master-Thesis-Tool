import axios from "axios";

const state = {

    fiveg_cheapest_solution: [],

}

const getters = {
    get5GCheapestSolution: (state) => state.date,
}

const actions = {

    async fetch5GCheapestSolution({commit}, payload) {
        const response = await axios.post('/results/chart/get-fiveg-cheapest-solution/', payload)
        console.log('response.data', response.data)
        console.log('response', response)
        commit('SET_FIVE_G_CHEAPESST_SOLUTION', response.data)
    }

}

const mutations = {

    SET_FIVE_G_CHEAPESST_SOLUTION: (state, data) => (state.fiveg_cheapest_solution = data)

}


export default {state, getters, actions, mutations}
