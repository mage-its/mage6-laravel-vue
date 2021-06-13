@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
<div class="row">
    <div class="col-lg-12">
<h4>Daftar Pengumuman</h4>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap" id="dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Ditampilkan Dari</th>
                    <th>Ditampilkan Sampai</th>
                    <th>Kategori</th>
                    <th>Isi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->start}}</td>
                    <td>{{$item->end}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->data}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary" onclick="location.href='/announce/download'">
        Download Data
    </button>
</div>
</div>
</div>
@endsection