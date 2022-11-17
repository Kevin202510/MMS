<?php
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
       }else{
        echo "<script>alert('asdas');</script>";
       }
?>