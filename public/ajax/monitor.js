// ajax
var data_updated_at = 0;
var temperatureLimit = 40;
var spinderLoadLimit = 80;
var lastAlarmTime = 0;

$(document).ready(function(){
	drawChartSpinderLoad();
	drawChartTemperature();
	loop_update(2000);
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

	// //主軸負載
	// $.ajax({

 //        type: "GET",
	// 	url: window.location.href+'/ajax/spindleLoad',
	//     success: function (data) {
	//     	update_display(data);
	//     },
	//     error: function (data) {
	//         console.log('Error:' + data);
	//     }
 //    });
}

function update_display(resData){
	if(resData == -1){
		// console.log("取得資訊：機台中斷連線");
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
		if(data_updated_at != resData['updated_at'] ){
			//flag
			data_updated_at = resData['updated_at'];

			$('#conn').removeClass('danger')
					  .addClass('info')
					  .text('已連線');

			$('#runningCodeName').text(resData['CodeName']);
			$('#runningCodeIndex').text(resData['runningCodeIndex']);
			$('#runningGCode').text(resData['runningGCode']);
			$('#spinderLoad').text(resData['spinderLoad'] + ' % ');
			$('#temperature').text(resData['temperature'] + ' 度 ');

			$('#m_x').text(resData['m_x']);
			$('#m_y').text(resData['m_y']);
			$('#m_z').text(resData['m_z']);
			$('#abs_x').text(resData['abs_x']);
			$('#abs_y').text(resData['abs_y']);
			$('#abs_z').text(resData['abs_z']);
			

			insertData_temperature(resData);
			insertData_spinderLoad(resData);
			// 三十秒可推一次警告訊息
			
				
				if(resData['spinderLoad']>spinderLoadLimit){
					if(new Date - lastAlarmTime  > 30000){
						lastAlarmTime = new Date;
						console.log("Alarm_spinderLoad");
						sendAlarm('spinderLoad',resData);
					}
				}
				if(resData['temperature']>temperatureLimit){
					if(new Date - lastAlarmTime  > 30000){
						lastAlarmTime = new Date;
						console.log("Alarm_temperature");
						sendAlarm('temperature',resData)
					}
				}
			
		}
	}
}


function sendAlarm(type,alarmData){


	if(type == 'temperature'){
		var alarmValue = alarmData['temperature'];
	}
	if(type == 'spinderLoad'){
		var alarmValue = alarmData['spinderLoad'];
	}

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: window.location.href+'/alarm/'+type,
	    type: 'POST',
	    data: {_token: CSRF_TOKEN,"time":alarmData['updated_at'],"alarmValue":alarmValue},
	    dataType: 'JSON',
	    success: function (data) {
	        console.log(data);
	    }
	});

	$.ajax({
	    url: "https://api.kotsms.com.tw/kotsmsapi-1.php?username=b10303008&password=nick19700101&dstaddr=0953258674&smbody=mechinne alarm!  " + "type:" + type + " value:" + alarmValue ,
	    success: function (data) {
	        console.log(data);
	    }
	});

}