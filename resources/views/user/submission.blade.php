@extends('layouts.dashboardtemplate')

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
<li class="nav-item">
    <a class="nav-link" href="/file">
        <i class="fas fa-edit"></i>
        <span>File</span>
    </a>
</li>
@if ($user->daftar == 'olim')
<li class="nav-item">
    <a class="nav-link" href="/twibbon">
        <i class="fas fa-edit"></i>
        <span>Create Twibbon</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/testonline">
        <i class="fas fa-edit"></i>
        <span>Tes Online</span>
    </a>
</li>
@elseif ($user->daftar == 'devcom')
<li class="nav-item active">
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
@if ($user->daftar == 'devcom' && $data->tahap === 1)
<div class="alert alert-danger">
    Pendaftaran dan Submit Proposal Development Competition MAGE6 Telah Ditutup
</div>
@endif

@if ($user->daftar == 'devcom' && $data->tahap == 1 && isset($data->path_proposal))
<div class="alert alert-success">
    Anda sudah mengunggah proposal
</div>

@elseif($user->daftar == 'devcom' && $data->tahap == 1 && !isset($data->path_proposal))
    <div class="alert alert-danger">
        Anda Belum Mengupload proposal
    </div>
@endif

@if ($user->daftar == 'devcom' && $data->tahap == 2 && isset($data->link_karya))
<div class="alert alert-success">
    Anda sudah mengunggah link karya dan link video
</div>
@elseif($user->daftar == 'devcom' && $data->tahap == 2 && (!isset($data->link_video) || !isset($data->link_karya)))
<div class="alert alert-danger">
    Anda Belum Mengupload Link Karya dan Link Video
</div>
@endif

@if($user->daftar == 'devcom' && $data->tahap == 1)
    <h2 class="mx-auto text-center"><b>TAHAP 1: UNGGAH PROPOSAL</b></h2>
@elseif($user->daftar == 'devcom' && $data->tahap == 2)
    <h2 class="mx-auto text-center"><b>TAHAP 2: PENGUMPULAN LINK KARYA DAN VIDEO</b></h2>
@endif

    <div class="mx-auto text-center">Halo {{$data->nama_tim}}, kamu terdaftar dalam Development Competition MAGE 6
        dengan
        nomer pendaftaran</div>
    <h3 class="mx-auto text-center"><b>{{$data->no_peserta}}</b></h3>

    @if($user->daftar == 'devcom' && $data->tahap == 1)        
    <form method="POST" enctype="multipart/form-data" action="/uploaddev">
    @elseif($user->daftar == 'devcom' && $data->tahap == 2)
    <form method="POST" enctype="multipart/form-data" action="/uploaddev2">
    @endif        

        @csrf
        <input type="hidden" value="{{$data->id}}" name="data_id">
        <input type="hidden" value="{{$user->daftar}}" name="user_daftar">

        {{-- file progress --}}
        @if($user->daftar == 'devcom' && $data->tahap == 1)
        <div class="form-group ">            
            <label>Tahap 1: Upload Proposal</label>
            
            <input            
            type="file" required class="form-control-file" required name="file_proposal" accept=".pdf" disabled>            
        </div>        

        @elseif($user->daftar == 'devcom' && $data->tahap == 2)
        <div class="form-group">
            <label>Tahap 2: Upload Link Karya dan Video</label>
            <input disabled class="form-control" name="link_karyadanvideo" placeholder="Link karya dan video ...">                        
        </div>
        {{-- <div class="form-group">
            <label>Tahap 2: Upload Link Video</label>
            <input class="form-control" name="link_video" placeholder="Link video ...">            
        </div> --}}
        @endif


        {{-- link video --}}
        {{-- <div class="form-group">
            <label>Link Poster</label>
            <input
            @if(isset($data->path_abstrak))
            disabled     
            @endif
            required class="form-control" name="link_poster" placeholder="Link Poster">
        </div> --}}
        @if($user->daftar == 'devcom' && $data->tahap == 1)
        <button type="submit" class="btn btn-primary my-3" disabled>Submit</button>
        @elseif($user->daftar == 'devcom' && $data->tahap == 2)
        <button type="submit" class="btn btn-primary my-3" disabled>Submit</button>
        @endif
    </form>
</div>
</div>
@endsection