
<template>
    <footer class="footer">

        <div class="container-fluid">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="footer-copyright">
                            <b>&copy; {{ year }}, Katsioulas Dimitris</b>.
                        </div>
                   </div>
                </div>
            </div>
        </div>

    </footer>
</template>

<script>
import { mapStateTwoWay } from 'vuex-map-state';


export default ({
    name: 'FooterBar',
    components: {
        mapStateTwoWay,
    },
    data () {
        return {
            year: new Date().getFullYear()
        }
    }
})
</script>
