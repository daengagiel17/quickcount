@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kelurahan {{$kelurahan->nama}}
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('tpsProvinsi')}}">Provinsi</a></li>
        <li><a href="{{route('tpsKabupaten', [$kelurahan->kecamatan->kabupaten->id_kabupaten])}}">Kabupaten {{$kelurahan->kecamatan->kabupaten->nama}}</a></li>
        <li><a href="{{route('tpsKecamatan', [$kelurahan->kecamatan->id_kecamatan])}}">Kecamatan {{$kelurahan->kecamatan->nama}}</a></li>
        <li class="active">Kelurahan {{$kelurahan->nama}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Perolehan Suara Per TPS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>TPS</th>
                        <th>Perolehan Suara Caleg</th>
                        <th>Status</th>
                        <th>Nama Relawan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($kelurahan->tps as $key => $tps)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="{{ route('tps', [$tps->id_tps]) }}">{{$tps->nama}}</a></td>
                        <td>{{$tps->calon()->find(1)->pivot->suara}}</td>
                        <td>{{$tps->status}}</td>
                        <td>
                            @if($tps->relawan == null)
                              Belum ada relawan
                            @else
                              {{$tps->relawan->nama}}
                            @endif
                        </td>
                        <td>
                            @if($tps->relawan == null)
                              <a class="btn btn-primary btn-sm" href="{{route('tps.editRelawan', [$tps->id_tps])}}"><i class="fa fa-plus"></i> Add Relawan</a>
                            @else
                              <a class="btn btn-success btn-sm" href="{{route('tps.editRelawan', [$tps->id_tps])}}"><i class="fa fa-pencil"></i> Ganti Relawan</a>
                            @endif
                        </td>
                      </tr>                      
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>TPS</th>
                        <th>Perolehan Suara Caleg</th>
                        <th>Status</th>
                        <th>Nama Relawan</th>
                        <th>Aksi</th>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Partai</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($partais as $partai)
                    <tr>
                        <td>{{$partai->nomor_urut}}</td>
                        <td>{{$partai->nama}}</td>
                        <td>{{$partai->tps()->where('id_kelurahan', $kelurahan->id_kelurahan)->get()->sum('pivot.suara')}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
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
              <table id="example3" class="table table-bordered table-hover">
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
                        <td>{{$calon->tps()->where('id_kelurahan', $kelurahan->id_kelurahan)->get()->sum('pivot.suara')}}</td>
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
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
        $('#example2').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
        $('#example3').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
    </script>

@endsection