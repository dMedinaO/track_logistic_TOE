$(function () {
	var processed_json = new Array();
	var client=getQuerystring('sag');
	$.getJSON('php/index/show_reparto_by_status.php?client='+client, function(data) {
		// Populate series
		for (i = 0; i < data.length; i++){
			var cantidad = parseInt(data[i].cantidad);
			processed_json.push([data[i].status_reparto, cantidad]);
		}

		console.log(processed_json);
		
		// draw chart
        $('#repartos_type').highcharts({
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

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}

