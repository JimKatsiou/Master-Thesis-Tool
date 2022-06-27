<template>

  <nav
    v-show="isNavBarVisible"
    id="navbar-main"
    class="navbar is-fixed-top">

    <div class="navbar-menu fadeIn animated faster" :class="{ 'is-active': isMenuActive }">

        <div class="navbar-end">
        <nav-bar-menu class="has-divider">
          <b-icon
            icon="menu"
            custom-size="default"
          />
          <span>Sample Menu</span>
          <div
            class="navbar-dropdown"
          >
            <router-link
              to="/profile"
              class="navbar-item"
              exact-active-class="is-active"
            >
              <b-icon
                icon="account"
                custom-size="default"
              />
              <span>My Profile</span>
            </router-link>
            <a class="navbar-item">
              <b-icon
                icon="settings"
                custom-size="default"
              />
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <b-icon
                icon="email"
                custom-size="default"
              />
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              <b-icon
                icon="logout"
                custom-size="default"
              />
              <span>Log Out</span>
            </a>
          </div>
        </nav-bar-menu>
        </div>

    </div>


  </nav>

</template>

<script>
import { mapStateTwoWay } from 'vuex-map-state';

export default ({
    name: 'NavBar',
    components: {
        mapStateTwoWay,

    },
    data () {
        return {
        isMenuActive: false
        }
    },

    mounted() {

    },

    computed: {

    },

    methods: {

    },
})
</script>
