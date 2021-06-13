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
<h2 class="mx-auto text-center"><b>UNGGAH BUKTI PEMBAYARAN</b></h2>
<div class="mx-auto text-center">Halo {{$data->nama_tim}}, kamu terdaftar dalam MAGE 6 dengan nomer pendaftaran</div>
<h3 class="mx-auto text-center"><b>{{$data->no_peserta}}</b></h3>
<div class="mx-5 text-center">Segera lakukan pembayaran dengan cara :</div>
<div class="mx-auto text-center">
    <ul>
        <li>Transfer ke bank BNI 0725453673 a.n. shabrina zhafarina p. sejumlah
            <h3><b>Rp. {{$data->price}}</b></h3>
            <i>(penambahan 3 digit terakhir digunakan agar memudahkan dalam konfirmasi)</i>
        </li>        
    </ul>
</div>
<div class="mx-auto my-3 text-center"><b>Lalu upload bukti pembayaranmu dibawah ini :</b></div>
<form method="POST" enctype="multipart/form-data" action="/uploadbb">
    @csrf
    <input type="hidden" value="{{$data->id}}" name="bayar_id">
    <input type="hidden" value="{{$user->daftar}}" name="user_daftar">
    <div class="form-group">
        <label>Nama Pengirim Transfer</label>
        <input oninput="this.value = this.value.toUpperCase()" required class="form-control" name="nama_bayar"
            placeholder="Nama Pengirim Transfer..."
            @if ($data->status_bayar)
            disabled
            @endif
            >
    </div>
    <div class="form-group ">
        <label>Bukti Pembayaran</label>
        <input type="file" required class="form-control-file" required name="scan_buktibayar"
        @if ($data->status_bayar)
        disabled
        @endif
        accept=".jpg, .jpeg, .png">
        <div><b>Catatan: harap mengunggah bukti yang jelas terlihat nama pengirim, nama penerima, nominal dan tanggal
                pembayaran</b></div>
    </div>
    <input type="submit"
    @if ($data->status_bayar)
    disabled
    @endif    
    class="btn btn-primary my-3"
    value="Submit" >
</form>

</div>
</div>

<div class="row d-flex justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="mx-auto my-3 text-center"><b>Apabila anda memiliki kode promo silahkan masukkan disini :</b></div>
        <form method="POST" action="/checkpromo">
            @csrf
            <div class="form-group">
                <label>Kode Promo</label>                
                <input oninput="this.value = this.value.toUpperCase()" required class="form-control" name="kode_promo"
                maxlength="15"
                placeholder="Masukkan Kode Promo ..."
                {{-- @if ($user->daftar !== "esport")
                disabled
                @endif                 --}}
                >
            </div>                        
            <small>*Penggunaan voucher terhitung tiap user hanya satu kali</small>
            <br/>            
            <div class="mt-3">Ingin diskon lebih? Coba pakai voucher group <a href="/bayar/group">click disini</a></div>            
            <input type="submit"
            {{-- @if ($user->daftar !== "esport")
            disabled
            @endif     --}}
            class="btn btn-primary my-3"
            value="Submit" >
        </form>
    </div>
</div>
@endsection