var ctx = document.getElementById('graph-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    // data: {
    //     labels: ['Item1', 'Item2', 'Item3', 'Item4', 'Item5'],
    //     datasets: [{
    //         label: 'Data',
    //         data: [100, 19, 34, 5, 34],
    //         backgroundColor: [
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)'

           
    //         ],
    //         borderColor: [
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 158, 255, 1)'


    //         ],
    //         borderWidth: 1
    //     }]
    //  },
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
                color: '#fff',
                formatter: function(value, context) {
                    return context.chart.data.labels[context.dataIndex] + ': ' + value;
                }
            },
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontColor: 'black'
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
        }
    }
    
});
