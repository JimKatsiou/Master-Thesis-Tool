<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <router-link to="/" class="btn btn-danger">Back to Dashboard</router-link>
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
                {{ this.file_name_1 + 'file was created successfully!'}}

                <hr>
                <p>Scenario: <strong>Water quality - NB-Iot Techonoly</strong></p>
                {{ this.file_name_2 + 'file was created successfully!'}}

                <hr>
                <p>Scenario: <strong>Water quality - LoRa Techonoly</strong></p>
                {{ this.file_name_3 + 'file was created successfully!'}}

                <hr>
                <p><strong>Extras:</strong></p>
                {{ this.file_name_4 + 'file was created successfully!'}}
                <br>
                {{ this.file_name_5 + 'file was created successfully!'}}
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
                <h5> For cost-effective scenario: <button> Run button </button> <br> </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_CostEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For energy-effective scenario: <button> Run button </button> <br> </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_EnergyEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For most-effective scenario (both cost and energy): <button> Run button </button> <br> </h5>
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
            <hr>
            <li>
            </li>
            <hr>
            <li>
            </li>
        </ul>
        </div>
    </div>

</div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            file_name_1: 'mpla',
            file_name_2: 'mploo',
            file_name_3: 'mpli',
            file_name_4: 'mploo',
            file_name_5: 'mpli',
        }
    },
    component:{

    },

    mounted() {
        // tha kanei execution to matlab
        // <?php
        //     exec("matlab.exe");
        // ?>

        this.get_data_5g();
        this.get_data_4();
        this.get_data_5();

        this.get_data_2();

        this.get_data_3();
    },

    computed: {

    },

    methods: {

        get_data_5g() // this function fetch data table and it store into json formt and retutn data in json format
        {
            //this.$axios.get(`/api/get_5g_data`)

            this.file_name_1 = 'file name '

        },

        get_data_4(){

        },

        get_data_5(){

        },

        get_data_2(){

        },

        get_data_3(){

        },

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
