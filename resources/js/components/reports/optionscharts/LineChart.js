import { Line } from 'vue-chartjs'

export default {
    extends: Line,
    props: {
        labels: {
            type:       Array,
            require:    true,
        },
        datasets: {
            type:       Array,
            require:    true,
        }
    },
    mounted() {
        this.loadChart()
    },
    methods: {
        loadChart() {
            this.renderChart({
                labels: this.labels,
                datasets: this.datasets
            }, {responsive: true, maintainAspectRadio: false})
        }
    },
    watch: {
        labels() {
            this.loadChart()
        }
    },
}
