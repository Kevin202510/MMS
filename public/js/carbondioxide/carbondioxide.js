$(document).ready(function(){
  table();
  showCarbonDioxideChart();
});

$(document).ready(function(){
    setInterval(function(){
        table();
        }, 20000);
})

var co2Label = [];
var co2Data = [];
var carbonDioxideChart;

function table(){
    $.ajax({
      url: 'api/carbondioxide/getNewVal',
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
                  html += '<tr><td class="text-break">' + data[bb].carbondioxideAmount + ' ppm</td><td class="text-break"><div class="badge '+state+'">' + data[bb].statusName + '</div></td><td class="text-break">' + data[bb].date + '</td><td class="text-break">' + data[bb].time + '</td></tr>'
              });
              $('#table-main').html(html);
              fetchCarbonDioxide();
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
          $("#success").text(tempobj.co2limitval + " ppm above Good Co2 Concentration");
          $("#warning").text(tempobj.co2limitval + " ppm below is Fair Co2 Concentration");
          $("#danger").text(tempobj.co2maxval + " ppm above is High Co2 Concentration");
      }
  });
}

function fetchCarbonDioxide(){
  $.ajax({
    url: 'api/carbondioxide/getNewVal',
    type: 'GET',
    dataType: 'json',
    success: function (data){
      co2Label = [];
      co2Data = [];
      
      var newdata = data.reverse();
        $.each (newdata, function (bb) {
          co2Label.push(newdata[bb].carbondioxideAmount + " ppm");
          co2Data.push(newdata[bb].carbondioxideAmount);

          if(data.length-1==bb){
            if(data[bb].status == 0){
              $("#co2stat").html('<div class="badge badge-danger">'+data[bb].statusName+'</div>');
            }else if(data[bb].status == 1){
              $("#co2stat").html('<div class="badge badge-success">'+data[bb].statusName+'</div>');
            }else{
              $("#co2stat").html('<div class="badge badge-warning">'+data[bb].statusName+'</div>');
            }
          }

          });    
        showCarbonDioxideChart();
    }
  })
}

"use strict";

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
        backgroundColor: '#38fcae',
        borderColor: '#0c945d',
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