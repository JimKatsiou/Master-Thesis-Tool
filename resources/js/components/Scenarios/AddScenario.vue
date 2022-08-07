<template>
    <div>
        <h4 class="text-center">Add Scenario</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addScenario">
                    <div class="form-group">
                        <label>Type of System</label>
                        <input type="text" class="form-control" v-model="scenario.type_of_system_name">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="scenario.technology_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Scenario</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            scenario: {}
        }
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
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
