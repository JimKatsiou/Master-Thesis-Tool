<template>
    <div class="topOfThePage">
        <h3>ALGORITHMS</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <router-link to="/dashboard" class="btn btn-danger">Back to Dashboard</router-link>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h2 aling="center">MATLAB was opened, wait a while for the necessary processes to load </h2>
            </div>
            <div class="card-body">
                <h3></h3>
            </div>
        </div>
        <br>
        <h5> <b> STEP 1: </b> Update inpunt with the curent enabled scenarios </h5>
        <div class="card">
            <div class="card-header">
                <h2>Update</h2>
            </div>
            <div class="card-body">

                <p>Scenario: <strong>Water quality - 5G Techonoly</strong></p>
                {{ this.file_name_1}}

                <hr>
                <p>Scenario: <strong>Water quality - NB-Iot Techonoly</strong></p>
                {{ this.file_name_2}}

                <hr>
                <p>Scenario: <strong>Water quality - LoRa Techonoly</strong></p>
                {{ this.file_name_3}}

                <hr>
                <p><strong>Extras:</strong></p>
                <button type="button" class="btn btn-primary" @click="get_data_battery()">Primary</button>

                <button type="button" class="btn btn-primary" @click="get_data_cost()">Cost</button>
                {{ this.file_name_4}}
                <br>
                {{ this.file_name_5}}
                <br>
            </div>
        </div>

        <br>
        <h5> <b> STEP 2: </b> Run which ever algorith you want. </h5>
        <div class="card">
        <div class="card-header">
            <h2>Greedy code, find cheapest scenarios</h2>
        </div>
        <div class="card-body">
        <ul>
            <li>
                <h5> For cost-effective scenario:</h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_CostEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For energy-effective scenario: </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_EnergyEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For most-effective scenario (both cost and energy): </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_MostEffective_Scenrio.m </b> </h6>
            </li>
        </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Genetic Algorithm</h2>
        </div>
        <div class="card-body">
        <ul>
            <li>
            </li>
        </ul>
        </div>
    </div>

    <br>
    <h5> <b> STEP 3: </b> Results creation. </h5>
    <div class="card">
        <div class="card-header">
            <h2>Results</h2>
        </div>
    </div>

</div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                matlab_status: '',
                file_name_1: '',
                file_name_2: '',
                file_name_3: '',
                file_name_4: '',
                file_name_5: '',
                fiveGSolutionData: "",
                loraSolutionData: "",
                nbSolutionData: "",
            }
        },
        component:{

        },

        beforeMount() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.get('/api/testing-matlab/run-matlab')
                .catch(function (error) {
                    console.error(error);
                });
            })

            this.get_data_5g_wq();
            this.get_data_Lora_wq();
            this.get_data_NB_wq();
        },

        mounted() {
            // this.get_data_battery();
            // this.get_data_cost();
        },

        computed: {
            fiveGData() {
                const reqObject = JSON.parse(JSON.stringify(this.fiveGSolutionData));
                return reqObject;
            },
            loraData() {
                const reqObject = JSON.parse(JSON.stringify(this.loraSolutionData));
                return reqObject;
            },
            nbData() {
                const reqObject = JSON.parse(JSON.stringify(this.nbSolutionData));
                return reqObject;
            },

        },

        methods: {

            get_data_5g_wq() // this function fetch data table and it store into json formt and retutn data in json format
            {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get('/api/testing-matlab/get_data_5g_wq').then(response => {
                        console.log(response);
                        this.file_name_1 = response.data.file_name + 'file was created successfully!';
                        this.fiveGSolutionData = response.data.scenario_data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            },

            get_data_Lora_wq()
            {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get('/api/testing-matlab/get_data_Lora_wq').then(response => {
                        this.file_name_2 = response.data.file_name + 'file was created successfully!';
                        this.loraSolutionData = response.data.scenario_data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            },

            get_data_NB_wq()
            {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get('/api/testing-matlab/get_data_NB_wq').then(response => {
                        this.file_name_3 = response.data.file_name + 'file was created successfully!';
                        this.nbSolutionData = response.data.scenario_data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            },

            get_data_battery()
            {
                let payload = {
                    fiveGSolutionData: this.fiveGData,
                    loraSolutionData: this.loraData,
                    nbSolutionData: this.nbData
                }
                this.$axios.post('/api/testing-matlab/get_data_battery', payload).then(response => {
                    this.file_name_4 = response.data + 'file was created successfully!';
                })
                .catch(function (error) {
                    console.error(error);
                });
            },

            get_data_cost()
            {
                let payload = {
                    fiveGSolutionData: this.fiveGData,
                    loraSolutionData: this.loraData,
                    nbSolutionData: this.nbData
                }
                this.$axios.post('/api/testing-matlab/get_data_cost', payload).then(response => {
                    this.file_name_5 = response.data + 'file was created successfully!';
                })
                .catch(function (error) {
                    console.error(error);
                });
            }
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
</style>

