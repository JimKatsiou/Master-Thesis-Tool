<template>
    <div class="topOfThePage">
        <h3>Charts</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <h3>Results from Gready Algorithm</h3>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (5G)</h5>
                        <p class="card-text">Cheapest Scenarios using 5G Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.cost_bar_5g === true">
                            <Bar id="cost-bar-5g-id" :options="chartOptions" :data="cost_bar_5g_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" @click="plot_cost_bar_5g(picked,number_of_simulation)">Plot chart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (5g)</h5>
                        <p class="card-text">Battary Efficient Scenarios using 5g Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_5g === true">
                            <Bar id="battery-bar-5g-id" :options="chartOptions" :data="battery_bar_5g_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_battery_bar_5g(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <!-- <div style="width: 800px;"><canvas id="myChart"></canvas></div> -->

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (LoRa)</h5>
                        <p class="card-text">Cheapest Scenarios using LoRa Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.cost_bar_lora === true">
                            <Bar id="cost-bar-lora-id" :options="chartOptions" :data="cost_bar_lora_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_lora(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Battary Efficient solution (LoRa)</h5>
                        <p class="card-text">Battary Efficient Scenarios using LoRa Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_lora === true">
                            <Bar id="battery-bar-lora-id" :options="chartOptions" :data="battery_bar_lora_data"/>
                            <hr>
                        </div>
                            <div class="row">
                                <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" @click="plot_battery_bar_lora(picked,number_of_simulation)">Plot chart</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (NB-IoT)</h5>
                        <p class="card-text">Cheapest Scenarios using NB IoT Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.cost_bar_nb === true">
                            <Bar id="cost-bar-nb-id" :options="chartOptions" :data="cost_bar_nb_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_nb(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (NB-IoT)</h5>
                        <p class="card-text">Cheapest Scenarios using NB IoT Technology <b>(Gready Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_nb === true">
                            <Bar id="battery-bar-nb-id" :options="chartOptions" :data="battery_bar_nb_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_battery_bar_nb(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="row">
            <h3>Results from Genetic Algorithm</h3>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Most effective solution (Cost)</h5>
                        <p class="card-text">Cheapest Scenarios using 5G, LoRa, NB-IoT technologies <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.bar_5g_GA === true">
                            <Bar id="bar-5g-GA-id" :options="chartOptions" :data="bar_5g_GA_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_bar_5g_GA(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Most effective solution (Battery Life)</h5>
                        <p class="card-text">Battery efficient using 5G, LoRa, NB-IoT technologies <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.bar_lora_GA === true">
                            <Bar id="bar-lora-GA-id" :options="chartOptions" :data="bar_lora_GA_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_bar_lora_GA(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Most effective solution (NB-IoT)</h5>
                        <p class="card-text">Cheapest Scenarios using NB-IoT Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.bar_nb_GA === true">
                            <Bar id="bar-nb-GA-id" :options="chartOptions" :data="bar_nb_GA_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Date</label>
                                    <datepicker v-model="picked"/>
                                </div>
                            </div>
                            <div class="col-sm-5">
                               <div class="form-group">
                                    <label>Simulation Number</label>
                                    <input type="number" class="form-control" v-model="number_of_simulation" placeholder="Enter sumulation number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_bar_nb_GA(picked,number_of_simulation)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</template>

<script>
import Chart from 'chart.js/auto'
import datepicker from 'vue3-datepicker'
import { ref } from 'vue'
const picked = ref(new Date())
import store, { mapGetters } from 'vuex'
import moment from 'moment' 
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)


export default {
    name: "Charts",
    data() {
        return {
            picked: picked,
            number_of_simulation: null,
            chartOptions: {
                responsive: true
            },
            
            cost_bar_5g_data: {
                labels: [ ],
                datasets: [ ]
            },
            cost_bar_5g: false,
            battery_bar_5g_data: {
                labels: [ ],
                datasets: [ ]
            },
            battery_bar_5g: false,
            
            cost_bar_lora_data: {
                labels: [ ],
                datasets: [ ]
            },
            cost_bar_lora: false,
            battery_bar_lora_data: {
                labels: [ ],
                datasets: [ ]
            },
            battery_bar_lora: false,
            
            cost_bar_nb_data: {
                labels: [ ],
                datasets: [ ]
            },
            cost_bar_nb: false,
            battery_bar_nb_data: {
                labels: [ ],
                datasets: [ ]
            },
            battery_bar_nb: false,

            bar_5g_GA: false,
            bar_5g_GA_data: {
                labels: [ ],
                datasets: [ ]
            },
            bar_lora_GA: false,
            bar_lora_GA_data: {
                labels: [ ],
                datasets: [ ]
            },
            bar_nb_GA: false,
            bar_nb_GA_data: {
                labels: [ ],
                datasets: [ ]
            },
            // bar_GA: false,
            // bar__GA_data: {
            //     labels: [ ],
            //     datasets: [ ]
            // }
            
        };
    },
           
    components: {
        datepicker,
        Chart,
        store,
        moment,
        Bar,
    },

    mounted() {
        this.picked = new Date();
    },

    methods:
    {
        // convertProxyObjectToPojo(proxyObj) {
        //     return _.cloneDeep(proxyObj);
        // },

        plot_cost_bar_5g(picked,simulation_nubmer)
        {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetch5GCheapestSolution', payload).then(response => {
                let result = this.$store.getters.get5GCheapestSolution;
                //console.log('result ==', result)
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['cheapest_5g_solutionTableCost']
                    labels[i] = results[i]['cheapest_5g_solutionTable']
                }

                console.log ('data ==', data);
               
                this.cost_bar_5g_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[0]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.cost_bar_5g = true
            })
        },

        plot_cost_bar_lora(picked, simulation_nubmer) {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetchLoRaCheapestSolution', payload).then(response => {
                let result = this.$store.getters.getLoRaCheapestSolution;
                //console.log('result ==', result)
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['cheapest_lora_solutionTableCost']
                    labels[i] = results[i]['cheapest_lora_solutionTable']
                }

                console.log ('data ==', data);
               
                this.cost_bar_lora_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[0]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.cost_bar_lora = true
            })
        },

        plot_cost_bar_nb(picked, simulation_nubmer){
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetchNBCheapestSolution', payload).then(response => {
                let result = this.$store.getters.getNBCheapestSolution;
                //console.log('result ==', result)
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['cheapest_nb_solutionTableCost']
                    labels[i] = results[i]['cheapest_nb_solutionTable']
                }

                console.log ('data ==', data);
               
                this.cost_bar_nb_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[0]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.cost_bar_nb = true
            })
        },

        plot_battery_bar_5g(picked, simulation_nubmer){
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetchBat5GCheapestSolution', payload).then(response => {
                let result = this.$store.getters.getBat5GCheapestSolution;
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['best_5g_solutionTableBL']
                    labels[i] = results[i]['best_5g_solutionTable']
                }

                console.log ('data ==', data);
               
                this.battery_bar_lora_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[i-1]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.battery_bar_lora = true
            })
        },

        plot_battery_bar_lora(picked, simulation_nubmer){
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetchBatLoRaCheapestSolution', payload).then(response => {
                let result = this.$store.getters.getBatLoRaCheapestSolution;
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['best_lora_solutionTableBL']
                    labels[i] = results[i]['best_lora_solutionTable']
                }

                console.log ('data ==', data);
               
                this.battery_bar_nb_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[i-1]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.battery_bar_nb = true
            })
        },

        plot_battery_bar_nb(picked, simulation_nubmer){
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$store.dispatch('fetchBatNBCheapestSolution', payload).then(response => {
                let result = this.$store.getters.getBatNBCheapestSolution;
                let results = JSON.parse(JSON.stringify(result))
               
                console.log('results' ,results)
                let data = []
                let labels = []
                let i
                for (i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['best_nb_solutionTableBL']
                    labels[i] = results[i]['best_nb_solutionTable']
                }

                console.log ('data ==', data);
               
                this.battery_bar_5g_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Simulation: ' + results[i-1]['simulation_nubmer'] + ' Cheapest solution',
                            data: data
                        }
                    ]
                }
                this.battery_bar_5g = true
            })
        },

        plot_bar_5g_GA(picked,simulation_nubmer)
        {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/results/chart/get-fiveg-best-solution_GA', payload).then(response => {
                    
                let results = JSON.parse(JSON.stringify(response.data.object))
                console.log('results ==', results)

                let data = []
                let labels = []
                let mpla1 = ""
                let mpla2 = ""
                let mpla3 = ""

                for (let i = 0; i < results.length; i++) {
                    if(i === 0) {
                        data[i] = results[i]['solution_cost_5g']
                        mpla1 = String(results[i]['sensor_5g_a']);
                        mpla2 = String(results[i]['sensor_5g_b']);
                        mpla3 = String(results[i]['sensor_5g_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                    if(i === 1) {
                        data[i] = results[i]['solution_cost_lora']
                        mpla1 = String(results[i]['sensor_lora_a']);
                        mpla2 = String(results[i]['sensor_lora_b']);
                        mpla3 = String(results[i]['sensor_lora_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                    if(i === 2) {
                        data[i] = results[i]['solution_cost_nb']
                        mpla1 = String(results[i]['sensor_nb_a']);
                        mpla2 = String(results[i]['sensor_nb_b']);
                        mpla3 = String(results[i]['sensor_nb_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                }
                console.log ('data ==', data);
                this.bar_5g_GA_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Cost in €',
                            data: data
                        }
                    ]
                }
                this.bar_5g_GA = true
                })
            })
        },

        plot_bar_lora_GA(picked, simulation_nubmer){
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date,
                simulation_nubmer: simulation_nubmer
            }
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/results/chart/get-fiveg-best-solution_GA', payload).then(response => {
                    
                let results = JSON.parse(JSON.stringify(response.data.object))
                console.log('results ==', results)

                let data = []
                let labels = []
                let mpla1 = ""
                let mpla2 = ""
                let mpla3 = ""

                for (let i = 0; i < results.length; i++) {
                    if(i === 0) {
                        data[i] = results[i]['solution_battery_life_5g']
                        mpla1 = String(results[i]['sensor_5g_a']);
                        mpla2 = String(results[i]['sensor_5g_b']);
                        mpla3 = String(results[i]['sensor_5g_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                    if(i === 1) {
                        data[i] = results[i]['solution_battery_life_lora']
                        mpla1 = String(results[i]['sensor_lora_a']);
                        mpla2 = String(results[i]['sensor_lora_b']);
                        mpla3 = String(results[i]['sensor_lora_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                    if(i === 2) {
                        data[i] = results[i]['solution_battery_life_nb']
                        mpla1 = String(results[i]['sensor_nb_a']);
                        mpla2 = String(results[i]['sensor_nb_b']);
                        mpla3 = String(results[i]['sensor_nb_c']);

                        labels[i] = mpla3 + ', ' + mpla2 + ', ' + mpla3;
                    }
                }
                console.log ('data ==', data);
               
                this.bar_lora_GA_data = {
                    labels: labels,
                    datasets :[
                        {
                            label: 'Battery life in (months)',
                            data: data
                        }
                    ]
                }
                this.bar_lora_GA = true
                
                })
            })
        },
        
        plot_bar_nb_GA(picked){
        },
    },

    computed: {
        ...mapGetters([
            'get5GCheapestSolution',
            'getLoRaCheapestSolution',
            'getNBCheapestSolution',
            'getBat5GCheapestSolution',
            'getBatLoRaCheapestSolution',
            'getBatNBCheapestSolution'
        ]),
    },

}

</script>

<style>
.nextOfSideBar {
    margin-left: 250px;
    padding: 10px;
}

.topOfThePage
{
    margin-top: -50px;
    background-color: rgba(146, 145, 145, 0.404);
    margin-left: 250px;
    padding: 10px;
}

.matlabTopOfThePage
{
    margin-top: -80px;
    margin-left: 250px;
    padding: 10px;
}
</style>
