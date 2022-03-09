<template>
    <div class="card mb-5">
        <div class="card-header">Results</div>
        <div class="card-body" id="app">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js/auto';
    export default {
        props: ['yesvotes', 'novotes'],
        mounted() {
            console.log(this.yesvotes)
            console.log(this.novotes)
            var yesVotes = this.yesvotes
            var noVotes = this.novotes
            console.log('ChartComponent mounted.')
            window.addEventListener('load', function () {
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Snow Day!', 'No Snow Day :('],
                        datasets: [{
                            label: 'Yes Votes',
                            data: [yesVotes, noVotes],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
        }
    }
</script>