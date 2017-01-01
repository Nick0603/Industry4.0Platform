//修改機台選單的連結，原本連結為機台編號
var machines = $('#machinesSeletor').find('a');


$('#machinesSeletor').find('a').each(function(){
	var machineID = $(this).attr('machineid');
	var newLink = getNewLink(machineID)
	$(this).attr('href',newLink);
})

function getNewLink(machineID){
	var host = document.location.host;
	var pathName = document.location.pathname;
	var pathNameSections = pathName.split('/');

	var newLink = 'http://' + host + '/data/machines/';
	if(pathNameSections[4] == 'immediate'){

		newLink += machineID + '/immediate'

	}else if(pathNameSections[4] == 'machineData'){
		newLink += machineID + '/machineData';
		if(pathNameSections[5] == 'utilization'){
			newLink += '/utilization/latestOrder'
		}

	}else if(pathNameSections[4] == 'test'){

		newLink +=+ machineID + '/test';

	}

	return newLink;
}