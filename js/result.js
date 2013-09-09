// JavaScript Document
$(document).ready(function() {
			<?php  
			?>
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: '<?php show_question($count); ?>'
					},
					xAxis: {
						categories: [
							'Answers'
						]
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Number of People'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [
						<?php show_options($count);?>
					]
				});
		});