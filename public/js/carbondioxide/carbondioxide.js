$(document).ready(function(){
    $(window).on( "load", function() {
      table();
    })
});

$(document).ready(function(){
    setInterval(function(){
        table();
        }, 20000);
})

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
                  html += '<tr><td class="text-break">' + data[bb].id + '</td><td class="text-break">' + data[bb].carbondioxideAmount + ' °C</td><td class="text-break"><div class="badge '+state+'">' + data[bb].statusName + '</div></td><td class="text-break">' + data[bb].date + '</td><td class="text-break">' + data[bb].time + '</td></tr>'
              });
              $('#table-main').html(html);
            }else{
              $('#table-main').html('<tr><td colspan="5"><center>NO AVAILABLE DATA<center></td></tr>');
            }
      }
    })
}