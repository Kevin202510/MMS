$(document).ready(function(){
  table();
  showHumidityChart();
});

$(document).ready(function(){
    setInterval(function(){
        table();
        }, 20000);
})

var humidityLabel = [];
var humidityData = [];
var myHumidityChart;

function table(){
    $.ajax({
      url: 'api/humidity/getNewVal',
      type: 'GET',
      dataType: 'json',
      success: function (data){
        if(data.length>1){
          var html = '';
          var state='';
          $.each (data, function (bb) {
                  if(data[bb].status==0){
                      state = "badge-danger";
                  }else if(data[bb].status==1){
                    state = "badge-success";
                  }else if(data[bb].status==2){
                    state = "badge-warning";
                  }
                  html += '<tr><td class="text-break">' + data[bb].humidity + ' %</td><td class="text-break"><div class="badge '+state+'">' + data[bb].statusName + '</div></td><td class="text-break">' + data[bb].date + '</td><td class="text-break">' + data[bb].time + '</td></tr>'
              });
              $('#table-main').html(html);
              fetchHumidity();
            }else{
              $('#table-main').html('<tr><td colspan="5"><center>NO AVAILABLE DATA<center></td></tr>');
            }
      }
    });

    $.ajax({
      type: "GET",
      url: "api/sensorsconfigurations",
      dataType: "json",
      encode: true,
      success: function(data)
      {
        let tempobj = JSON.parse(data[0].configuration_value);
          $("#success").text(tempobj.humiditylimitval + " % above is Good Humidity");
          $("#warning").text(tempobj.humiditylimitval + " % below is Low Humidity");
          $("#danger").text(tempobj.humiditymaxval + " % above is High Humidity");
      }
  });

}

function fetchHumidity(){
  $.ajax({
    url: 'api/humidity/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      humidityLabel = [];
      humidityData = [];
      
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          humidityLabel.push(newdata[bb].humidity + " %");
          humidityData.push(newdata[bb].humidity);
          if(data.length-1==bb){
            if(data[bb].status == 0){
              $("#humiditystat").html('<div class="badge badge-danger">'+data[bb].statusName+'</div>');
            }else if(data[bb].status == 1){
              $("#humiditystat").html('<div class="badge badge-success">'+data[bb].statusName+'</div>');
            }else{
              $("#humiditystat").html('<div class="badge badge-warning">'+data[bb].statusName+'</div>');
            }
          }
          });    
        showHumidityChart();
    }
  })
}

"use strict";

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