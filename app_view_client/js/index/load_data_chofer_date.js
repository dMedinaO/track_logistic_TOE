$(function () {
	var processed_json = new Array();
	var client= getQuerystring('sag');
	$.getJSON('php/index/show_choferes_day.php?client='+client, function(data) {
		// Populate series
		processed_json.push(["TRABAJANDO", parseInt(data.cantidad_dia_OK)]);
		processed_json.push(["PENDIENTE", parseInt(data.cantidad_dia_NOT)]);

		
		// draw chart
        $('#choferes_work').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},

			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: false
					},
					showInLegend: true
				}
			},
			credits: {
			  enabled: false
			},

			title: {
				text: ""
			},

            series: [{
				name: 'Categoría',
                data: processed_json
			}]
		});
	});
})

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};