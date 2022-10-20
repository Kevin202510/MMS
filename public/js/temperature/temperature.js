$(document).ready(function(){
    table();
    showTemperatureChart();
});

$("body").on("click", ".btn-generate", async (e) =>
    $("#generateReport").modal("show")
);

$(function() {
  $('input[name="daterange"]').daterangepicker({
    maxDate: $.now(),
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});

$(document).ready(function(){
    setInterval(function(){
        table();
        }, 20000);
})

function table(){
    $.ajax({
      url: 'api/temperature/getNewVal',
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
                html += '<tr><td class="text-break">' + data[bb].temperature + ' °C</td><td class="text-break"><div class="badge '+state+'">' + data[bb].statusName + '</div></td><td class="text-break">' + data[bb].date + '</td><td class="text-break">' + data[bb].time + '</td></tr>'
            });
            $('#table-main').html(html);
            fetchTemperature();
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
          $("#success").text(tempobj.temperatureSensorMinVal + " °C above is Good Temperature");
          $("#warning").text(tempobj.temperatureSensorMinVal + " °C below is Low Temperature");
          $("#danger").text(tempobj.temperatureSensorMaxVal + " °C above is High Temperature");
      }
  });
}

var temperatureLabel = [];
var temperatureData = [];
var myTemperatureChart; 

function fetchTemperature(){
  $.ajax({
    url: 'api/temperature/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      temperatureLabel = [];
      temperatureData = [];
      
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
              temperatureLabel.push(newdata[bb].temperature + "°C");
              temperatureData.push(newdata[bb].temperature);
              // alert(bb);
              if(data.length-1==bb){
                if(data[bb].status == 0){
                  $("#tempstat").html('<div class="badge badge-danger">'+data[bb].statusName+'</div>');
                }else if(data[bb].status == 1){
                  $("#tempstat").html('<div class="badge badge-success">'+data[bb].statusName+'</div>');
                }else{
                  $("#tempstat").html('<div class="badge badge-warning">'+data[bb].statusName+'</div>');
                }
              }
          });   
          // tempstat
        showTemperatureChart();
    }
  })
}

"use strict";

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
        backgroundColor: '#f5f184',
        borderColor: '#aba50c',
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