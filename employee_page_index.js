// pie chart script
// start
    var ctx = document.getElementById('myChart').getContext('2d');
		var myDoughnutChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Absent', 'Present', 'Leave'],
			datasets: [{
		label: '# of Votes',
		data: [10, 29, 3],
		backgroundColor: [
		'red',
		'lightgreen',
		'lightblue'
		],
		borderColor: [
		'rgba(255, 99, 132, 1)',
		'lightgreen',
		'rgba(255, 206, 86, 1)'
		],
		borderWidth: 0.5,
		hoverBorderWidth: 2.5
		}]
		},
		options: {}
		});
// end