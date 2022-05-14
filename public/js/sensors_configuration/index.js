$(document).ready(function(){
    $(window).on( "load", function() {
        $.ajax({
            type: "GET",
            url: "api/sensorsconfigurations/temperatureSetting",
            dataType: "json",
            encode: true,
            success: function(data)
            {
                if(data.length==0){
                    $("#updateTemperatureSetting").hide();
                }else{
                    $("#saveTemperatureSetting").hide();
                    $("#updateTemperatureSetting").show();
                    $("#saveTemperatureSetting").addClass("update");
                    $("#sensor_limit_value").val(data[0].sensor_limit_value);
                    $("#sensor_max_value").val(data[0].sensor_max_value);
                    $("#id").val(data[0].id);
                    $("#isOn").val(data[0].isOn);
                }
            }
        });
    })
      $("#saveTemperatureSetting").click(function(event){
        //   event.preventDefault();
          var formData = {
            id: $("#id").val(),
            sensor_name: $("#sensor_name").val(),
            sensor_limit_value: $("#sensor_limit_value").val(),
            sensor_max_value: $("#sensor_max_value").val(),
            isOn: $("#isOn").val(),
          };
        //   var tempSettForm = $("#temperatureSettingForm");
        //   $("#temperatureSettingForm").submit();

          $.ajax({
            type: "POST",
            url: "api/sensorsconfigurations/save",
            data: formData, // serializes the form's elements.
            dataType: "json",
            encode: true,
            success: function(data)
            {
                swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    footer: "<a href>InnovaTech</a>",
                });

                $("#saveTemperatureSetting").hide();
                    $("#updateTemperatureSetting").show();
            }
        });

      })


      $("#updateTemperatureSetting").click(function(event){
        //   event.preventDefault();
          var formData = {
            id: $("#id").val(),
            sensor_name: $("#sensor_name").val(),
            sensor_limit_value: $("#sensor_limit_value").val(),
            sensor_max_value: $("#sensor_max_value").val(),
            isOn: $("#isOn").val(),
          };
        //   var tempSettForm = $("#temperatureSettingForm");
        //   $("#temperatureSettingForm").submit();

          $.ajax({
            type: "PUT",
            url: "api/sensorsconfigurations/"+formData.id+"/update",
            data: formData, // serializes the form's elements.
            dataType: "json",
            encode: true,
            success: function(data)
            {
                swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    footer: "<a href>InnovaTech</a>",
                });
            }
        });
    })

    $("#temperatureNavBtn").click(function(){
      
      $.ajax({
        type: "GET",
        url: "api/sensorsconfigurations/temperatureSetting",
        dataType: "json",
        encode: true,
        success: function(data)
        {
            if(data.length==0){
                $("#updateTemperatureSetting").hide();
            }else{
                $("#saveTemperatureSetting").hide();
                $("#updateTemperatureSetting").show();
                $("#saveTemperatureSetting").addClass("update");
                $("#sensor_limit_value").val(data[0].sensor_limit_value);
                $("#sensor_max_value").val(data[0].sensor_max_value);
                $("#id").val(data[0].id);
                $("#isOn").val(data[0].isOn);
            }
        }
          });

          $("#saveTemperatureSetting").click(function(event){
            //   event.preventDefault();
              var formData = {
                id: $("#id").val(),
                sensor_name: $("#sensor_name").val(),
                sensor_limit_value: $("#sensor_limit_value").val(),
                sensor_max_value: $("#sensor_max_value").val(),
                isOn: $("#isOn").val(),
              };
            //   var tempSettForm = $("#temperatureSettingForm");
            //   $("#temperatureSettingForm").submit();
      
              $.ajax({
                type: "POST",
                url: "api/sensorsconfigurations/save",
                data: formData, // serializes the form's elements.
                dataType: "json",
                encode: true,
                success: function(data)
                {
                    swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500,
                        footer: "<a href>InnovaTech</a>",
                    });
      
                    $("#saveTemperatureSetting").hide();
                        $("#updateTemperatureSetting").show();
                }
            });
      
          })
      
      
          $("#updateTemperatureSetting").click(function(event){
            //   event.preventDefault();
              var formData = {
                id: $("#id").val(),
                sensor_name: $("#sensor_name").val(),
                sensor_limit_value: $("#sensor_limit_value").val(),
                sensor_max_value: $("#sensor_max_value").val(),
                isOn: $("#isOn").val(),
              };
            //   var tempSettForm = $("#temperatureSettingForm");
            //   $("#temperatureSettingForm").submit();
      
              $.ajax({
                type: "PUT",
                url: "api/sensorsconfigurations/"+formData.id+"/update",
                data: formData, // serializes the form's elements.
                dataType: "json",
                encode: true,
                success: function(data)
                {
                    swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500,
                        footer: "<a href>InnovaTech</a>",
                    });
                }
            });
          })
      })

    $("#lightsNavBtn").click(function(){
        // LIGHT
        $.ajax({
          type: "GET",
          url: "api/sensorsconfigurations/lightSetting",
          dataType: "json",
          encode: true,
          success: function(data)
          {
              if(data.length==0){
                  $("#updatelightSetting").hide();
              }else{
                  $("#savelightSetting").hide();
                  $("#updatelightSetting").show();
                  $("#lightsensor_limit_value").val(data[0].sensor_limit_value);
                  $("#lightsensor_max_value").val(data[0].sensor_max_value);
                  $("#lightid").val(data[0].id);
                  $("#lightisOn").val(data[0].isOn);
              }
          }
      });

      $("#savelightSetting").click(function(event){
        //   event.preventDefault();
          var formDatas = {
            id: $("#lightid").val(),
            sensor_name: $("#lightsensor_name").val(),
            sensor_limit_value: $("#lightsensor_limit_value").val(),
            sensor_max_value: $("#lightsensor_max_value").val(),
            isOn: $("#lightisOn").val(),
          };
        //   var tempSettForm = $("#temperatureSettingForm");
        //   $("#temperatureSettingForm").submit();

          $.ajax({
            type: "POST",
            url: "api/sensorsconfigurations/savelight",
            data: formDatas, // serializes the form's elements.
            dataType: "json",
            encode: true,
            success: function(data)
            {
                swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    footer: "<a href>InnovaTech</a>",
                });

                $("#savelightSetting").hide();
                  $("#updatelightSetting").show();
            }
        });
      })

      $("#updatelightSetting").click(function(event){
        //   event.preventDefault();
          var formData = {
            id: $("#lightid").val(),
            sensor_name: $("#lightsensor_name").val(),
            sensor_limit_value: $("#lightsensor_limit_value").val(),
            sensor_max_value: $("#lightsensor_max_value").val(),
            isOn: $("#lightisOn").val(),
          };
        //   var tempSettForm = $("#temperatureSettingForm");
        //   $("#temperatureSettingForm").submit();

          $.ajax({
            type: "PUT",
            url: "api/sensorsconfigurations/"+formData.id+"/updatelight",
            data: formData, // serializes the form's elements.
            dataType: "json",
            encode: true,
            success: function(data)
            {
                swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                    footer: "<a href>InnovaTech</a>",
                });
            }
        });
    })

    })

    $("#co2NavBtn").click(function(){
      // LIGHT
      $.ajax({
        type: "GET",
        url: "api/sensorsconfigurations/co2Setting",
        dataType: "json",
        encode: true,
        success: function(data)
        {
            if(data.length==0){
                $("#updatecarbondioxideSetting").hide();
            }else{
                $("#savecarbondioxideSetting").hide();
                $("#updatecarbondioxideSetting").show();
                $("#carbondioxidesensor_limit_value").val(data[0].sensor_limit_value);
                $("#carbondioxidesensor_max_value").val(data[0].sensor_max_value);
                $("#carbondioxideid").val(data[0].id);
                $("#carbondioxideisOn").val(data[0].isOn);
            }
        }
    });

    $("#savecarbondioxideSetting").click(function(event){
      //   event.preventDefault();
        var formDatas = {
          id: $("#carbondioxideid").val(),
          sensor_name: $("#carbondioxidesensor_name").val(),
          sensor_limit_value: $("#carbondioxidesensor_limit_value").val(),
          sensor_max_value: $("#carbondioxidesensor_max_value").val(),
          isOn: $("#carbondioxideisOn").val(),
        };
      //   var tempSettForm = $("#temperatureSettingForm");
      //   $("#temperatureSettingForm").submit();

        $.ajax({
          type: "POST",
          url: "api/sensorsconfigurations/saveco2",
          data: formDatas, // serializes the form's elements.
          dataType: "json",
          encode: true,
          success: function(data)
          {
              swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                  footer: "<a href>InnovaTech</a>",
              });

              $("#savecarbondioxideSetting").hide();
              $("#updatecarbondioxideSetting").show();
          }
      });
    })

    $("#updatecarbondioxideSetting").click(function(event){
      //   event.preventDefault();
        var formData = {
          id: $("#carbondioxideid").val(),
          sensor_name: $("#carbondioxidesensor_name").val(),
          sensor_limit_value: $("#carbondioxidesensor_limit_value").val(),
          sensor_max_value: $("#carbondioxidesensor_max_value").val(),
          isOn: $("#carbondioxideisOn").val(),
        };
      //   var tempSettForm = $("#temperatureSettingForm");
      //   $("#temperatureSettingForm").submit();

        $.ajax({
          type: "PUT",
          url: "api/sensorsconfigurations/"+formData.id+"/updateco2",
          data: formData, // serializes the form's elements.
          dataType: "json",
          encode: true,
          success: function(data)
          {
              swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                  footer: "<a href>InnovaTech</a>",
              });
          }
      });
  })
    })

    $("#humidityNavBtn").click(function(){
      // LIGHT
      $.ajax({
        type: "GET",
        url: "api/sensorsconfigurations/humiditySetting",
        dataType: "json",
        encode: true,
        success: function(data)
        {
            if(data.length==0){
                $("#updatehumiditySetting").hide();
            }else{
                $("#savehumiditySetting").hide();
                $("#updatehumiditySetting").show();
                $("#humiditysensor_limit_value").val(data[0].sensor_limit_value);
                $("#humiditysensor_max_value").val(data[0].sensor_max_value);
                $("#humidityid").val(data[0].id);
                $("#humidityisOn").val(data[0].isOn);
            }
        }
    });

    $("#savehumiditySetting").click(function(event){
      //   event.preventDefault();
        var formDatas = {
          id: $("#humidityid").val(),
          sensor_name: $("#humiditysensor_name").val(),
          sensor_limit_value: $("#humiditysensor_limit_value").val(),
          sensor_max_value: $("#humiditysensor_max_value").val(),
          isOn: $("#humidityisOn").val(),
        };
      //   var tempSettForm = $("#temperatureSettingForm");
      //   $("#temperatureSettingForm").submit();

        $.ajax({
          type: "POST",
          url: "api/sensorsconfigurations/savehumidity",
          data: formDatas, // serializes the form's elements.
          dataType: "json",
          encode: true,
          success: function(data)
          {
              swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                  footer: "<a href>InnovaTech</a>",
              });

              $("#savehumiditySetting").hide();
              $("#updatehumiditySetting").show();
          }
      });
    })

    $("#updatehumiditySetting").click(function(event){
      //   event.preventDefault();
        var formData = {
          id: $("#humidityid").val(),
          sensor_name: $("#humiditysensor_name").val(),
          sensor_limit_value: $("#humiditysensor_limit_value").val(),
          sensor_max_value: $("#humiditysensor_max_value").val(),
          isOn: $("#humidityisOn").val(),
        };
      //   var tempSettForm = $("#temperatureSettingForm");
      //   $("#temperatureSettingForm").submit();

        $.ajax({
          type: "PUT",
          url: "api/sensorsconfigurations/"+formData.id+"/updatehumidity",
          data: formData, // serializes the form's elements.
          dataType: "json",
          encode: true,
          success: function(data)
          {
              swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: "Your work has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                  footer: "<a href>InnovaTech</a>",
              });
          }
      });
  })
    })
   
});