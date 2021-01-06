(function ($) {
  'use strict';
  $(function () {
    if ($("#dashboard-area-chart").length) {

      var lineChartCanvas = $("#dashboard-area-chart")
          .get(0)
          .getContext("2d");
      var data = {
          labels: Labels,
          datasets: [
              {
                  label: "Jumlah Cuti",
                  data: Prices,
                  backgroundColor: "#2196f3",
                  borderColor: "#0c83e2",
                  borderWidth: 1,
                  fill: true
              }
            //   ,
            //   {
            //       label: "Product",
            //       data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
            //       backgroundColor: "#19d895",
            //       borderColor: "#15b67d",
            //       borderWidth: 1,
            //       fill: true
            //   }
          ]
      };
      var options = {
          responsive: true,
          maintainAspectRatio: true,
          scales: {
              yAxes: [
                  {
                      gridLines: {
                          color: "#F2F6F9"
                      },
                      ticks: {
                          beginAtZero: true,
                          min: 0,
                          max: 20,
                          stepSize: 2
                      }
                  }
              ],
              xAxes: [
                  {
                      gridLines: {
                          color: "#F2F6F9"
                      },
                      ticks: {
                          beginAtZero: true
                      }
                  }
              ]
          },
          legend: {
              display: false
          },
          elements: {
              point: {
                  radius: 2
              }
          },
          layout: {
              padding: {
                  left: 0,
                  right: 0,
                  top: 0,
                  bottom: 0
              }
          },
          stepsize: 1
      };
      var lineChart = new Chart(lineChartCanvas, {
          type: "line",
          data: data,
          options: options
      });
  }
  });
})(jQuery);