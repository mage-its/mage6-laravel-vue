@extends('layouts.dashboardtemplate')

{{-- @section('user') {{$user->name}} @endsection --}}

@section('sidebar')
<li class="nav-item">
    <a class="nav-link" href="/home">
        <i class="fas fa-edit"></i>
        <span>Beranda</span>
    </a>
</li>
<li class="nav-item active">
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
<div class="container">
    <div class="card my-2">
        <div class="card-header"><b>Data Sekolah</b></div>
        <div class="card-body">
            <div class="row">
                @if($user->daftar != 'esport')
                @if (isset($data->asal_perguruan))
                <div class="col-sm-4 my-1">Asal Sekolah / Perguruan Tinggi</div>
                <div class="col-sm-8 my-1">: {{$data->asal_perguruan}}</div>
                @else
                <div class="col-sm-4 my-1">Asal Sekolah / Perguruan Tinggi</div>
                <div class="col-sm-8 my-1">: {{$data->asal_sekolah}}</div>
                @endif
                <div class="col-sm-4 my-1">Alamat Sekolah</div>
                <div class="col-sm-8 my-1">: {{$data->asal_alamat}}</div>
                @endif
                <div class="col-sm-4 my-1">Asal Kota</div>
                <div class="col-sm-8 my-1">: {{$data->asal_kota}}</div>
            </div>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-header"><b>Data Tim</b></div>
        <div class="card-body">
            <div class="row">
                @if(isset($data->cabang_lomba))
                <div class="col-sm-4 my-1">Cabang Lomba</div>
                <div class="col-sm-8 my-1 mb-4">: {{$data->cabang_lomba}}</div>
                @endif
                @if(isset($data->kat))
                <div class="col-sm-4 my-1">Kategori</div>
                <div class="col-sm-8 my-1 mb-4">: {{$data->kat}}</div>
                @endif
                <div class="col-sm-4 my-1">Nama Tim</div>
                <div class="col-sm-8 my-1">: {{$data->nama_tim}}</div>
                @if ($user->daftar == 'devcom')
                <div class="col-sm-4 my-1">Nama Pembimbing</div>
                <div class="col-sm-8 my-1">: {{$data->nama_pembimbing}}</div>
                <div class="col-sm-4 my-1">No Hp Pembimbing</div>
                <div class="col-sm-8 my-1">: {{$data->hp_pembimbing}}</div>
                <div class="col-sm-4 my-1">No WA Pembimbing</div>
                <div class="col-sm-8 my-1">: {{$data->wa_pembimbing}}</div>
                @endif
                <div class="col-sm-4 my-1">Nama Ketua</div>
                <div class="col-sm-8 my-1">: {{$data->nama_ketua}}</div>
                <div class="col-sm-4 my-1">No Hp Ketua</div>
                <div class="col-sm-8 my-1">: {{$data->hp_ketua}}</div>
                <div class="col-sm-4 my-1">No WA Ketua</div>
                <div class="col-sm-8 my-1">: {{$data->wa_ketua}}</div>
                <div class="col-sm-4 my-1">ID Line_ketua</div>
                <div class="col-sm-8 my-1">: {{$data->line_ketua}}</div>
                <div class="col-sm-4 my-1">Nama Anggota 1</div>
                <div class="col-sm-8 my-1">: {{$data->nama_anggota1}}</div>
                <div class="col-sm-4 my-1">Nama Anggota 2</div>
                <div class="col-sm-8 my-1">: {{$data->nama_anggota2}}</div>
                @if($user->daftar == 'esport')
                <div class="col-sm-4 my-1">Nama Anggota 3</div>
                <div class="col-sm-8 my-1">: {{$data->nama_anggota3}}</div>
                <div class="col-sm-4 my-1">Nama Anggota 4</div>
                <div class="col-sm-8 my-1">: {{$data->nama_anggota4}}</div>
                <div class="col-sm-4 my-1">Nama Anggota Cadangan</div>
                <div class="col-sm-8 my-1 mb-4">: {{$data->nama_cadangan}}</div>

                <div class="col-sm-4 my-1">ID Akun Ketua</div>
                <div class="col-sm-8 my-1">: {{$data->id_ketua}}</div>
                <div class="col-sm-4 my-1">ID Akun Anggota 1</div>
                <div class="col-sm-8 my-1">: {{$data->id_anggota1}}</div>
                <div class="col-sm-4 my-1">ID Akun Anggota 2</div>
                <div class="col-sm-8 my-1">: {{$data->id_anggota2}}</div>
                <div class="col-sm-4 my-1">ID Akun Anggota 3</div>
                <div class="col-sm-8 my-1">: {{$data->id_anggota3}}</div>
                <div class="col-sm-4 my-1">ID Akun Anggota 4</div>
                <div class="col-sm-8 my-1">: {{$data->id_anggota4}}</div>
                <div class="col-sm-4 my-1">ID Akun Anggota Cadangan</div>
                <div class="col-sm-8 my-1">: {{$data->id_cadangan}}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-header"><b>File</b></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Ketua</div>
                <a class="col-sm-8 my-1" href="{{asset('kp/'.$data->path_ktpketua)}}">: {{$data->path_ktpketua}}</a>
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Anggota 1</div>
                <a class="col-sm-8 my-1" href="{{asset('kp/'.$data->path_ktpanggota1)}}">:
                    {{$data->path_ktpanggota1}}</a>
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Anggota 2</div>
                <a class="col-sm-8 my-1" href="{{asset('kp/'.$data->path_ktpanggota2)}}">:
                    {{$data->path_ktpanggota2}}</a>
                @if ($user->daftar == 'esport')
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Anggota 3</div>
                <a class="col-sm-8 my-1" href="{{asset('kp/'.$data->path_ktpanggota3)}}">:
                    {{$data->path_ktpanggota3}}</a>
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Anggota 4</div>
                <a class="col-sm-8 my-1" href="{{asset('kp/'.$data->path_ktpanggota4)}}">:
                    {{$data->path_ktpanggota4}}</a>
                <div class="col-sm-4 my-1">Kartu Pelajar/Mahasiswa Anggota Cadangan</div>
                <a class="col-sm-8 my-1 mb-4" href="{{asset('kp/'.$data->path_ktpcadangan)}}">:
                    {{$data->path_ktpcadangan}}</a>

                <div class="col-sm-4 my-1">Screenshot Akun Ketua</div>
                <a class="col-sm-8 my-1" href="{{asset('sa/'.$data->path_ssketua)}}">: {{$data->path_ssketua}}</a>
                <div class="col-sm-4 my-1">Screenshot Akun Anggota 1</div>
                <a class="col-sm-8 my-1" href="{{asset('sa/'.$data->path_ssanggota1)}}">: {{$data->path_ssanggota1}}</a>
                <div class="col-sm-4 my-1">Screenshot Akun Anggota 2</div>
                <a class="col-sm-8 my-1" href="{{asset('sa/'.$data->path_ssanggota2)}}">: {{$data->path_ssanggota2}}</a>
                <div class="col-sm-4 my-1">Screenshot Akun Anggota 3</div>
                <a class="col-sm-8 my-1" href="{{asset('sa/'.$data->path_ssanggota3)}}">: {{$data->path_ssanggota3}}</a>
                <div class="col-sm-4 my-1">Screenshot Akun Anggota 4</div>
                <a class="col-sm-8 my-1" href="{{asset('sa/'.$data->path_ssanggota4)}}">: {{$data->path_ssanggota4}}</a>
                <div class="col-sm-4 my-1">Screenshot Akun Anggota Cadangan</div>
                <a class="col-sm-8 my-1 mb-4" href="{{asset('sa/'.$data->path_sscadangan)}}">:
                    {{$data->path_sscadangan}}</a>
                @endif
                @if ($user->daftar == 'devcom' && isset($data->path_proposal))
                <div class="col-sm-4 my-1">File Proposal</div>
                <a class="col-sm-8 my-1" href="{{asset('abstrak/'.$data->path_proposal)}}">: {{$data->path_proposal}}</a>
                {{-- <div class="col-sm-4 my-1">Link Poster</div>
                <a class="col-sm-8 my-1 mb-4" href="{{$data->link_poster}}">: {{$data->link_poster}}</a> --}}
                @endif
                @if(isset($data->path_buktibayar))
                <div class="col-sm-4 my-1">Bukti Pembayaran</div>
                <a class="col-sm-8 my-1" href="{{asset('bb/'.$data->path_buktibayar)}}">: {{$data->path_buktibayar}}</a>
                @endif
            </div>
        </div>
    </div>

    @if($data->tahap == 2)
    <div class="card my-2">
        <div class="card-header"><b>Tahap 2</b></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 my-1">Link Karya dan Video</div>
                <a class="col-sm-8 my-1" href="{{$data->link_karya}}">: {{$data->link_karya}}</a>
                {{-- <div class="col-sm-4 my-1">Link Video</div>
                <a class="col-sm-8 my-1" href="{{$data->link_video}}">: {{$data->link_video}}</a> --}}
            </div>
        </div>
    </div>
    @endif

    <div class="card my-2">
        <div class="card-header"><b>Asal Info</b></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 my-1">Asal Info</div>
                <div class="col-sm-8 my-1">: {{$data->asal_info}}</div>
                @if (isset($data->info))
                <div class="col-sm-4 my-1">Info</div>
                <div class="col-sm-8 my-1">: {{$data->info}}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-header"><b>Status Akun</b></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 my-1">Status Verifikasi</div>
                @if ($data->status)
                <div class="col-sm-8 my-1">:<b> Sudah Diverifikasi</b></div>
                @else
                <div class="col-sm-8 my-1">:<b> Belum Diverifikasi</b></div>
                @endif
            </div>
        </div>
    </div>
    @endsection