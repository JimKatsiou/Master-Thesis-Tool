import axios from "axios";

const state = {

    fiveg_cheapest_solution: [],

}

const getters = {
    get5GCheapestSolution: (state) => state.fiveg_cheapest_solution,
}

const actions = {

    async fetch5GCheapestSolution({commit}, payload) {
        console.log('mpike sto fetchh')
        const response = await axios.post('/api/results/chart/get-fiveg-cheapest-solution', payload)
        commit('SET_FIVE_G_CHEAPESST_SOLUTION', response.data.object)
    }

}

const mutations = {

    SET_FIVE_G_CHEAPESST_SOLUTION: (state, data) => (state.fiveg_cheapest_solution = data)

}


export default {state, getters, actions, mutations}
