import axios from "axios";

const state = {

    fiveg_cheapest_solution: [],
    lora_cheapest_solution: [],
    nb_cheapest_solution: [],
    batterey_fiveg_cheapest_solution: [],
    batterey_lora_cheapest_solution: [],
    batterey_nb_cheapest_solution: [],


}

const getters = {
    get5GCheapestSolution: (state) => state.fiveg_cheapest_solution,
    getLoRaCheapestSolution: (state) => state.lora_cheapest_solution,
    getNBCheapestSolution: (state) => state.nb_cheapest_solution,

    getBat5GCheapestSolution: (state) => state.batterey_fiveg_cheapest_solution,
    getBatLoRaCheapestSolution: (state) => state.batterey_lora_cheapest_solution,
    getBatNBCheapestSolution: (state) => state.batterey_nb_cheapest_solution,

}

const actions = {

    async fetch5GCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-fiveg-cheapest-solution', payload)
        commit('SET_FIVE_G_CHEAPESST_SOLUTION', response.data.object)
    },

    async fetchLoRaCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-lora-cheapest-solution', payload)
        commit('SET_LORA_CHEAPESST_SOLUTION', response.data.object)
    },

    async fetchNBCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-nb-cheapest-solution', payload)
        commit('SET_NB_CHEAPESST_SOLUTION', response.data.object)
    },

    async fetchBat5GCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-bat-fiveg-cheapest-solution', payload)
        commit('SET_BAT_FIVE_G_CHEAPESST_SOLUTION', response.data.object)
    },

    async fetchBatLoRaCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-bat-lora-cheapest-solution', payload)
        commit('SET_BAT_LORA_CHEAPESST_SOLUTION', response.data.object)
    },

    async fetchBatNBCheapestSolution({commit}, payload) {
        const response = await axios.post('/api/results/chart/get-bat-nb-cheapest-solution', payload)
        commit('SET_BAT_NB_CHEAPESST_SOLUTION', response.data.object)
    }

}

const mutations = {

    SET_FIVE_G_CHEAPESST_SOLUTION: (state, data) => (state.fiveg_cheapest_solution = data),
    SET_LORA_CHEAPESST_SOLUTION: (state, data) => (state.lora_cheapest_solution = data),
    SET_NB_CHEAPESST_SOLUTION: (state, data) => (state.nb_cheapest_solution = data),

    SET_BAT_FIVE_G_CHEAPESST_SOLUTION: (state, data) => (state.batterey_fiveg_cheapest_solution = data),
    SET_BAT_LORA_CHEAPESST_SOLUTION: (state, data) => (state.batterey_lora_cheapest_solution = data),
    SET_BAT_NB_CHEAPESST_SOLUTION: (state, data) => (state.batterey_nb_cheapest_solution = data)


}


export default {state, getters, actions, mutations}
