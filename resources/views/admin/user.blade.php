@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
<h4>Daftar User Terverifikasi</h4>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap" id="dataTable" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Daftar</th>
                    <th>Waktu Email Dikonfirmasi</th>
                    <th>Waktu Akun Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->daftar}}</td>
                    <td>{{$item->email_verified_at}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary" onclick="location.href='/list/download'">
        Download Data
    </button>
</div>
@endsection