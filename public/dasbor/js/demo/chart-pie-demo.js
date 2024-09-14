// chart.js

document.addEventListener('DOMContentLoaded', function() {
  fetch('/chart-data')
      .then(response => response.json())
      .then(data => {
          var ctx = document.getElementById("myPieChart").getContext('2d');
          var myPieChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                  labels: data.labels,
                  datasets: [{
                      data: data.data,
                      backgroundColor: data.backgroundColor,
                      hoverBackgroundColor: data.hoverBackgroundColor,
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
              },
              options: {
                  maintainAspectRatio: false,
                  tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                  },
                  legend: {
                      display: false
                  },
                  cutoutPercentage: 80,
              },
          });
      })
      .catch(error => console.error('Error fetching chart data:', error));
});
