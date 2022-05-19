  void getDataFromDB()   //CONNECTING WITH MYSQL
 {
   if (client.connect(server, 80)) {
    Serial.println("connected");
    
    dataToReview = (temperaturesensorId+tempsenId + lightsensorId + lightsenId + co2sensorId + co2senId + humiditysensorId + humsenId); 
    
    client.println("POST /MMS/SensorConfigurator.php HTTP/1.1");
    client.println("Host: 192.168.2.102");
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(dataToReview.length());
    client.println();
    client.print(dataToReview);
    
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    client.readStringUntil('\r');
    
    String temperatureSensorVal = client.readStringUntil('=');

//    Serial.print(temperatureSensorVal);
    
    if(temperatureSensorVal.length()==19){
      client.readStringUntil('=');
      client.readStringUntil('=');
      String tempstatusval = client.readStringUntil(':');
      temperaturestatValue = tempstatusval.toInt();

//      if(temperaturestatValue==0){
//        Serial.println("Sensor is OFF");
//      }else if(temperaturestatValue==1){
        temperatureAndHumiditySensor();
//      }
    }
  
//    client.readStringUntil('=');
    String lightSensorVal = client.readStringUntil('=');
//    Serial.println(lightSensorVal.length());
     
    if(lightSensorVal.length()==12){
      client.readStringUntil('=');
      client.readStringUntil('=');
      String lightstatusval = client.readStringUntil(':');
      lightstatValue = lightstatusval.toInt();

//      if(lightstatValue==0){
//        Serial.println("Sensor is OFF");
//      }else if(lightstatValue==1){
        lightSensor();
//      }
    }
    

      String humiditySensorVal = client.readStringUntil('=');
//      Serial.print(humiditySensorVal.length());
    if(humiditySensorVal.length()==15){
      client.readStringUntil('=');
      client.readStringUntil('=');
      String humiditystatusval = client.readStringUntil(':');
      humiditystatValue = humiditystatusval.toInt();

//      if(humiditystatValue==0){
//        Serial.println("Sensor is OFF");
//      }else if(humiditystatValue==1){
        humiditySensors();
//      }
    }

    String carbondioxideSensorVal = client.readStringUntil('=');
    if(carbondioxideSensorVal.length()==21){
      client.readStringUntil('=');
      client.readStringUntil('=');
      String co2statusval = client.readStringUntil(':');
      co2statValue = co2statusval.toInt();

//      if(co2statValue==0){
//        Serial.println("Sensor is OFF");
//      }else if(co2statValue==1){
        co2Sensor();
//      }
    }

//    delay(2000);
    
//    if(temperaturestatValue==1 && lightstatValue==1 && humiditystatValue==1 && co2statValue==1){
      sendDataToDB();
//    }

    client.stop();
    
  } else {
    Serial.println("connection failed");
  }
 }