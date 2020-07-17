

<center><div style="width:75%;"><canvas id="myChart" style="display: block; width: 1175px; height: 587px;" width="1175" height="587" ></canvas></div></center>

{literal}
<script type="text/javascript">
window.chartColors = {
	red: 'rgb(250, 100, 132)',
	orange: 'rgb(250, 159, 64)',
	yellow: 'rgb(255, 200, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)',
  black: 'rgb(0,0,0)'
};
var ctx = document.getElementById('myChart').getContext('2d');
var dragOptions = {
			animationDuration: 1000
		};



var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [{/literal}{$data.labels}{literal}],
        datasets: [{
            label: '{/literal}{$data.nlabel|escape}{literal}',
            data: [{/literal}{$data.series}{literal}],
            backgroundColor: window.chartColors.red,
					  borderColor: window.chartColors.black,
            borderWidth: 1

        }]
    },
    options: {
		spanGaps: false,
        scales: {

			xAxes: [{
					}],





            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },


		plugins: {
						zoom: {
							pan: {
								enabled: true,
								mode: 'x' // is panning about the y axis neccessary for bar charts?
							},
							zoom: {
								enabled: true,
								mode: 'x',
								sensitivity: 3
							}
						}
					}



    }
});

</script>
{/literal}