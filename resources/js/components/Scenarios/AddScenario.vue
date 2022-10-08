<template>
    <div class="topOfThePage">
        <h3>Add Scenarios</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addScenario">
                    <div class="form-group">
                        <label>Technology</label>
                        <v-select :options="technologies"
                            v-model="scenario.technology_name" :placeholder="'Select technoly'">
                        </v-select>
                    </div>
                    <div class="form-group">
                        <label>Type of System</label>
                        <input type="text" class="form-control" v-model="scenario.type_of_system_name">
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input type="text" class="form-control" v-model="scenario.cost">
                    </div>
                    <div class="form-group">
                        <label>Installation cost</label>
                        <input type="text" class="form-control" v-model="scenario.installation_cost">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="scenario.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Scenario</button>
                    <router-link to="/scenarios" class="btn btn-secondary">Back</router-link>
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
            scenario: {},
            technologies: [],
        }
    },
    components: {
         vSelect,
    },

    methods: {
        addScenario() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/scenarios/add', this.scenario)
                    .then(response => {
                        this.$router.push({name: 'scenarios'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
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
