<template>
    <div class="topOfThePage">
        <h3>Edit senario</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="sensor">
                <form @submit.prevent="updateSensor">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="sensor.name">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="sensor.technology_id ">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="sensor.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update sensor</button>
                    <router-link to="/sensors" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sensor: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sensors/edit/${this.$route.params.id}`)
                .then(response => {
                    this.sensor = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateSensor() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/sensors/update/${this.$route.params.id}`, this.sensor)
                    .then(response => {
                        this.$router.push({name: 'sensors'});
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
