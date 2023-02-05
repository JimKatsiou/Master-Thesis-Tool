<template>
    <div class="topOfThePage">
        <h3>Charts</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
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
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_5g(picked)">Plot chart</button>
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
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_battery_bar_5g(picked)">Plot chart</button>
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
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_lora(picked)">Plot chart</button>
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
                                    <datepicker  v-model="picked"/>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" @click="plot_battery_bar_lora()">Plot chart</button>
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
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_nb(picked)">Plot chart</button>
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
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_battery_bar_nb(picked)">Plot chart</button>
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
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Most effective solution (5G)</h5>
                        <p class="card-text">Cheapest Scenarios using 5G Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.bar_5g_GA === true">
                            <Bar id="bar-5g-GA-id" :options="chartOptions" :data="bar_5g_GA_data"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-modl="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_bar_5g_GA(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (5G)</h5>
                        <p class="card-text">Cheapest Scenarios using 5G Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_5g_GA === true">
                            <Bar id="battery-bar-5g-GA-id" :options="chartOptions" :data="battery_bar_5g_data_GA"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_battery_bar_5g_GA(picked)">Plot chart</button>
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
                        <h5 class="card-title">Bars - Cheapest solution (LoRa)</h5>
                        <p class="card-text">Cheapest Scenarios using LoRa Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.cost_bar_lora_GA === true">
                            <Bar id="cost-bar-lora-GA-id" :options="chartOptions" :data="cost_bar_lora_data_GA"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_lora_GA(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (LoRa)</h5>
                        <p class="card-text">Cheapest Scenarios using LoRa Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_lora_GA === true">
                            <Bar id="battery-bar-lora-GA-id" :options="chartOptions" :data="battery_bar_lora_data_GA"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_baterry_bar_lora_GA(picked)">Plot chart</button>
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
                        <p class="card-text">Cheapest Scenarios using NB-IoT Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.cost_bar_5g_GA === true">
                            <Bar id="cost-bar-5g-GA-id" :options="chartOptions" :data="cost_bar_5g_data_GA"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_5g_GA(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (5G)</h5>
                        <p class="card-text">Cheapest Scenarios using 5G Technology <b>(Genetic Algorithm Results)</b></p>
                        <div v-if="this.battery_bar_5g_GA === true">
                            <Bar id="battery-bar-5g-GA-id" :options="chartOptions" :data="battery_bar_5g_data_GA"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_cost_bar_5g_GA(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

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

            
            bar_5g_GA_data: {
                labels: [ ],
                datasets: [ ]
            },
            cost_bar_5g_GA: false,
            battery_bar_5g_data_GA: {
                labels: [ ],
                datasets: [ ]
            },
            battery_bar_5g_GA: false,
            
            cost_bar_lora_data_GA: {
                labels: [ ],
                datasets: [ ]
            },
            cost_bar_lora_GA: false,
            battery_bar_lora_data_GA: {
                labels: [ ],
                datasets: [ ]
            },
            battery_bar_lora_GA: false,
            
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
    },

    methods:
    {
        // convertProxyObjectToPojo(proxyObj) {
        //     return _.cloneDeep(proxyObj);
        // },

        plot_cost_bar_5g(picked)
        {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date
            }
            this.$store.dispatch('fetch5GCheapestSolution', payload).then(response => {
                let result = this.$store.getters.get5GCheapestSolution;
                console.log('result ==', result)
                let results = JSON.parse(JSON.stringify(result))
               
                let data = []
                let labels = []
                for (let i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['cheapest_5g_solutionTableCost']
                    labels[i] = results[i]['simulation_nubmer']
                }
                console.log('data', data)
                console.log('labels', labels)
                this.cost_bar_5g_data = {
                    labels: labels.map(row => row),
                    datasets: [ {data: data} ]
                }
                this.cost_bar_5g = true
            })
        },

        plot_cost_bar_lora(picked){
        },

        plot_cost_bar_nb(picked){
        },

        plot_battery_bar_5g(picked){
        },

        plot_battery_bar_lora(picked){
        },

        plot_battery_bar_nb(picked){
        },

        plot_cost_bar_5g_GA(picked)
        {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date
            }
            this.$store.dispatch('fetch5GCheapestSolution', payload).then(response => {
                let result = this.$store.getters.get5GCheapestSolution;
                console.log('result ==', result)
                let results = JSON.parse(JSON.stringify(result))
               
                let data = []
                let labels = []
                for (let i = 0; i < results.length; i++)
                {
                    data[i] = results[i]['cheapest_5g_solutionTableCost']
                    labels[i] = results[i]['simulation_nubmer']
                }
                console.log('data', data)
                console.log('labels', labels)
                this.chartData_1 = {
                    labels: labels.map(row => row),
                    datasets: [ {data: data} ]
                }
                this.chart_1 = true
            })
        },

        plot_cost_bar_lora_GA(picked){
        },

        plot_cost_bar_nb_GA(picked){
        },

        plot_battery_bar_5g_GA(picked){
        },

        plot_battery_bar_lora_GA(picked){
        },
        
        plot_battery_bar_nb_GA(picked){
        },
    },

    mounted() {
        this.picked = new Date();
    },

    computed: {
        ...mapGetters([
            'get5GCheapestSolution'
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
