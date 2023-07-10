@extends('page')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bobot</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ $widget1['kriteria'] }}</th>
                    <th>{{ $widget2['kriteria'] }}</th>
                    <th>{{ $widget3['kriteria'] }}</th>
                    <th>{{ $widget4['kriteria'] }}</th>
                    <th>{{ $widget5['kriteria'] }}</th>

                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Normalisasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $alternatif)
                    <tr>
                        <td>{{$alternatif->nama }}</td>
                        <td>{{$alternatif->efek_Samping / $C1max['alternatif']}}</td>
                        <td>{{$alternatif->efektivitas / $C2max['alternatif']}}</td>
                        <td>{{$C3min['alternatif'] / $alternatif->harga}}</td>
                        <td>{{$alternatif->dosis / $C4max['alternatif']}}</td>
                        <td>{{$alternatif->ketersediaan / $C5 max['alternatif']}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hasil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $alternatif)
                    <tr>
                        <td>{{$alternatif->nama}}</td>
                        {{-- Hasil --}}
                        <td>
                            {{(($alternatif->efek_Samping / $C1max['alternatif'])*$widget1['kriteria'])+
                            (($alternatif->efektivitas / $C2max['alternatif'])*$widget2['kriteria'])+
                            (($C3min['alternatif'] / $alternatif->harga)*$widget3['kriteria'])+
                            (($alternatif->dosis / $C4max['alternatif'])*$widget4['kriteria'])+
                            (($alternatif->ketersediaan / $C5max['alternatif'])*$widget5['kriteria'])}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  
  @endsection
