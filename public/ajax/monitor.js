// ajax
var noConnCount = 0;
var judgNoConnLimit = 5;

$(document).ready(function(){
	//設定隨機等待連線時間，以防使用者連線衝突
	loop_update(800 + Math.random()*200);
 });

function loop_update(delay_time){
    setTimeout(function() {
    	monitor_ajax();
        loop_update(delay_time);
    },delay_time);
}

function monitor_ajax(){

	//設定讓post連線
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$.ajax({

        type: "POST",
		url: window.location.href,
		data:{operate:'1'},
		datatype:'JSON',
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
	//如果連線超過 judgNoConnLimit 次數都未連線到，將其連線顯示為斷線



	if(machine.conn_status == 0){
		noConnCount++;

		if(noConnCount >= judgNoConnLimit){
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
	}else{
		noConnCount = 0;

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