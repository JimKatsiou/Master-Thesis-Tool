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
                        <p class="card-text">mpla mpla mplla.</p>
                        <div v-if="this.chart_1 === true">
                            <Bar id="my-chart-id_1" :options="chartOptions" :data="chartData_1"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_first_bar(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Battary Efficient solution (5G)</h5>
                        <p class="card-text">mpla mpla mplla.</p>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <datepicker  v-model="picked"/>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" @click="plot_second_bar()">Plot chart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        

        <!-- <div style="width: 800px;"><canvas id="myChart"></canvas></div> -->

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Cheapest solution (5G)</h5>
                        <p class="card-text">mpla mpla mplla.</p>
                        <div v-if="this.chart_3 === true">
                            <Bar id="my-chart-id_3" :options="chartOptions" :data="chartData_2"/>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" @click="plot_first_bar(picked)">Plot chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bars - Battary Efficient solution (5G)</h5>
                        <p class="card-text">mpla mpla mplla.</p>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <datepicker  v-model="picked"/>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary" @click="plot_second_bar()">Plot chart</button>
                                </div>
                            </div>
                        </form>
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
            // 1
            chartData_1: {
                labels: [ ],
                datasets: [ ]
            },
            chart_1: false,
            // 2
            chartData_2: {
                labels: [ ],
                datasets: [ ]
            },
            chart_2: false,
            chartData_3: {
                labels: [ ],
                datasets: [ ]
            },
            chart_3: false,
            
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

        plot_first_bar(picked)
        {
            let date = moment(String(picked)).format('DD-MM-YYYY')
            let payload = {
                date: date
            }
            this.$store.dispatch('fetch5GCheapestSolution', payload).then(response => {
                let mpla = this.$store.getters.get5GCheapestSolution;
                let mplo = JSON.parse(JSON.stringify(mpla))
               
                let data = []
                let labels = []
                for (let i = 0; i < mplo.length; i++)
                {
                    data[i] = mplo[i]['cheapest_5g_solutionTableCost']
                    labels[i] = mplo[i]['simulation_nubmer']
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
