@extends('reportingIndex')

@section('reporting') 
<div class="container">
    <div class="row p-1 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="width:50vw">
            <!-- top -->
            <canvas id="CrimeReportAreaChart"></canvas>
            <a id="chart1" download="CrimeReportAreaChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom left -->
            <canvas id="CrimeReportTypeChart" ></canvas>
            <a id="chart2" download="CrimeReportTypeChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom right -->
            <canvas id="CrimeReportActionTakenChart" ></canvas>
            <a id="chart3" download="CrimeReportActionTakenChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
        </div>
    </div>
</div>
<script>
//Crime Report Charts

//Download Monthly Crime Reports Chart Image
document.getElementById("chart1").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("CrimeReportAreaChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart1");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
}); 

//Download Crime Report types bar Chart Image
document.getElementById("chart2").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("CrimeReportTypeChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart2");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
}); 

//Download Crime report action taken Pie Chart Image
document.getElementById("chart3").addEventListener('click', function () {
	/*Get image of canvas element*/
	var url_base64jp = document.getElementById("CrimeReportActionTakenChart").toDataURL("image/png");
	/*get download button (tag: <a></a>) */
	var a = document.getElementById("chart3");
	/*insert chart image url to download button (tag: <a></a>) */
	a.href = url_base64jp;
});
</script>
@endsection