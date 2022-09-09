<template>
    <div class="topOfThePage">
        <h3>All Gateways</h3>
    </div>
    <div class="nextOfSideBar">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Technology</th>
                <th>Description</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="gateway in gateways" :key="gateway.id">
                <td>{{ gateway.id }}</td>
                <td>{{ gateway.name }}</td>
                <td>{{ gateway.technology_id }}</td>
                <td>{{ gateway.description }}</td>
                <td>{{ gateway.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editgateway', params: { id: gateway.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteGateway(gateway.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/gateways/add')">Add Gateway</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            gateways: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/gateways')
                .then(response => {
                    this.gateways = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteGateway(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/gateways/delete/${id}`)
                    .then(response => {
                        let i = this.gateways.map(item => item.id).indexOf(id); // find index of your object
                        this.sensors.splice(i, 1)
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
