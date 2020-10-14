@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Relawan
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Relawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">

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
                          <a class="btn btn-primary btn-sm" href="{{route('relawan.edit', [$relawan->id_relawan])}}"><i class="fa fa-pencil"></i> Edit</a>
                          <label class="btn btn-danger btn-sm delete" data-id="{{$relawan->id_relawan}}"><i class="fa fa-fw fa-trash"></i> Hapus</label>
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
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-3">

          <!-- general form elements -->
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Input Relawan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{ route('relawan.store') }}" method="post">
                    {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_relawan">Nama Relawan</label>
                      <input type="text" class="form-control" name="nama_relawan" placeholder="Masukkan nama relawan">
                      @if ($errors->has('nama_relawan'))
                        <span class="text-danger">{{ $errors->first('nama_relawan') }}</span>
                      @endif 
                    </div>
                    <div class="form-group">
                      <label for="nomor_hp">No HP Relawan</label>
                      <input type="text" class="form-control" name="nomor_hp" placeholder="Masukkan nomor handphone">
                      @if ($errors->has('nomor_hp'))
                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                      @endif 
                    </div>
                    <div class="form-group">
                        <label for="foto_relawan">Foto Relawan</label>
                        <input type="file" name="foto_relawan">
                        <p class="help-block">Upload foto relawan</p>
                        @if ($errors->has('foto_relawan'))
                        <span class="text-danger">{{ $errors->first('foto_relawan') }}</span>
                      @endif 
                    </div>

                  </div>
                  <!-- /.box-body -->    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })

    $(document).on('click', '.delete', function() {
      var id = $(this).data("id");
      console.log(id);
      var status = confirm("Are sure to delete it?");
      if(status){
        $.ajax({
          type: 'DELETE',
          url: '/relawan/'+id,
          headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
            $('#relawan-'+data.id_relawan).remove();
            console.log("Sukses", data);
          },
          error: function(data){
            console.log(data);
          }
        });
      }
    });  
    </script>

@endsection