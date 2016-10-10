$(document).ready(function(){
	//設定隨機等待連線時間，以防使用者連線衝突
	loop_update(1000);
 });

function loop_update(delay_time){
    setTimeout(function() {
    	monitor_ajax();
    	loop_update(delay_time);
    },delay_time);
}

function monitor_ajax(){

	$.ajax({
        type: "GET",
		url: window.location.href+'/ajax',
	    success: function (data) {
	    	console.log(data);
	    },
	    error: function (data) {
	        console.log('Error:' + data);
	    }
    });
}