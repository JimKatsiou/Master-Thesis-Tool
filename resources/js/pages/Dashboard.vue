<template>
    <div class="topOfThePage">
        <h2> Dashboard </h2>
    </div>
    <div class="nextOfSideBar">
        <h2> Welcome <b>{{ name }}</b> </h2>

        <section class="section is-main-section">
            <div class="title is-ancestor">
                <div class="title is-parent">
                    <div class="card title is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="is-widget-label">
                                    <h3 class="subtitle is-spaced"> Sensors </h3>
                                    <h1 class="title"><div>???</div></h1>
                                    <div class="level-item has-widget-icon">
                                        <div class="is-widget-icon">
                                            <span class="icon has-text-primary is-large">
                                                <i class="mdi mdi-account-multiple mdi-48px"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title is-parent">
                    <div class="card title is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="is-widget-label">
                                    <h3 class="subtitle is-spaced"> Technologies </h3>
                                    <h1 class="title"><div>???</div></h1>
                                    <div class="level-item has-widget-icon">
                                        <div class="is-widget-icon">
                                            <span class="icon has-text-primary is-large">
                                                <i class="mdi mdi-account-multiple mdi-48px"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title is-parent">
                    <div class="card title is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="is-widget-label">
                                    <h3 class="subtitle is-spaced"> Solutions </h3>
                                    <h1 class="title"><div>???</div></h1>
                                    <div class="level-item has-widget-icon">
                                        <div class="is-widget-icon">
                                            <span class="icon has-text-primary is-large">
                                                <i class="mdi mdi-account-multiple mdi-48px"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="card">
            <p> mpla mpla</p>

        </div>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
        }
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
    width: 5rem;
    height: 5rem;
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
    color: #00d1b2!important;
}
.icon {
    align-items: center;
    display: inline-flex;
    justify-content: center;
    height: 1.5rem;
    width: 1.5rem;
}


</style>
