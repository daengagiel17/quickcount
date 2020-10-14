@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Relawan {{$tps->nama}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('tpsProvinsi')}}">Provinsi</a></li>
        <li><a href="{{route('tpsKabupaten', [$tps->kelurahan->kecamatan->kabupaten->id_kabupaten])}}">Kabupaten {{$tps->kelurahan->kecamatan->kabupaten->nama}}</a></li>
        <li><a href="{{route('tpsKecamatan', [$tps->kelurahan->kecamatan->id_kecamatan])}}">Kecamatan {{$tps->kelurahan->kecamatan->nama}}</a></li>
        <li><a href="{{route('tpsKelurahan', [$tps->kelurahan->id_kelurahan])}}">Kelurahan {{$tps->kelurahan->nama}}</a></li>
        <li class="active">Update Relawan {{$tps->nama}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Daftar Relawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relawans as $key => $relawan)
                    <tr id="relawan-{{$relawan->id_relawan}}">
                        <td>{{$key+1}}</td>
                        <td><img src="{{url('image/relawan/'.$relawan->photo)}}" class="img-circle" style="widht:50px; height:50px;"></td>
                        <td>{{$relawan->nama}}</td>
                        <td>{{$relawan->no_hp}}</td>
                        <td>
                          <form enctype="multipart/form-data" action="{{ route('tps.updateRelawan',[$tps->id_tps]) }}" method="post">
                            @csrf @method('PUT')
                            <input type="hidden" name="id_relawan" value="{{$relawan->id_relawan}}">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-pencil"></i> Pilih</button>
                          </form>
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
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
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endsection