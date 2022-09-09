<template>
    <div class="topOfThePage">
        <h3>Edit LoRa Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="loraSolution">
                <form @submit.prevent="updateLoraSolution">
                    <div class="form-group">
                        <label>Sensor 1</label>
                        <input type="text" class="form-control" v-model="loraSolution.lora_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="loraSolution.number_of_lora_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Sensor 2</label>
                        <input type="text" class="form-control" v-model="loraSolution.lora_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="loraSolution.number_of_lora_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Sensor 3</label>
                        <input type="text" class="form-control" v-model="loraSolution.lora_sensors_type_c">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="loraSolution.number_of_lora_sensors_type_c">
                    </div>
                    <div class="form-group">
                        <label>Gateway 1</label>
                        <input type="text" class="form-control" v-model="loraSolution.gateways_type_a">
                    </div>
                    <div class="form-group">
                        <label>Number of gateway</label>
                        <input type="text" class="form-control" v-model="loraSolution.number_of_lora_gateways_type_a">
                    </div>
                    <div class="form-group">
                        <label>Gateway 2</label>
                        <input type="text" class="form-control" v-model="loraSolution.gateways_type_b">
                    </div>
                    <div class="form-group">
                        <label>Number of gateway</label>
                        <input type="text" class="form-control" v-model="loraSolution.number_of_lora_gateways_type_b">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Solution</button>
                    <router-link to="/loraSolutions" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loraSolution: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/loraSolutions/edit/${this.$route.params.id}`)
                .then(response => {
                    this.loraSolution = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateLoraSolution() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/loraSolutions/update/${this.$route.params.id}`, this.loraSolution)
                    .then(response => {
                        this.$router.push({name: 'loraSolutions'});
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
