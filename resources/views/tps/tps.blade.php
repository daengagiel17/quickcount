@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data {{$tps->nama}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('tpsProvinsi')}}">Provinsi</a></li>
        <li><a href="{{route('tpsKabupaten', [$tps->kelurahan->kecamatan->kabupaten->id_kabupaten])}}">Kabupaten {{$tps->kelurahan->kecamatan->kabupaten->nama}}</a></li>
        <li><a href="{{route('tpsKecamatan', [$tps->kelurahan->kecamatan->id_kecamatan])}}">Kecamatan {{$tps->kelurahan->kecamatan->nama}}</a></li>
        <li><a href="{{route('tpsKelurahan', [$tps->kelurahan->id_kelurahan])}}">Kelurahan {{$tps->kelurahan->nama}}</a></li>
        <li class="active">{{$tps->nama}}</li>
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
                <h3>{{$tps->calon()->find(1)->pivot->suara}}</h3>

                <p>Suara</p>
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
                <h3>Sudah</h3>

                <p>Status Data</p>
              </div>
              <div class="icon">
                <i class="fa fa-hourglass-end"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="#gambarc1">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>C1-KWK</h3>

                <p>Lihat Gambar</p>
              </div>
              <div class="icon">
                <i class="fa fa-thumbs-up"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          @if($tps->relawan == null)
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>Relawan</sup></h3>

                <p>Belum ada relawan</p>
              </div>
              <div class="icon">
                <i class="fa fa-thumbs-down"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->    
          @else
          <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-red">
                <div class="widget-user-image">
                  <img class="img-circle" src="{{url('image/relawan/'.$tps->relawan->photo)}}" alt="User Avatar">
                </div>
                  <h3 class="widget-user-username">{{$tps->relawan->nama}}</h3>
                  <h5 class="widget-user-desc">{{$tps->relawan->no_hp}}</h5>
              </div>
            </div>
            <!-- /.widget-user -->          
          </div>
          @endif          
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
                        <th>No</th>
                        <th>Nama Partai</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($tps->partai as $partai)
                    <tr>
                        <td>{{$partai->nomor_urut}}</td>
                        <td>{{$partai->nama}}</td>
                        <td>{{$partai->pivot->suara}}</td>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($tps->calon as $calon)
                    <tr>
                        <td>{{$calon->nomor_urut}}</td>
                        <td>{{$calon->nama}}</td>
                        <td>{{$calon->pivot->suara}}</td>
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

      <div class="row" id="gambarc1">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Gambar C1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($tps->photo_c1)
              <img src="{{url('image/photo_c1/'.$tps->photo_c1)}}">
              @else
              <h5>Belum ada gambar yang diupload</h5>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
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
    })
    </script>

@endsection