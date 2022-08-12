<template>
    <div class="topOfThePage">
        <h3>All Type of system</h3>
    </div>
    <div class="nextOfSideBar">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="type_of_system in type_of_systems" :key="type_of_system.id">
                <td>{{ type_of_system.id }}</td>
                <td>{{ type_of_system.name }}</td>
                <td>{{ type_of_system.description }}</td>
                <td>{{ type_of_system.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editTypeOfSystem', params: { id: type_of_system.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteSystem(type_of_system.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/type_of_systems/add')">Add System</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type_of_systems: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/type_of_systems')
                .then(response => {
                    this.type_of_systems = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSystem(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/type_of_systems/delete/${id}`)
                    .then(response => {
                        let i = this.type_of_systems.map(item => item.id).indexOf(id); // find index of your object
                        this.type_of_systems.splice(i, 1)
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
