@extends('layouts.dashboardtemplate')

{{-- @section('user') {{$user->name}} @endsection --}}

@section('sidebar')
<li class="nav-item active">
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
<li class="nav-item">
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
    <h2><b>Welcome, {{$user->name}} ! </b></h2>
    <div>
        Ini adalah halaman peserta
        @if($user->daftar == 'olim')
        Olimpiade
        @elseif($user->daftar == 'devcom')
        Development Competition
        @else
        Esport
        @endif
    </div>
    <h2 class="mt-5"><b>Pengumuman</b></h2>
    @if (!$data->is_submitted)
    <div class="alert alert-warning">
        Anda belum menyelesaikan pendaftaran, segera selesaikan pendaftaran anda !
        <a href="#">Selesaikan Pendaftaran</a>
    </div>
    @elseif(!isset($data->path_buktibayar))
    <div class="alert alert-warning">
        Anda belum melakukan pembayaran, segera lakukan pembayaran !
        <a href="/bayar">Melakukan Pembayaran</a>
    </div>
    {{-- @elseif(!$data->verif_bayar)
    <div class="alert alert-warning">
        Mohon Menunggu, Kami Sedang Memverifikasi Pembayaran Anda.
    </div> --}}
    @elseif($data->verif_bayar && !isset($data->path_proposal) && $user->daftar == 'devcom')
    <div class="alert alert-warning">
        Anda belum melakukan mengunggah Proposal, Segera mengunggah Proposal !
        <a href="/submission">Unggah Proposal</a>        
    </div>    
    @elseif(!$data->status)
    <div class="alert alert-danger">
        Data anda belum di verifikasi oleh panitia
    </div>
    @elseif($data->status)
    <div class="alert alert-success">
        Data anda sudah di verifikasi oleh panitia
    </div>    
    @endif
    @if($user->daftar === "devcom")
    <div class="alert alert-danger">
        Pendaftaran dan Submit Proposal Development Competition MAGE6 Telah Ditutup
    </div>
    <div class="alert alert-success">
        Kepada seluruh peserta silahkan cek email pendaftaran untuk mengakses hasil penjurian. Selamat untuk peserta yang lolos dan dan untuk yang tidak lolos jangan patah semangat karena kalian masih memiliki kesempatan di tahun selanjutnya.
    </div>    
    @elseif($user->daftar === "olim")
    <div class="alert alert-info">
        Tryout MAGE6 akan dilaksanakan pada Sabtu, 31 Oktober 2020 pada pukul:
        <ul>
            <li>09.00 WIB - 11.00 WIB</li>
            <li>15.00 WIB - 17.00 WIB</li>
            <li>19.00 WIB - 21.00 WIB</li>
        </ul>
        Informasi lebih lanjut disampaikan melalui grup.
    </div>
    @endif
    {{-- @if($user->daftar === "esport" && $data->status)
    <div class="alert alert-info text-justify">
        Kepada perwakilan Tim Esport DOTA2 MAGE6 diharapkan untuk segera bergabung ke discord berikut <a href="https://discord.gg/dKtkpkK ">https://discord.gg/dKtkpkK</a> dan jangan lupa untuk mengganti nama sesuai dengan nama tim yang telah anda daftarkan sebelumnya. (Technical Meeting akan dilaksanakan pada Kamis, 15 oktober 2020 pukul 18.30. Berlokasi di channel discord)
    </div>
    @endif --}}
    @foreach ($announce as $item)
    <div class="alert alert-info">
        {!!$item->data!!}
    </div>
    @endforeach
</div>
</div>
@endsection