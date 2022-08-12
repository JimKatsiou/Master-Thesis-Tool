<template>
    <div class="topOfThePage">
        <h3>All Technologies</h3>
    </div>
    <div class="nextOfSideBar">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Technology</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="technology in technologies" :key="technology.id">
                <td>{{ technology.id }}</td>
                <td>{{ technology.name }}</td>
                <td>{{ technology.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edittechnology', params: { id: technology.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteTechnology(technology.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/technologies/add')">Add Technology</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            technologies: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/technologies')
                .then(response => {
                    this.technologies = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteTechnology(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/technologies/delete/${id}`)
                    .then(response => {
                        let i = this.technologies.map(item => item.id).indexOf(id); // find index of your object
                        this.technologies.splice(i, 1)
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
