<template>
    <div class="topOfThePage">
        <h3>Edit Gateways</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="gateway">
                <form @submit.prevent="updateGateway">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="gateway.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="gateway.description">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="gateway.technology_id ">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Solution</button>
                    <router-link to="/gateways" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            gateway: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/gateways/edit/${this.$route.params.id}`)
                .then(response => {
                    this.gateway = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateGateway() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/gateways/update/${this.$route.params.id}`, this.gateway)
                    .then(response => {
                        this.$router.push({name: 'gateways'});
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
