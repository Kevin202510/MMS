<?php
class Sensors{
 public $link='';
 function __construct(){
  $this->connect();
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'mmsdb') or die('Cannot select the DB');
 }
 
 function temperatureInsert($temperature,$temperaturestat){
    $query = "insert into temperatures set temperature='".$temperature."',status='".$temperaturestat."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }

 function humidityInsert($humidity,$humiditystat){
    $query = "insert into humidities set humidity='".$humidity."',status='".$humiditystat."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function soilMoistureInsert($soilmoisture){
    $query = "insert into soilmoistures set soilmoisture='".$soilmoisture."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function LightAmountInsert($lightAmount,$lightAmountstat){
    $query = "insert into lights set lightsAmount='".$lightAmount."',status='".$lightAmountstat."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function CO2AmountInsert($co2Amount,$co2Amountstat){
    $query = "insert into carbondioxides set carbondioxideAmount='".$co2Amount."',status='".$co2Amountstat."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}
 
}

include("InnovatechDbCrudFunctions.php");


$temperaturelimitval;
$temperaturemaxval;
$humiditylimitval;
$humiditymaxval;
$lightlimitval;
$lightmaxval;
$co2limitval;
$co2maxval;
$temperaturestatusval;
$humiditystatusval;
$lightstatusval;
$co2statusval;

$b = new InnovatechDbCrudFunctions();
$b->select("sensorsconfigurations","*");
$result = $b->sql;


while ($row = mysqli_fetch_assoc($result)) { 
    if($row['sensor_name'] === "Temperature Sensor"){
        $temperaturelimitval = (float)$row['sensor_limit_value'];
        $temperaturemaxval = (float)$row['sensor_max_value'];
        $temperaturestatusval = (int)$row['isOn'];
    }if($row['sensor_name'] === "Humidity Sensor"){
        $humiditylimitval = (float)$row['sensor_limit_value'];
        $humiditymaxval = (float)$row['sensor_max_value'];
        $humiditystatusval = (int)$row['isOn'];
    }if($row['sensor_name'] === "Light Sensor"){
        $lightlimitval = (float)$row['sensor_limit_value'];
        $lightmaxval = (float)$row['sensor_max_value'];
        $lightstatusval = (int)$row['isOn'];
    }if($row['sensor_name'] === "Carbon Dioxide Sensor"){
        $co2limitval = (float)$row['sensor_limit_value'];
        $co2maxval = (float)$row['sensor_max_value'];
        $co2statusval = (int)$row['isOn'];
    }
}

if(!empty($_POST)){
 $sensorsval=new Sensors();
 if(isset($_POST['temperature'])){
     if($temperaturestatusval==1){
        $tempval = (float)$_POST['temperature'];
        $tempstat;
        if($tempval<$temperaturelimitval){
            $tempstat = 2;
        } else if($tempval>$temperaturemaxval){
            $tempstat = 0;
        } else{
            $tempstat = 1;
        }
        $sensorsval->temperatureInsert($_POST['temperature'],$tempstat);
    }
 }

 if(isset($_POST['humidity'])){
    if($humiditystatusval==1){
        $humidityval = (float)$_POST['humidity'];
        $humiditystat;
    if($humidityval<$humiditylimitval){
        $humiditystat = 2;
    } else if($humidityval>$humiditymaxval){
        $humiditystat = 0;
    } else{
        $humiditystat = 1;
    }
    $sensorsval->humidityInsert($_POST['humidity'],$humiditystat);
}
}

if(isset($_POST['lightAmount'])){
    if($lightstatusval==1){
        $lightval = (float)$_POST['lightAmount'];
        $lightstat;
    if($lightval<$lightlimitval){
        $lightstat = 2;
    } else if($lightval>$lightmaxval){
        $lightstat = 0;
    } else{
        $lightstat = 1;
    }
    $sensorsval->LightAmountInsert($_POST['lightAmount'],$lightstat);
}
}

if(isset($_POST['co2Amount'])){
    if($co2statusval==1){
        $co2val = (float)$_POST['co2Amount'];
        $co2stat;
    if($co2val<$co2limitval){
        $co2stat = 2;
    } else if($co2val>$co2maxval){
        $co2stat = 0;
    } else{
        $co2stat = 1;
    }
    $sensorsval->CO2AmountInsert($_POST['co2Amount'],$co2stat);
}
}
}
?>
