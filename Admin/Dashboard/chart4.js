var ctx = document.getElementById('graph1-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: barChartLabels,
        datasets: [{
            label: "Quantity",
            data: barChartDataset.map(d => d.data)
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 50,
                right: 50,
                top: 0,
                bottom: 0
            }
        },
        plugins: {
            datalabels: {
                color: 'white',
                formatter: function(value, context) {
                    return context.chart.data.labels[context.dataIndex] + ': ' + value;
                }
            },
            legend: {
                display: true,
                position: 'right',
                labels: {
                    color: 'white'
                }
            },
            tooltips: {
                enabled: true,
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index];
                        var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return label + ': ' + value;
                    }
                }
            },
            elements: {
                arc: {
                    borderWidth: 0
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: 'white' // Set x-axis ticks color to white
                },
               
            },
            y: {
                ticks: {
                    color: 'white' // Set y-axis ticks color to white
                },
                
            }
        }
    }
});
