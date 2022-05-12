$(document).ready(function(){
    $(window).on( "load", function() {
      startChart();
    })

    setInterval(function(){
      startChart();
      }, 20000);

});

var temperatureLabel = [];
var temperatureData = [];
var humidityLabel = [];
var humidityData = [];
var soilMoistureLabel = [];
var soilMoistureData = [];
var co2Label = [];
var co2Data = [];
var lightLabel = [];
var lightData = [];
var waterLevelLabel = [];
var waterLevelData = [];

function startChart(){
  fetchTemperature();
  fetchHumidity();
  fetchSoilMoisture();
  fetchCarbonDioxide();
  fetchLight();
  fetchWaterLevel();
}

function fetchTemperature(){
    $.ajax({
      url: 'api/temperature/getNewVal',
      type: 'GET',
      dataType: 'json',
      success: function (data){
        temperatureLabel = [];
        temperatureData = [];
        console.log(data.length);
        var newdata = data.reverse();
          $.each (newdata, function (bb) {
            temperatureLabel.push(newdata[bb].temperature + "°C");
                temperatureData.push(newdata[bb].temperature);
            });    
          showTemperatureChart();
      }
    })
}

function fetchHumidity(){
  $.ajax({
    url: 'api/humidity/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      humidityLabel = [];
      humidityData = [];
      console.log(data.length);
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          humidityLabel.push(newdata[bb].humidity + " %");
          humidityData.push(newdata[bb].humidity);
          });    
        showHumidityChart();
    }
  })
}

function fetchSoilMoisture(){
  $.ajax({
    url: 'api/soil/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      soilMoistureLabel = [];
      soilMoistureData = [];
      console.log(data.length);
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          soilMoistureLabel.push(newdata[bb].soilmoisture + " %");
          soilMoistureData.push(newdata[bb].soilmoisture);
          });    
        showSoilMoistureChart();
    }
  })
}

function fetchCarbonDioxide(){
  $.ajax({
    url: 'api/carbondioxide/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      co2Label = [];
      co2Data = [];
      console.log(data.length);
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          co2Label.push(newdata[bb].carbondioxideAmount + " ppm");
          co2Data.push(newdata[bb].carbondioxideAmount);
          });    
        showCarbonDioxideChart();
    }
  })
}

function fetchLight(){
  $.ajax({
    url: 'api/light/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      lightLabel = [];
      lightData = [];
      console.log(data.length);
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          lightLabel.push(newdata[bb].lightsAmount + " lm");
          lightData.push(newdata[bb].lightsAmount);
          });    
        showLightChart();
    }
  })
}

function fetchWaterLevel(){
  $.ajax({
    url: 'api/water/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      waterLevelLabel = [];
      waterLevelData = [];
      console.log(data.length);
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          waterLevelLabel.push(newdata[bb].waterlevel + " cfs");
          waterLevelData.push(newdata[bb].waterlevel);
          });    
          showWaterLevelchart();
    }
  })
}

"use strict";

var myTemperatureChart;
var myHumidityChart;
var soilMoistureChart;
var carbonDioxideChart;
var lightChart;
var waterLevelChart;

function showTemperatureChart(){
  var ctx = document.getElementById("temperatureChart").getContext('2d');
  myTemperatureChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: temperatureLabel,
      datasets: [{
        label: 'Temperature',
        data: temperatureData,
        borderWidth: 2,
        backgroundColor: '#6777ef',
        borderColor: '#6777ef',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
}

function showHumidityChart(){
  var ctx = document.getElementById("humidityChart").getContext('2d');
  myHumidityChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: humidityLabel,
      datasets: [{
        label: 'Humidity',
        data: humidityData,
        borderWidth: 2,
        backgroundColor: '#f27e1f',
        borderColor: '#bd833c',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  }

  function showSoilMoistureChart(){
    var ctx = document.getElementById("soilMoistureChart").getContext('2d');
    soilMoistureChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: soilMoistureLabel,
        datasets: [{
          label: 'Soil Moisture',
          data: soilMoistureData,
          borderWidth: 2,
          backgroundColor: '#ab8363',
          borderColor: '#edc6a6',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              drawBorder: false,
              color: '#f2f2f2',
            },
            ticks: {
              beginAtZero: true,
            }
          }],
          xAxes: [{
            ticks: {
              display: false
            },
            gridLines: {
              display: false
            }
          }]
        },
      }
    });
    }

function showCarbonDioxideChart(){
  var ctx = document.getElementById("co2Chart").getContext('2d');
  carbonDioxideChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:co2Label,
      datasets: [{
        label: 'Carbon Dioxide',
        data: co2Data,
        borderWidth: 2,
        backgroundColor: '#79f78c',
        borderColor: '#c7ebcd',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  }

  function showLightChart(){
  var ctx = document.getElementById("lightChart").getContext('2d');
  lightChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:lightLabel,
      datasets: [{
        label: 'Light Lumen',
        data: lightData,
        borderWidth: 2,
        backgroundColor: '#e6faf9',
        borderColor: '#dee3e3',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  }

  function showWaterLevelchart(){
    var ctx = document.getElementById("waterLevelChart").getContext('2d');
    waterLevelChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels:waterLevelLabel,
        datasets: [{
          label: 'Cubic Feet Per Second',
          data: waterLevelData,
          borderWidth: 2,
          backgroundColor: '#62f5ed',
          borderColor: '#a4ede9',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              drawBorder: false,
              color: '#f2f2f2',
            },
            ticks: {
              beginAtZero: true,
            }
          }],
          xAxes: [{
            ticks: {
              display: false
            },
            gridLines: {
              display: false
            }
          }]
        },
      }
    });
    }