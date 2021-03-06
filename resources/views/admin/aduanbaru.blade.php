<!DOCTYPE html>
<html>
@include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!--navbar -->
    {{-- @include('layout_admin.navbar') --}}

  {{-- <!-- Main Sidebar Container -->
  @include('layout_admin.sidebar') --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pengurusan Aduan </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Aduan Baru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @include('flash-message')
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                  <h3 class="card-title">Senarai Aduan Baru</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="tableAduan" class="table table-bordered table-hover">
                    <thead class="thead-light ">
                    <tr>
                      {{-- <th>Bil</th> --}}
                      <th>No Aduan</th>
                      <th>Masalah</th>
                      {{-- <th>Kategori dan Keterangan</th> --}}
                      <th>Jabatan</th>
                      <th>Tarikh Aduan</th>
                      <th>Bilangan Hari</th>
                      <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $skipped = $aduan->firstItem() - 1; ?>
                @foreach($aduan as $adu)
                    <tr>
                      {{-- <td>{{ $loop->iteration + $skipped}}</td> --}}
                      <td>{{ $adu->no_aduan }}</td>
                      <td>{{wordwrap($adu->masalah,20,"\n",TRUE)}}</td>
                      {{-- <td><p>{{ $adu->kategori }}</p>
                          <p>{{ $adu->jenis_kategori }}</p>
                      </td> --}}
                      <td>{{ $adu->jabatan }}</td>
                      <td>{{ date('d-m-Y', strtotime($adu->tarikh_aduan))}}</td>
                    <td>{{$diff = Carbon\Carbon::parse($adu->tarikh_aduan)->diffInDays()}}</td>
                      <td>
                        @if(Auth::user()->idlevel == 8)
                        <a type="button" title="Maklumat Aduan" class="btn btn-block btn-info btn-sm"
                           href="{{ URL::to('editaduan/'.$adu->no_aduan)}}">
                            <i class="fas fa-info"></i>
                        </a>
                        @else
                        <a type="button" title="Agihan Aduan" class="btn btn-block btn-success btn-sm"
                        href="{{ URL::to('editaduan/'.$adu->no_aduan)}}">
                         <i class="fas fa-edit"></i>
                        </a>
                        @endif


                        {{-- <a type="button" title="Maklumat Aduan" class="btn btn-block btn-info btn-sm"
                           href="{{ url('maklumatAduan/'.$adu->id)}}">
                           <i class="fas fa-info"></i>
                        </a> --}}
                        {{-- <a type="button" title="Kronologi Aduan"  class="btn btn-block btn-primary btn-sm"
                            href="{{ URL::to('modal/'.$adu->no_aduan)}}" >
                                <i class="far fa-file-alt"></i>
                        </a> --}}

                        <a type="button" title="Kronologi Aduan"  class="btn btn-block btn-primary btn-sm" data-toggle="modal"
                            href="#" data-target="#test1{{$adu->no_aduan}}" >
                                <i class="far fa-file-alt"></i>
                        </a>
                      </td>



                    <div class="modal fade" id="test1{{$adu->no_aduan}}" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered ">
                              <div class="modal-content ">
                                <div class="modal-header bg-primary">
                                <h4 class="modal-title">Kronologi Aduan: {{ $adu->no_aduan}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">


                                    <dl class="row ">
                                        <dd class="col-sm-3 text-center border bg-light">Maklumat</dd>
                                        <dd class="col-sm-3 text-center border bg-light">Individu</dd>
                                        <dd class="col-sm-3 text-center border bg-light">Peranan</dd>
                                        <dd class="col-sm-3 text-center border bg-light">Tarikh</dd>
                                    </dl>
                                    <?php
                                    /* $conn = mysqli_connect('localhost','root','','app_helpdesk'); */

                                    $query = mysqli_query($conn, "SELECT
                                    kronologi.tarikh_masa_skrg, pengguna.nama,`level`.`level`,`status`.nama_status
                                    FROM kronologi
                                    LEFT JOIN pengguna ON pengguna.nama = kronologi.tindakan_pegawai
                                    INNER JOIN `level` ON `level`.idlevel = pengguna.idlevel
                                    INNER JOIN `status` ON `status`.idstatus = kronologi.idstatus
                                    WHERE no_aduan = '".$adu->no_aduan."'
                                    ORDER BY
                                    kronologi.tarikh_masa_skrg DESC");
                                    while ($query_row = mysqli_fetch_array($query)){
                                    ?>
                                    <dl class="row ">
                                    <dd class="col-sm-3 text-center "><?php echo $query_row['nama_status']; ?></dd>
                                        <dd class="col-sm-3 text-center "><?php echo $query_row['nama']; ?></dd>
                                        <dd class="col-sm-3 text-center "><?php echo $query_row['level']; ?></dd>
                                        <dd class="col-sm-3 text-center "><?php echo $query_row['tarikh_masa_skrg']; ?></dd>
                                    </dl>
                                <?php } ?>

                                </div>
                                <div class="modal-footer justify-content-center">
                                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>

                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          @endforeach


                    </tr>
                    </tfoot>
                  </table>
                  <br>
                  {!! $aduan->links() !!}
                </div>
                <!-- /.card-body -->
                </div>
              </div>
              <!-- /.card -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


{{-- <script>
    $(document).ready(function(){
      $("#kro").click(function(){
        $("#test1").modal();
      });
    });
  </script> --}}

</body>
</html>
