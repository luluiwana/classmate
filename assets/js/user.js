$(document).ready(function () {
	$("#daftar_siswa").DataTable();
});
$(document).ready(function () {
	$("#teman").DataTable();
});

//chart js
var data = {
	labels: ["Tantangan selesai", "Tantangan belum selesai"],
	datasets: [
		{
			data: [12, 8],
			backgroundColor: ["#7200ff", "#191b2a"],
			hoverBackgroundColor: ["#7200ff", "#191b2a"],
		},
	],
};

var promisedDeliveryChart = new Chart(document.getElementById('myChart'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
	   cutoutPercentage: 70,
    legend: {
      display: false
    }
  }
});

Chart.pluginService.register({
  beforeDraw: function(chart) {
    var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

    ctx.restore();
    var fontSize = (height / 114).toFixed(2);
    ctx.font = fontSize + "em sans-serif";
    ctx.textBaseline = "middle";
	ctx.fillStyle = "#fff";

    var text = "12/20",
        textX = Math.round((width - ctx.measureText(text).width) / 2),
        textY = height / 2;

    ctx.fillText(text, textX, textY);
    ctx.save();
  }
});
