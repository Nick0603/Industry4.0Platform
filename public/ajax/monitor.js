// ajax
var data_updated_at = 0;
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
	    	update_display(data);
	    },
	    error: function (data) {
	        console.log('Error:' + data);
	    }
    });

}

function update_display(resDate){
	console.log(resDate);
	if(resDate == -1){
		console.log("取得資訊：機台中斷連線");
		$('#conn').removeClass('info')
				  .addClass('danger')
				  .text('斷線中');

		$('#m_x').text('未讀取');
		$('#m_y').text('未讀取');
		$('#m_z').text('未讀取');
		$('#abs_x').text('未讀取');
		$('#abs_y').text('未讀取');
		$('#abs_z').text('未讀取');
	}else{
		if(data_updated_at != resDate['updated_at'] ){
			data_updated_at = resDate['updated_at'];
			console.log("取得新資訊，更新時間："+ data_updated_at);

			$('#conn').removeClass('danger')
					  .addClass('info')
					  .text('已連線');

			$('#m_x').text(resDate['m_x']);
			$('#m_y').text(resDate['m_y']);
			$('#m_z').text(resDate['m_z']);
			$('#abs_x').text(resDate['abs_x']);
			$('#abs_y').text(resDate['abs_y']);
			$('#abs_z').text(resDate['abs_z']);
		}
	}
}