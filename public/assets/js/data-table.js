$(function(){
	$('#medic-filter').bootstrapTable({
		url: baseurl+'/buscar/medicos',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true,
		showRefresh:true,
		refresh:{silent:true}
	});

	$('#history-filter').bootstrapTable({
		url: baseurl+'/buscar/history',
		height: 400,
		search: true,
		sidePagination: 'server',
		pagination: true,
		showRefresh:true,
		refresh:{silent:true}
	});

	$('#patient-filter').bootstrapTable({
		url: baseurl+'/buscar/paciente',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true,
		showRefresh:true,
		refresh:{silent:true}
	});

	$('#history-patient-filter').bootstrapTable({
		url: baseurl+'/buscar/historialpaciente',
		height: 300,		
		sidePagination: 'server',
		queryParams: function(params) {
			return {
				paciente: $('#paciente').val()
			};
		},
		pagination: true,
		showRefresh:true,
		refresh:{silent:true}
	});
});