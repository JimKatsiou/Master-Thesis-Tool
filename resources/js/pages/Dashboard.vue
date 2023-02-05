<template>
    <div class="topOfThePage">
        <h2> Dashboard </h2>
    </div>
    <div class="nextOfSideBar">
        <h2> Welcome <b>{{ name }}</b> </h2>

        <section class="section is-main-section">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced"> Type of systems </h3>
                                        <h1 class="title"><div>{{ this.type_of_systems_number }}</div></h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon">
                                        <span class="icon has-text-info is-large">
                                            <font-awesome-icon icon="fa-solid fa-gear" size="3x"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced"> Technologies </h3>
                                        <h1 class="title"><div>{{ this.technologies_number }}</div></h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon">
                                        <span class="icon has-text-primary is-large">
                                            <font-awesome-icon icon="fa-solid fa-gears" size="3x" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced"> Sensors </h3>
                                        <h1 class="title"><div>{{ this.sensors_nubmer }}</div></h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon">
                                        <span class="icon has-text-info is-large">
                                            <font-awesome-icon icon="fa-solid fa-microchip" size="3x"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced"> Gateways </h3>
                                        <h1 class="title"><div>{{ this.gateways_nubmer }}</div></h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon">
                                        <span class="icon has-text-info is-large">
                                            <font-awesome-icon icon="fa-solid fa-microchip" size="3x"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced"> Scenarios </h3>
                                        <h1 class="title"><div>{{ this.scenarios_number }}</div></h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon">
                                        <span class="icon has-text-info is-large">
                                            <font-awesome-icon icon="fa-solid fa-database" size="3x"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <div class="row">  
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart_dashboard_1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart_dashboard_2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Chart from 'chart.js/auto'
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
            sensors_nubmer: 0,
            technologies_number: 0,
            type_of_systems_number: 0,
            scenarios_number: 0,
            gateways_nubmer: 0,
        }
    },
    mounted() {
        this.$axios.get('/api/sensors/getNumberOfSensors').then(response => {
                    this.sensors_nubmer = response.data;
        })

        this.$axios.get('/api/technologies/getNumberOfTechnologies').then(response => {
                    this.technologies_number = response.data;
        })

        this.$axios.get('/api/type_of_systems/getNumberOfTypeOfSystems').then(response => {
                    this.type_of_systems_number = response.data;
        })
        this.$axios.get('/api/scenarios/getNumberOfScenarios').then(response => {
                    this.scenarios_number = response.data;
        })
        this.$axios.get('/api/gateways/getNumberOfGateways').then(response => {
                    this.gateways_nubmer = response.data;
        })

        const myChart_dashboard_1 = document.getElementById('myChart_dashboard_1');
        new Chart(myChart_dashboard_1, {
            type: 'bar',
            data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        const myChart_dashboard_2 = document.getElementById('myChart_dashboard_2');
        new Chart(myChart_dashboard_2, {
            type: 'line',
            data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
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

section.section.is-main-section {
    padding: 1.5rem;
}
.tile.is-ancestor:not(:last-child) {
    margin-bottom: 0.75rem;
}

.tile:not(.is-child) {
    display: flex;
}
.tile.is-parent {
    padding: 0.75rem;
}
.tile.is-child {
    margin: 0!important;
}
.card-content:last-child, .card-footer:last-child, .card-header:last-child {
    border-bottom-left-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}
.level.is-mobile, .level.is-mobile .level-left, .level.is-mobile .level-right {
    display: flex;
}
.level.is-mobile .level-item:not(.is-narrow) {
    flex-grow: 1;
}
.card .is-widget-label .subtitle {
    color: #7a7a7a;
}
.level-item .subtitle, .level-item .title {
    margin-bottom: 0;
}
.level.is-mobile .level-item:not(.is-narrow) {
    flex-grow: 1;
}
.card .is-widget-icon .icon {
    width: 7rem;
    height: 4rem;
}
.icon.is-large {
    height: 3rem;
    width: 3rem;
}
.icon {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: inherit;
}
.has-text-primary {
    color: #141414ee!important;
}
.icon {
    align-items: center;
    display: inline-flex;
    justify-content: center;
    height: 3rem;
    width: 2rem;
}


</style>
