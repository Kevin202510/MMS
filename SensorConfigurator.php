<?php 

    include("InnovatechDbCrudFunctions.php");

    if (!empty($_POST)) {

        $tempsenId = $_POST["temperaturesensorId"];
        $lightsenId = $_POST["lightsensorId"];
        $co2senId = $_POST["co2sensorId"];
        $humsenId = $_POST["humiditysensorId"];

        $temperaturenameval= "";
        $temperaturelimitval = "";
        $temperaturemaxval = "";
        $temperaturestatusval = "";

        $humiditynameval= "";
        $humiditylimitval = "";
        $humiditymaxval = "";
        $humiditystatusval = "";

        $lightnameval= "";
        $lightlimitval = "";
        $lightmaxval = "";
        $lightstatusval = "";

        $co2nameval= "";
        $co2limitval = "";
        $co2maxval = "";
        $co2statusval = "";

        $b = new InnovatechDbCrudFunctions();
        $b->select("sensorsconfigurations","*");
        $result = $b->sql;


        while ($row = mysqli_fetch_assoc($result)) { 
            if($row['sensor_name'] === "Temperature Sensor"){
                $temperaturenameval = $row['sensor_name'];
                $temperaturelimitval = $row['sensor_limit_value'];
                $temperaturemaxval = $row['sensor_max_value'];
                $temperaturestatusval = $row['isOn'];
            }if($row['sensor_name'] === "Light Sensor"){
              $lightnameval = $row['sensor_name'];
              $lightlimitval = $row['sensor_limit_value'];
              $lightmaxval = $row['sensor_max_value'];
              $lightstatusval = $row['isOn'];
            }if($row['sensor_name'] === "Carbon Dioxide Sensor"){
              $co2nameval = $row['sensor_name'];
              $co2limitval = $row['sensor_limit_value'];
              $co2maxval = $row['sensor_max_value'];
              $co2statusval = $row['isOn'];
            }if($row['sensor_name'] === "Humidity Sensor"){
              $humiditynameval = $row['sensor_name'];
              $humiditylimitval = $row['sensor_limit_value'];
              $humiditymaxval = $row['sensor_max_value'];
              $humiditystatusval = $row['isOn'];
            }
        }



        echo $temperaturenameval . '=' . $temperaturelimitval . '=' .  $temperaturemaxval . '=' . $temperaturestatusval.':';
        echo $lightnameval . '=' . $lightlimitval . '=' .  $lightmaxval . '=' . $lightstatusval.':';
        echo $humiditynameval . '=' . $humiditylimitval . '=' .  $humiditymaxval . '=' . $humiditystatusval.':';
        echo $co2nameval . '=' . $co2limitval . '=' .  $co2maxval . '=' . $co2statusval.':';
        // echo $lightsenId;
        // echo $co2senId;
        // echo $humsenId;
      }
?>
