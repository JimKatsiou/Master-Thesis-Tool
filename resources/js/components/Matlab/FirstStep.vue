<template>
    <div class="topOfThePage">
        <h3>Prepare Testing</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row justify-content-center">
            <div class="bs-example">
                <div class="bg-light clearfix">
                    <h2 aling="center">Type of System</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <v-select :options="type_of_systems"
                                v-model="selecetedSystem" :placeholder="'Select technoly'">
                            </v-select>
                        </div>
                        <br>
                        <button type="button" class="btn btn-info" @click="nextStep()">Select</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vSelect from 'vue-select';
import "vue-select/dist/vue-select.css";
import axios from 'axios';

    export default {
        data() {
            return {
                type_of_systems: [],
                selecetedSystem: '',
            }
        },
        components: {
         vSelect,
        },

        beforeMount() {

        },

        mounted() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.get('/api/type_of_systems/get-type-of-systems').then(response => {
                    let type_of_systems = response.data;
                    let tos = []
                    for (let i = 0; i < type_of_systems.length; i++)
                    {
                        tos[i] = type_of_systems[i]['name'];
                    }
                    this.type_of_systems = tos;
                })
                .catch(function (error) {
                    console.error(error);
                });
            })

        },

        computed: {
        },

        methods: {
            nextStep() {
                this.$router.push({name:'matlab', params:{system:this.selecetedSystem}})
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

.bs-example{
    margin: 20px;
}

</style>

