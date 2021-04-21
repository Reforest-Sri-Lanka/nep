@extends('reportingIndex')

@section('reporting') 
<div class="container">
    <div class="row p-1 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="width:50vw">
            <!-- top -->
            <canvas id="RestorationAreaChart"></canvas>
            <a id="chart1" download="RestorationAreaChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom left -->
            <canvas id="RestorationTypeChart" ></canvas>
            <a id="chart2" download="RestorationTypeChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom left -->
            <canvas id="EcosystemChart"></canvas>
            <a id="chart3" download="EcosystemChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
    </div>
</div>
<script>
//Tree Removal Charts

//Download Monthly Environmental Restoration Chart Image
document.getElementById("chart1").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("RestorationTypeChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart1");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
}); 

//Download Restorations Type Bar Chart Image
document.getElementById("chart2").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("RestorationTypeChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart2");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
}); 

//Download Restorations per ecosystem Pie Chart Image
document.getElementById("chart3").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("EcosystemChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart3");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
});
</script>
@endsection