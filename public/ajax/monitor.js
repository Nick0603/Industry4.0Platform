// ajax


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
	    	update_display(data);
	    },
	    error: function (data) {
	        console.log('Error:' + data);
	    }
    });

}

function update_display(machine){
	if(machine.conn_status == 0){
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
		$('#conn').removeClass('danger')
				  .addClass('info')
				  .text('已連線');

		var postion = machine.position;
		$('#m_x').text(postion.m_x);
		$('#m_y').text(postion.m_y);
		$('#m_z').text(postion.m_z);
		$('#abs_x').text(postion.abs_x);
		$('#abs_y').text(postion.abs_y);
		$('#abs_z').text(postion.abs_z);
	}
}