
<template>
    <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="footer-copyright">
                            <!-- <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a> -->
                            &copy; {{ year }}, Katsioulas Dimitris.
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->

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
