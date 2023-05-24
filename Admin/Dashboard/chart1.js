var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    // data: {
    //     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
    //     datasets: [{
    //         label: 'Data',
    //         data: [100, 19, 34, 5, 65, 3, 10, 23, 7, 32, 54, 12, 100],
    //         backgroundColor: [
    //             'rgba(0, 67, 133, 1)'
           
    //         ],
    //         borderColor: [
    //             'rgba(0, 67, 133, 1)'
    //         ],
    //         borderWidth: 1
    //     }]
    // },
    data: data1,
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
        scales: {
            x: {
                ticks: {
                    color: 'white'
                }
            },
            y: {
                ticks: {
                    color: 'white'
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    color: 'white' // Set legend text color to white
                }
            }
        }
    }
});
