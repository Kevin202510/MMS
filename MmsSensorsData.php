<?php
class Sensors{
 public $link='';
 function __construct($temperature, $humidity, $soilmoisture, $lightAmount, $co2Amount){
  $this->connect();
  $this->temperatureInsert($temperature);
  $this->humidityInsert($humidity);
  $this->soilMoistureInsert($soilmoisture);
  $this->LightAmountInsert($lightAmount);
  $this->CO2AmountInsert($co2Amount);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'mmsdb') or die('Cannot select the DB');
 }
 
 function temperatureInsert($temperature){
    $query = "insert into temperatures set temperature='".$temperature."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }

 function humidityInsert($humidity){
    $query = "insert into humidities set humidity='".$humidity."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function soilMoistureInsert($soilmoisture){
    $query = "insert into soilmoistures set soilmoisture='".$soilmoisture."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function LightAmountInsert($lightAmount){
    $query = "insert into lights set lightsAmount='".$lightAmount."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}

function CO2AmountInsert($co2Amount){
    $query = "insert into carbondioxides set carbondioxideAmount='".$co2Amount."'";
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
}
 
}
if($_POST['temperature'] != '' and  $_POST['humidity'] != '' and  $_POST['soilmoisture'] != '' and  $_POST['lightAmount'] != '' and  $_POST['co2Amount'] != ''){
 $dht11=new Sensors($_POST['temperature'],$_POST['humidity'],$_POST['soilmoisture'],$_POST['lightAmount'],$_POST['co2Amount']);
}
?>
