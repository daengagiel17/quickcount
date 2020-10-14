@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting Admin
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Partai dan Caleg Default</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="nama_caleg" class="col-sm-2 control-label">Caleg</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_caleg" value="{{$calons->find(Auth::user()->id_caleg)->nama}}" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_partai" class="col-sm-2 control-label">Partai</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_partai" value="{{$partais->find(Auth::user()->id_partai)->nama}}" disabled>
                  </div>
                </div>
              </form>
              </div>
              <!-- /.box-body -->
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Partai dan Caleg Default</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('setting')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="id_caleg" class="col-sm-2 control-label">Caleg</label>

                  <div class="col-sm-10">
                    <select name="id_caleg" id="id_caleg" class="form-control">
                      @foreach ($calons as $calon)
                        <option value="{{$calon->id_calon}}">{{$calon->nama}}</option>                          
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_partai" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <select name="id_partai" id="id_partai" class="form-control">
                      @foreach ($partais as $partai)
                        <option value="{{$partai->id_partai}}">{{$partai->nama}}</option>                          
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
          <!-- /.box -->
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
@endsection