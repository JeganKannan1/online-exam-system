$(document).ready(function() {

	// Bar Chart

	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '2006', a: 100},
			{ y: '2007', a: 75},
			{ y: '2008', a: 50},
			{ y: '2009', a: 75},
			{ y: '2010', a: 50},
			{ y: '2011', a: 75},
			{ y: '2012', a: 100}
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Avg score'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		barColors: ['#ff9b44','#fc6075'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	
		
});
