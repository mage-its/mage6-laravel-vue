@extends('layouts.dashboardtemplate')

@section('isidashboard')
    <div class="row">
        {{-- @if($user->daftar === "devcom") --}}        
        <div class="col-lg-8">
            <div class="alert alert-danger">
                Pendaftaran dan Submit Proposal Development Competition MAGE6 Telah Ditutup
            </div>
            <div class="alert alert-danger">
                Pendaftaran Esport DOTA2 MAGE6 Telah Ditutup
            </div>
        </div>
        <div class="col-lg-12">            
            <p> Selamat datang <b>{!! $user->name !!}</b> dihalaman awal MAGE 6, ini adalah halaman awal perjalanan Anda.            
                <br>
                Silahkan memilih jalan petualangan anda.
            </p>            
            <a href="/fillformdevcom"><button class="btn btn-primary" disabled>Devcom</button></a>
            <a href="/fillformesport"><button class="btn btn-primary" disabled>Esport</button></a>
            <a href="/fillformolim"><button class="btn btn-primary">Olim</button></a>
            <br>
            <br>
            <p style="color: red">
                *Hati-hati dalam memilih kategori lomba, pastikan yang anda pilih adalah benar.
            </p>
            <br>
            <br>
            {{-- @foreach ($announce as $anc)
                <p>{{ $anc['konten'] }}</p>
            @endforeach --}}
        </div>
    </div>
@endsection

