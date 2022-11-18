<?php

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
   
   $servername = "localhost";
   $username="root";
   $password="";
   $dbname="mmsdb";

   $sql = 'SELECT * FROM sensorsconfigurations WHERE "isActive"=1';

   $configval;

   try {
        foreach($pdo->query($sql)as $row){
            $jsonobj = $row['configuration_value'];
            $configval = json_decode($jsonobj);

            // var_dump($configval);
            $temperaturelimitval = (float)$configval->temperatureSensorMinVal;
            $temperaturemaxval = (float)$configval->temperatureSensorMaxVal;
            $humiditylimitval = (float)$configval->humiditylimitval;
            $humiditymaxval = (float)$configval->humiditymaxval;
            $lightlimitval = (float)$configval->lightlimitval;
            $lightmaxval = (float)$configval->lightmaxval;
            $co2limitval = (float)$configval->co2limitval;
            $co2maxval = (float)$configval->co2maxval;

            $temperaturestatusval = (int)$configval->temperaturestatusval;
            $humiditystatusval = (int)$configval->humiditystatusval;
            $lightstatusval = (int)$configval->lightstatusval;
            $co2statusval = (int)$configval->co2statusval;

            echo $lightstatusval."<br>";
            echo $co2statusval;
        }
   } catch (\PDOException $e) {
        print $e->getMessage();
   }


    if(!empty($_GET)){
        if(isset($_GET['temperature'])){
            if($temperaturestatusval==1){
               $tempval = (float)$_GET['temperature'];
               $tempstat;
               if($tempval<$temperaturelimitval){
                   $tempstat = 2;
               } else if($tempval>$temperaturemaxval){
                   $tempstat = 0;
               } else{
                   $tempstat = 1;
               }
               $sql1 = 'INSERT INTO temperatures(temperature,status)VALUES('.$_GET['temperature'].','.$tempstat.')';
               $pdo->query($sql1);
           }
        }
       
        if(isset($_GET['humidity'])){
           if($humiditystatusval==1){
               $humidityval = (float)$_GET['humidity'];
               $humiditystat;
           if($humidityval<$humiditylimitval){
               $humiditystat = 2;
           } else if($humidityval>$humiditymaxval){
               $humiditystat = 0;
           } else{
               $humiditystat = 1;
           }
           $sql2 = 'INSERT INTO humidities(humidity,status)VALUES('.$_GET['humidity'].','.$humiditystat.')';
            $pdo->query($sql2);
       }
       }
       
       if(isset($_GET['lightAmount'])){
           if($lightstatusval==1){
               $lightval = (float)$_GET['lightAmount'];
               $lightstat;
           if($lightval<$lightlimitval){
               $lightstat = 2;
           } else if($lightval>$lightmaxval){
               $lightstat = 0;
           } else{
               $lightstat = 1;
           }
           $sql20 = 'INSERT INTO lights(lightsAmount,status)VALUES('.$_GET['lightAmount'].','.$lightstat.')';
               $pdo->query($sql20);
       }
       }
       
       if(isset($_GET['co2Amount'])){
           if($co2statusval==1){
               $co2val = (float)$_GET['co2Amount'];
               $co2stat;
           if($co2val<$co2limitval){
               $co2stat = 2;
           } else if($co2val>$co2maxval){
               $co2stat = 0;
           } else{
               $co2stat = 1;
           }
            $sql10 = 'INSERT INTO carbondioxides(carbondioxideAmount,status)VALUES('.$_GET['co2Amount'].','.$co2stat.')';
            $pdo->query($sql10);
       }
       }
       }
?>

<form>
    <input type="text" name="temperature"><br>
    <input type="text" name="humidity"><br>
    <input type="text" name="lightAmount"><br>
    <input type="text" name="co2Amount"><br>
    <input type="submit" name=""><br>
</form>