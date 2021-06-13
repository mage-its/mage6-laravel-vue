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
<li class="nav-item">
    <a class="nav-link" href="/file">
        <i class="fas fa-edit"></i>
        <span>File</span>
    </a>
</li>
{{-- <li class="nav-item">
    <a class="nav-link" href="/twibbon">
        <i class="fas fa-edit"></i>
        <span>Create Twibbon</span>
    </a>
</li> --}}
<li class="nav-item active">
    <a class="nav-link" href="/testonline">
        <i class="fas fa-edit"></i>
        <span>Tes Online</span>
    </a>
</li>
@endsection

@section('isidashboard')
<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-lg-12 d-flex justify-content-center flex-column align-items-center">
        <div class="h4">Try out sesi 3: 19.00 WIB - 21.00 WIB</div>
        @if($user_answer !== null && $user_score !== null & $timediff !== null)
        <button class="btn btn-primary mt-4" onclick="window.location.href='/mainmenu'">Mulai</button>
        @else
        <button class="btn btn-primary mt-4" onclick="window.location.href='/mainmenu'" disabled>Mulai</button>
        @endif        
    </div>    
</div>
@endsection