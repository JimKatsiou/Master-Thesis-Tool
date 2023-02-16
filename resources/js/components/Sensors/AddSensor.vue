<template>
    <div class="topOfThePage">
        <h3>Add Sensor</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSensor">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="sensor.name">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <v-select :options="technologies"
                            v-model="sensor.technology_id" :placeholder="'Select technology'">
                        </v-select>
                    </div>
                    <div class="form-group">
                        <label>Sensor cost</label>
                        <input type="text" class="form-control" v-model="sensor.cost">
                    </div>
                    <div class="form-group">
                        <label>installation cost</label>
                        <input type="text" class="form-control" v-model="sensor.installation_cost">
                    </div>
                    <div class="form-group">
                        <label>Battery</label>
                        <v-select :options="batteries"
                            v-model="sensor.battery" :placeholder="'Select battary'">
                        </v-select>                    
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="sensor.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add sensor</button>
                    <router-link to="/sensors" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import vSelect from 'vue-select';
import "vue-select/dist/vue-select.css";

export default {
    data() {
        return {
            sensor: {},
            technologies: [],
            batteries: [],
        }
    },
    components: {
         vSelect,
    },
    methods: {
        addSensor() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/sensors/add', this.sensor)
                    .then(response => {
                        this.$router.push({name: 'sensors'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
    mounted() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/technologies/get-technologies').then(response => {
                let technologies = response.data;
                let tech = []
                for (let i = 0; i < technologies.length; i++)
                {
                    tech[i] = technologies[i]['name'];
                }
                this.technologies = tech;
            })
            .catch(function (error) {
                console.error(error);
            });
        })
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/batteries/get-batteries').then(response => {
                let batteries = response.data;
                let batt = []
                for (let i = 0; i < batteries.length; i++)
                {
                    batt[i] = batteries[i]['name'];
                }
                this.batteries = batt;
            })
        })
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
