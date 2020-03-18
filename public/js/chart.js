onAjax({
    url: 'dashboard',
    method: 'GET',
    data: {chart:true}
}).done(function (data) {
    chart(data);
});

chart = (data) => {
    let datas = {};
    for (var property in data) {
        datas[property] = data[property].length;
    }
    var ctx = document.getElementById('companyDateChart');
    var companyDateChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(datas),
            datasets: [{
                label: `# Active Company`,
                data: Object.values(datas),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
};


