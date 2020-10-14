@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$calon->tps()->sum('suara')}}</h3>

              <p>Perolehan Suara Caleg</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$persen}}<sup style="font-size: 20px"> %</sup></h3>

              <p>Persentase Data Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$sudah}}<sup style="font-size: 20px"> TPS</sup></h3>

              <p>Data TPS Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$belum}}<sup style="font-size: 20px"> TPS</sup></h3>

              <p>Data TPS Belum Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-down"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Calon Legislatif yang dapat kursi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor Urut</th>
                  <th>Nama</th>
                  <th>Suara</th>
                </tr>
                </thead>
                <tbody>
                @foreach($calons as $key => $calon)
                <tr>
                  <td>{{$calon->nomor_urut}}</td>
                  <td>{{$calon->nama}}</td>
                  <td>{{$calon->tps()->sum('suara')}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nomor Urut</th>
                  <th>Nama</th>
                  <th>Suara</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Perolehan Suara dan Kursi Partai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor Urut</th>
                  <th>Nama</th>
                  <th>Suara</th>
                  <th>Kursi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partais as $key => $partai)
                <tr>
                  <td>{{$partai->nomor_urut}}</td>
                  <td>{{$partai->nama}}</td>
                  <td>{{$partai->tps()->sum('suara')}}</td>
                  <td>{{$suaras[$key]['kursi']}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nomor Urut</th>
                  <th>Nama</th>
                  <th>Suara</th>
                  <th>Kursi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- right col -->


        <!-- Left col -->
        <section class="col-lg-7">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Statistik perolehan suara calon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Statistik perolehan suara partai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <canvas id="partai" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('js-script')
    <!-- jQuery 3 -->
    <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('dist/js/demo.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{url('bower_components/chart.js/Chart.js')}}"></script>

    <script>
      $(function () {
        $('#example1').DataTable({
          'paging'      : false,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })

        $.ajax({
          type: 'GET',
          url: '/data',
          headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
            console.log("Sukses", data);
            //- PIE CHART -
            var pieChartCanvas = $('#partai').get(0).getContext('2d')
            var pieChart       = new Chart(pieChartCanvas)
            var PieData        = data.partai
            var pieOptions     = {
              percentageInnerCutout: 0, // This is 0 for Pie charts
              responsive           : true,
            }
            pieChart.Doughnut(PieData, pieOptions)

            //- PIE CHART -
            // var pieChartCanvas = $('#calon').get(0).getContext('2d')
            // var pieChart       = new Chart(pieChartCanvas)
            // var PieData        = data.calon
            // var pieOptions     = {
            //   percentageInnerCutout: 0, // This is 0 for Pie charts
            //   responsive           : true,
            // }
            // pieChart.Doughnut(PieData, pieOptions)  

            //-------------
            //- BAR CHART -
            //-------------
            // var areaChartData = 

            var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
            var barChart                         = new Chart(barChartCanvas)
            var barChartData                     = {
              labels  : data.calon.nama,
              datasets: [
                {
                  label               : 'Digital Goods',
                  fillColor           : 'rgba(60,141,188,0.9)',
                  strokeColor         : 'rgba(60,141,188,0.8)',
                  pointColor          : '#3b8bba',
                  pointStrokeColor    : 'rgba(60,141,188,1)',
                  pointHighlightFill  : '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data                : data.calon.suara
                }
              ]
            }              
            
            var barChartOptions                  = {
              //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
              scaleBeginAtZero        : true,
              //Boolean - Whether grid lines are shown across the chart
              scaleShowGridLines      : true,
              //String - Colour of the grid lines
              scaleGridLineColor      : 'rgba(0,0,0,.05)',
              //Number - Width of the grid lines
              scaleGridLineWidth      : 1,
              //Boolean - Whether to show horizontal lines (except X axis)
              scaleShowHorizontalLines: true,
              //Boolean - Whether to show vertical lines (except Y axis)
              scaleShowVerticalLines  : true,
              //Boolean - If there is a stroke on each bar
              barShowStroke           : true,
              //Number - Pixel width of the bar stroke
              barStrokeWidth          : 2,
              //Number - Spacing between each of the X value sets
              barValueSpacing         : 5,
              //Number - Spacing between data sets within X values
              barDatasetSpacing       : 1,
              //String - A legend template
              legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
              //Boolean - whether to make the chart responsive
              responsive              : true,
              maintainAspectRatio     : true
            }

            barChartOptions.datasetFill = false
            barChart.Bar(barChartData, barChartOptions)
          },
          error: function(data){
            alert("Koneksi anda tidak stabil. Mohon perbaiki koneksi anda dan lanjutkan transaksi");
            console.log(data);
          }
        });
      })   
    </script>
@endsection