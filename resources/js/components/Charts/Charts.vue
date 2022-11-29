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
                        <div v-if="this.fist_chart === true"  style="width: 800px;"><canvas id="acquisitions"></canvas></div>
                            <div class="col-sm-6">
                                <datepicker  v-model="picked"/>
                            </div>
                        <button type="button" class="btn btn-primary" @click="plot_first_bar(picked)">Plot chart</button>
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


        <hr> mpla

                <!-- <div style="width: 800px;"><canvas id="acquisitions"></canvas></div> -->

        <div class="row">
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto'
import datepicker from 'vue3-datepicker'
import { ref } from 'vue'
const picked = ref(new Date())
import store from 'vuex'


export default {
    name: "Charts",
    data() {
        return {
            fist_chart: false,
            picked: picked,
        };
    },
    components: {
        datepicker,
        Chart,
        store,
    },

    mounted() {

        // const data = [
        //     { year: 2010, count: 10 },
        //     { year: 2011, count: 20 },
        //     { year: 2012, count: 15 },
        //     { year: 2013, count: 25 },
        //     { year: 2014, count: 22 },
        //     { year: 2015, count: 30 },
        //     { year: 2016, count: 28 },
        // ];
        // new Chart(document.getElementById("acquisitions"), {
        //     type: "bar",
        //     options: {
        //         animation: true,
        //         plugins: {
        //             legend: {
        //                 display: false
        //             },
        //             tooltip: {
        //                 enabled: false
        //             }
        //         },
        //     },
        //     data: {
        //         labels: data.map(row => row.year),
        //         datasets: [
        //             {
        //                 label: "Acquisitions by year",
        //                 data: data.map(row => row.count)
        //             }
        //         ]
        //     }
        // });
    },

    methods:
    {
        plot_first_bar(picked)
        {
            console.log('MPLA MPLA')
            let payload = {
                date: picked
            }
            this.$store.dispatch('fetch5GCheapestSolution', payload)

        }
    }

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
