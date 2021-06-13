@extends('layouts.dashboardtemplate')

{{-- @section('user') {{$user->name}} @endsection --}}

@section('sidebar')
<li class="nav-item">
    <a class="nav-link" href="/home">
        <i class="fas fa-edit"></i>
        <span>Beranda</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/data">
        <i class="fas fa-edit"></i>
        <span>Data Peserta</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/bayar">
        <i class="fas fa-edit"></i>
        <span>Pembayaran</span>
    </a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="/file">
        <i class="fas fa-edit"></i>
        <span>File</span>
    </a>
</li>
@if ($user->daftar == 'olim')
{{-- <li class="nav-item">
    <a class="nav-link" href="/twibbon">
        <i class="fas fa-edit"></i>
        <span>Create Twibbon</span>
    </a>
</li> --}}
<li class="nav-item">
    <a class="nav-link" href="/testonline">
        <i class="fas fa-edit"></i>
        <span>Tes Online</span>
    </a>
</li>
@elseif ($user->daftar == 'devcom')
<li class="nav-item">
    <a class="nav-link" href="/submission">
        <i class="fas fa-edit"></i>
        <span>Submisi</span>
    </a>
</li>
@endif
@endsection

@section('isidashboard')
<div class="row justify-content-center">
<div class="col-lg-6">
@if (!$data->status_bayar && $user->daftar == 'olim')
<div class="alert alert-danger">
    Anda belum melakukan pembayaran, file tertentu baru akan dibuka apabila anda sudah menyelesaikan pembayaran
</div>
@endif

@if ($user->daftar == 'olim')
<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Guidebook Olimpiade</b></h3>
        <button class="btn btn-primary" onclick="location.href='/guidebook-olim'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Soal MAGE 5</b></h3>
        <button class="btn btn-primary" @if (!$data->status_bayar)
            disabled
            @endif
            onclick="location.href='/soalmage5'">Download</button>
    </div>
</div>

@elseif($user->daftar == 'esport')
<div class="card">
    <div class="card-body">
        <h3 class="card-title"><b>Guidebook Esport</b></h3>
        <button class="btn btn-primary" onclick="location.href='/guidebook-esport'">Download</button>
    </div>
</div>
@else

{{-- <div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Format Deskripsi Progress Game</b></h3>
        <button class="btn btn-primary" onclick="location.href='/progressGame'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Format Deskripsi Progress App dan IOT</b></h3>
        <button class="btn btn-primary" onclick="location.href='/progressApps'">Download</button>
    </div>
</div> --}}

{{-- <div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Pengumuman lolos tahap 1 MAGE5</b></h3>
        <button class="btn btn-primary" onclick="location.href='/lolosTahap1'">Download</button>
    </div>
</div> --}}

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Guidebook Devcom</b></h3>
        <button class="btn btn-primary" onclick="location.href='/guidebook-devcomp'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Logo Mage 6</b></h3>
        <button class="btn btn-primary" onclick="location.href='/logomage6'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Contoh Template Proposal App</b></h3>
        <button class="btn btn-primary" onclick="location.href='/proposal-app'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Contoh Template Proposal Game</b></h3>
        <button class="btn btn-primary" onclick="location.href='/proposal-game'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Contoh Template Proposal Iot</b></h3>
        <button class="btn btn-primary" onclick="location.href='/proposal-iot'">Download</button>
    </div>
</div>

{{-- <div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Contoh Proposal Game Development</b></h3>
        <button class="btn btn-primary" onclick="location.href='/proposalGame'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Contoh Proposal Apps Development</b></h3>
        <button class="btn btn-primary" onclick="location.href='/proposalApps'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Gambaran Umum Game Development</b></h3>
        <button class="btn btn-primary" onclick="location.href='/guGame'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Gambaran Umum Apps dan IOT Development</b></h3>
        <button class="btn btn-primary" onclick="location.href='/guAppsnIot'">Download</button>
    </div>
</div>


<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Template MAGE 5</b></h3>
        <button class="btn btn-primary" onclick="location.href='/template'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Logo MAGE 5</b></h3>
        <button class="btn btn-primary" onclick="location.href='/logoMage'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Surat Keterangan Orisinalitas</b></h3>
        <button class="btn btn-primary" onclick="location.href='/suratOrisinal'">Download</button>
    </div>
</div>

<div class="card my-2">
    <div class="card-body">
        <h3 class="card-title"><b>Surat Keterangan Kesanggupan Mengikuti Babak Final</b></h3>
        <button class="btn btn-primary" onclick="location.href='/suratKesanggupan'">Download</button>
    </div>
</div> --}}
@endif

</div>
</div>
@endsection