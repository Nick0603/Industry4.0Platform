// ajax

$(document).ready(function(){
	loop_update(500 + Math.random()*500);
 });

function loop_update(delay_time){
    setTimeout(function() {
    	ajax();
        loop_update(delay_time);
    },delay_time);
}

function ajax(){

	$.ajax({
		type: "GET",
		url:window.location.href + '/ajax',
	    success: function (data) {
	    	console.log(data);
	    	update_display(data);
	    },
        error: function (data) {
            console.log('Error:', data);
        }
    });

}


function update_display(data){
	if(data.conn_status == 0){
		$('#conn').removeClass('info')
				  .addClass('danger')
				  .text('斷線中');
	}else{
		$('#conn').removeClass('danger')
				  .addClass('info')
				  .text('已連線');
	}
	var postion = data.position;
	$('#m_x').text(postion.m_x);
	$('#m_y').text(postion.m_y);
	$('#m_z').text(postion.m_z);
	$('#abs_x').text(postion.abs_x);
	$('#abs_y').text(postion.abs_y);
	$('#abs_z').text(postion.abs_z);
}