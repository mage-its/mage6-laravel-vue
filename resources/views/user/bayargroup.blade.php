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
<li class="nav-item active">
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
<div class="row d-flex justify-content-center">
<div class="col-lg-6">
@if (!$data->is_submitted)
<div class="alert alert-danger">
    Anda belum menyelesaikan pendaftaran, silahkan menyelesaikan pendaftaran anda terlebih dahulu !
    <a href="#">Selesaikan Pendaftaran</a>
</div>
@elseif(isset($data->path_buktibayar))
<div class="alert alert-success">
    Anda sudah melakukan pembayaran.
</div>
@endif

@if(isset($checkpromo))
    <div class="alert alert-success">
        {{ $checkpromo }}
    </div>
@elseif(isset($checkpromosalah))
    <div class="alert alert-danger">
        {{ $checkpromosalah }}
    </div>
@endif
<h2 class="mx-auto text-center"><b>PENGGUNAAN VOUCHER GROUP</b></h2>
<div class="mx-auto text-center">Halo {{$data->nama_tim}}, kamu terdaftar dalam MAGE 6 dengan nomer pendaftaran</div>
<h3 class="mx-auto text-center"><b>{{$data->no_peserta}}</b></h3>
<div class="mx-5 text-center">Halaman ini digunakan untuk mensubmit voucher group</div>
<form method="POST" action="/checktim/bayar/group">
    @csrf
    <input type="hidden" value="{{$data->id}}" name="bayar_id">
    <input type="hidden" value="{{$user->daftar}}" name="user_daftar">
    <div class="form-group mt-3">
        <label>Check Terlebih Dahulu Tim yang Akan Dibayar</label>
        <input oninput="this.value = this.value.toUpperCase()" required class="form-control" name="nama_timlain"
            placeholder="Nomor Peserta Tim yang Akan Dibayar"
            @if(isset($datatimlain))
            value="{{ $datatimlain->no_peserta }}"
            @endif
            @if ($data->status_bayar)
            disabled
            @endif
            >
    </div>
    @if (isset($datatimlain))
    <small class="text-success">*Tim berhasil digunakan sebagai patner voucher group</small>
    @endif    
    <br/>
    <input type="submit"
    @if ($data->status_bayar)
    disabled
    @endif    
    class="btn btn-primary my-3"
    value="Submit" >
</form>

</div>
</div>

@if(isset($datatimlain))
<div class="row d-flex justify-content-center mt-3">
    <div class="col-lg-6">
        <div class="mx-auto my-3 text-center"><b>Masukkan Kode Promo Group Disini Apabila Tim yang Anda Check Sudah Benar :</b></div>
        <form method="POST" action="/checkpromo/group">
            @csrf
            <div class="form-group">
                <label>Kode Promo</label>
                <input type="hidden" value="{{$data->id}}" name="tim_id">
                <input type="hidden" name="timlain_id" value="{{ $datatimlain->id }}">
                <input oninput="this.value = this.value.toUpperCase()" required class="form-control" name="kode_promogroup"
                maxlength="15"
                placeholder="Masukkan Kode Promo ..."
                @if ($data->status_bayar || !isset($datatimlain))
                disabled
                @endif  
                {{-- @if ($user->daftar !== "esport")
                disabled
                @endif                 --}}
                >
            </div>            
            <br>
            <input type="submit"
            {{-- @if ($user->daftar !== "esport")
            disabled
            @endif     --}}
            @if ($data->status_bayar || !isset($datatimlain))
            disabled
            @endif  
            class="btn btn-primary my-3"
            value="Submit" >
        </form>
    </div>
</div>
@endif
@endsection