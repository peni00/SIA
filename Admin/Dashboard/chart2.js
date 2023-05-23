var ctx = document.getElementById('doughnut-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    // data: {
    //     labels: ['Silver', 'Platinum', 'Gold', 'Diamond'],
    //     datasets: [{
    //         label: 'Data',
    //         data: [100, 19, 34, 5,],
    //         backgroundColor: [
    //             'rgba(0, 67, 133, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 176, 210, 1)',
    //             'rgba(181, 219, 241, 1)'
           
    //         ],
    //         borderColor: [
    //             'rgba(0, 67, 133, 1)',
    //             'rgba(52, 158, 255, 1)',
    //             'rgba(52, 176, 210, 1)',
    //             'rgba(181, 219, 241, 1)'
    //         ],
    //         borderWidth: 1
    //     }]
    // },
    data: data2,
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
        }
    }
    
});
