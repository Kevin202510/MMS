$(document).ready(function(){
    $("#curtemp").html("45");
    
    $.ajax({
        url: 'api/temperature/getNewVal',
        type: 'GET',
        dataType: 'json',
        success: function (data){
            if(data[0].status==0){

                $("#notificationContainer").html('<div class="dropdown-item dropdown-item-unread"><div class="dropdown-item-icon bg-danger text-white"><i class="fas fa-temperature-high"></i></div><div class="dropdown-item-desc">'+data[0].temperature+'°C Temperature is to High<div class="time text-primary">'+data[0].date + " | "+ data[0].time+'</div></div></div>');
                
            }
            
        }
    });
});