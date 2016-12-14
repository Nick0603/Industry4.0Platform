var utilizations;
var lengthOfUtilizations;
createUtilization();

function createUtilization(){
    $.ajax({
      url: "./ajax",
      type: "GET",
      dataType: "json",
      success: function(res) {
        utilizations = res;
        lengthOfUtilizations = res.length;
        updateDisplayTable(utilizations,lengthOfUtilizations);
        drawChart(utilizations);
      },
      
      error: function() {
        alert("ERROR!!!");
      }
    });
}

function updateDisplayTable(data,dataLenth){
    var PathnameDivides = location.pathname.split("/");
    var DisplayItem = PathnameDivides.pop();
    if(DisplayItem == 'all'){
      for(i = 0; i<dataLenth ; i++){
        var body_item = "";
        body_item += "<td>" + data[i]['date'] +"</td>"; 
        body_item += "<td>" + data[i]['utilization']+" %" +"</td>";
        body_item += "<td>" + data[i]['busyTimer']  +" hr" +"</td>";
        body_item += "<td>" + data[i]['idleTimer']  +" hr" +"</td>";
        body_item += "<td>" + data[i]['alarmTimer'] +" hr" +"</td>";
        body_item += "<td>" + data[i]['offTimer']   +" hr" +"</td>";
        if(data[i]['remarkTitle'] == null ){
          body_item += "<td>無</td>";
        }else{
          body_item += "<td>" + data[i]['remarkTitle']   +"</td>";
        }
        
        var body_data = $("<tr></tr>").html(body_item); 
        $('#utilizationTable').append(body_data);

        var body_item = "";
        body_item += data[i]['date'] ;
        var body_link = $("<a></a>").html(body_item).attr('href',"./" + data[i]['date']); 
        var body_data = $("<li></li>").html(body_link);
        $('#utilizationDetailList').append(body_data);
      }
    }else{
      for(i = 0; i<dataLenth ; i++){
        var body_item = "";
        body_item += data[i]['date'] ;
        var body_link = $("<a></a>").html(body_item).attr('href',"./" + data[i]['date']); 
        var body_data = $("<li></li>").html(body_link);
        $('#utilizationDetailList').append(body_data);

        if(data[i]['date'] == DisplayItem){
          $('#utilizationDate').text(data[i]['date']);
          $('#utilizationValue').text(data[i]['utilization'] + " %");
          $('#busyTimer').text(data[i]['busyTimer'] + " (hr)");
          $('#idleTimer').text(data[i]['idleTimer'] + " (hr)");
          $('#alarmTimer').text(data[i]['alarmTimer'] + " (hr)");
          $('#offTimer').text(data[i]['offTimer'] + " (hr)");
          $('#remarkTitle').val(data[i]['remarkTitle']);
          $('#remarkContent').val(data[i]['remarkContent']);
        }
      }
    }
}

$('#utilizationTable').click(function() {
  $('td').addClass('bg-info');
}, function() {
  $(this).removeClass('bg-info');
});