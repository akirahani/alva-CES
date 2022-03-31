<script src="public/chart/Chart.min.js"></script>
<script src="public/chart/utils.js"></script>
<div class="row">
	<canvas id="barChart"></canvas>
	<script>
		$(function() {
		    var data = {
		        labels: ["Tháng 01", "Tháng 02", "Tháng 03", "Tháng 04", "Tháng 05", "Tháng 06", "Tháng 07", "Tháng 08", "Tháng 09", "Tháng 10", "Tháng 11", "Tháng 12"],
		        datasets: [{
		            label: 'Học viên',
		            data: [10, 15, 20, 25, 30, 35, 30, 45, 50, 55, 60, 70],
		            backgroundColor: 'rgba(255, 159, 64, 1)',
		            borderWidth: 0,
		            fill: false
		        }]
		    };
		    var options = {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        },
		        legend: {
		            display: false
		        },
		        elements: {
		            point: {
		                radius: 0
		            }
		        }

		    };
		    // Get context with jQuery - using jQuery's .get() method.
		    if ($("#barChart").length) {
		        var barChartCanvas = $("#barChart").get(0).getContext("2d");
		        // This will get the first returned node in the jQuery collection.
		        var barChart = new Chart(barChartCanvas, {
		            type: 'bar',
		            data: data,
		            options: options
		        });
		    }
		});
	</script>
</div>