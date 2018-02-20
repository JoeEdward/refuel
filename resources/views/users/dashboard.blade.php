@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Effort', 'Amount given'],
      ['My all',     100],
      ]);

    var options = {
      pieHole: 0.5,
      pieSliceTextStyle: {
        color: 'black',
    },
    legend: 'none'
};

var chart1 = new google.visualization.PieChart(document.getElementById('donut_single'));
chart1.draw(data, options);

var chart2 = new google.visualization.PieChart(document.getElementById('donut1'));
chart2.draw(data, options);

var chart3 = new google.visualization.PieChart(document.getElementById('donut2'));
chart3.draw(data, options);
}
</script>

<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBasic);

  function drawBasic() {

    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Sales');

    data.addRows([
      [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
      [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
      [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
      [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
      [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
      [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
      [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
      [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
      [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
      [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
      [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
      [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

    var options = {
      vAxis: {
        title: 'Sales',
        gridlines: { count: 0 }
    },
    hAxis: {
     title: 'Time',
     gridlines: { count: 0 }
 },
 legend: { position: 'bottom' }
};

var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

chart.draw(data, options);
}
</script>

@endsection

@section('content')


@if (session('status'))
<br>
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="col-md-3">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">

			<h4 class="center">Quick Links</h4>

		</div>

		<div class="panel-body">

			@if(auth()->user()->type == "staff")
          <ul>

            <li><a href="">Dashboard</a></li>
            <li><a href="">User Management</a></li>
            <li><a href="/items">Menu Management</a></li>
            <li><a href="">Account settings</a></li>
            <li><a href="">Your orders</a></li>


        </ul>
        @else

        <ul>

            <li><a href="">Dashboard</a></li>
            <li><a href="/dashboard/account">Account settings</a></li>
            <li><a href="">Your orders</a></li>
            <li><a href="/menu">Menu</a></li>


        </ul>
        @endif

    </div>


</div>

</div>

<br>
<div class="col-md-9">

	@if(auth()->user()->type == "staff")
  <!-- Staff Panel -->
  <div class="panel panel-info">

      <div class="panel-heading">
         <h4>Order Statisics</h4>
     </div>

     <div class="panel-body">


      <div class="row">
        <div id="donut_single" class="col-md-4" style="width: 33.3%; height: 200px;"></div>
        <div id="donut1" class="col-md-4" style="width: 33.3%; height: 200px;"></div>
        <div id="donut2" class="col-md-4" style="width: 33.3%; height: 200px;"></div>

    </div>
    <div class="row">
        <div id="chart_div" class="col-md-12" style="width: 100%; height: 200px"></div>

    </div>
</div>
</div>  {{-- panel End --}}
@else
<div class="panel panel-info">


  <div class="panel-heading">
    <h4>Order State</h4>
</div>    

<div class="panel-body">
   <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        <span class="sr-only">20% Complete</span>
    </div>
</div>
    <p>Orders In The Oven</p>
</div>
</div>
@endif
</div>

@endsection