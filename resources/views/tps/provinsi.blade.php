@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Provinsi
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Provinsi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Perolehan Suara Per Kabupaten</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten</th>
                        <th>Jumlah TPS</th>
                        <th>Perolehan Suara Caleg</th>
                        <th>Persentase Data Masuk</th>
                        <th>TPS Masuk</th>
                        <th>TPS Belum Masuk</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($provinsi->kabupaten as $key => $kabupaten)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="{{ route('tpsKabupaten', [$kabupaten->id_kabupaten]) }}">{{$kabupaten->nama}}</a></td>
                        <td>{{$kabupaten->kecamatan()->get()->pluck('tps')->flatten()->count()}}</td>
                        <td>{{$calon->tps()->whereIn('id_kelurahan', $kabupaten->kelurahan()->get()->pluck('id_kelurahan'))->get()->sum('pivot.suara')}}</td>
                        <td>{{round($kabupaten->kecamatan()->get()->pluck('tps')->flatten()->where('status', 'sudah')->count() / $kabupaten->kecamatan()->get()->pluck('tps')->flatten()->count() * 100, 2)}} %</td>
                        <td>{{$kabupaten->kecamatan()->get()->pluck('tps')->flatten()->where('status', 'sudah')->count()}} TPS</td>
                        <td>{{$kabupaten->kecamatan()->get()->pluck('tps')->flatten()->where('status', 'belum')->count()}} TPS</td>
                    </tr>                      
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kabupaten</th>
                        <th>Jumlah TPS</th>
                        <th>Perolehan Suara Caleg</th>
                        <th>Persentase Data Masuk</th>
                        <th>TPS Masuk</th>
                        <th>TPS Belum Masuk</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Suara Partai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No Urut</th>
                        <th>Nama Partai</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($partais as $partai)
                    <tr>
                        <td>{{$partai->nomor_urut}}</td>
                        <td>{{$partai->nama}}</td>
                        <td>{{$partai->tps()->sum('suara')}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No Urut</th>
                        <th>Nama Partai</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

        <!-- right column -->
        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Suara Calon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($calons as $calon)
                    <tr>
                        <td>{{$calon->nomor_urut}}</td>
                        <td>{{$calon->nama}}</td>
                        <td>{{$calon->tps()->sum('suara')}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->    
      </div>
      <!-- /.row -->

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
    <!-- page script -->
    <script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
    </script>

@endsection