<template>
    <nav class="navbar is-transparent">
        <div class="container">
            <div class="navbar-brand">
                <p class="navbar-item">{{dateDisplay}}
                    <span class="is-size-7 has-text-weight-light">{{seconds}}</span>
                </p>
            </div>
            <!-- <div class="navbar-end">
                <span class="navbar-item">
                    <a class="button is-dark has-text-grey">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </span>
            </div> -->
        </div>
    </nav>
</template>

<script>
import moment from "moment";
import { setTimeout } from 'timers';
export default {
    name: "InfoBar",
    data() {
        return {
            dateDisplay: "",
            seconds: ""
        };
    },
    mounted() {
        this.updateTime();
        setInterval(this.updateTime, 1000);
    },
    methods: {
        updateTime() {
            this.dateDisplay = moment().format("dddd, MMMM Do, HH:mm");
            this.seconds = moment().format("ss");
        }
    }
};
</script>

<style scoped>
.is-size-7{
    margin-left: 4px;
}
</style>
