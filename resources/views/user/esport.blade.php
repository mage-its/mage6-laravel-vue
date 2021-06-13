@extends('layouts.dashboardtemplate')

@section('sidebar')
<li class="nav-item">
    <a class="nav-link" href="/home">
        <i class="fas fa-edit"></i>
        <span>Daftar</span>
    </a>
</li>
@endsection

@section('isidashboard')
<div class="row justify-content-center">
    <div class="col-lg-9">
<form id="form-utama" method="POST" enctype="multipart/form-data" action="/submitesport">
    @csrf
    @if ($data !== null)
    <input type="hidden" value="{{$data->id}}" name="id" />
    @endif
    <input type="hidden" value="esport" name="type" />
    <div id="main-form">
        <h3><b>Asal</b></h3>
        <section>
            <div class="form-group">
                <label for="asalKota">Kota Asal</label>
                <input type="text" value="{{$data->asal_kota ?? ""}}" oninput="this.value = this.value.toUpperCase()"
                    required class="upper form-control" name="asal_kota" placeholder="Kota Asal...">
            </div>
        </section>
        <h3><b>Tim</b></h3>
        <section>
            <div class="form-group ">
                <label>Game</label>
                <select name="cabang_lomba" class="custom-select">
                    <option selected disabled>Select</option>
                    {{-- <option value="2">DOTA</option> --}}
                    {{-- <option value="3">CSGO</option> --}}
                    <option value="4">Mobile Legends</option>
                </select>
            </div>
            <div class="form-group">
                <label for="namaTim">Nama Tim</label>
                <input type="text" value="{{old('nama_tim')}}" required class="form-control upper "
                    oninput="this.value = this.value.toUpperCase()" name="nama_tim" aria-describedby="emailHelp"
                    placeholder="Nama Tim...">
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Ketua</label>
                    <input type="text" value="{{old('nama_ketua')}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_ketua" placeholder="Nama Ketua...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Ketua</label>
                    <input type="text" value="{{old('id_ketua')}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_ketua"
                        placeholder="Id / Link Akun Ketua...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="form-group col-md-4">
                    <label>Nomor Hp Ketua</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="number" class="upper form-control" required
                            oninput="this.value = this.value.toUpperCase()" value="{{$data->hp_ketua ?? ""}}"
                            name="hp_ketua" placeholder="Nomor Hp Ketua..." onkeypress="return isNumberKey(event)">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Nomor WA Ketua</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="number" class="upper form-control" oninput="this.value = this.value.toUpperCase()"
                            required name="wa_ketua" value="{{$data->wa_ketua ?? ""}}" placeholder="Nomor WA Ketua..."
                            onkeypress="return isNumberKey(event)">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>ID Line Ketua</label>
                    <input type="text" class="form-control" required value="{{$data->line_ketua ?? ""}}"
                        name="line_ketua" placeholder="ID Line Ketua...">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Anggota 1</label>
                    <input type="text" value="{{$data->nama_anggota1 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_anggota1"
                        placeholder="Nama Anggota 1...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Anggota 1</label>
                    <input type="text" value="{{$data->id_anggota1 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_anggota1"
                        placeholder="Id / Link Akun Anggota 1...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Anggota 2</label>
                    <input type="text" value="{{$data->nama_anggota2 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_anggota2"
                        placeholder="Nama Anggota 2...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Anggota 2</label>
                    <input type="text" value="{{$data->id_anggota2 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_anggota2"
                        placeholder="Id / Link Akun Anggota 2...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Anggota 3</label>
                    <input type="text" value="{{$data->nama_anggota3?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_anggota3"
                        placeholder="Nama Anggota 3...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Anggota 3</label>
                    <input type="text" value="{{$data->id_anggota3 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_anggota3"
                        placeholder="Id / Link Akun Anggota 3...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Anggota 4</label>
                    <input type="text" value="{{$data->nama_anggota4?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_anggota4"
                        placeholder="Nama Anggota 4...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Anggota 4</label>
                    <input type="text" value="{{$data->id_anggota4 ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_anggota4"
                        placeholder="Id / Link Akun Anggota 4...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    <label for="namaKetua">Nama Anggota Cadangan</label>
                    <input type="text" value="{{$data->nama_cadangan?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="nama_cadangan"
                        placeholder="Nama Anggota Cadangan...">
                </div>
                <div class="form-group col-md-6">
                    <label for="idakun">ID/ Link Akun Anggota Cadangan</label>
                    <input type="text" value="{{$data->id_cadangan ?? ""}}" required class="form-control upper "
                        oninput="this.value = this.value.toUpperCase()" name="id_cadangan"
                        placeholder="Id / Link Akun Cadangan...">
                    <small class="form-text text-muted">
                        (Khusus DOTA 2 ID Number DOTA, bukan ID akun steam)
                    </small>
                </div>
            </div>
        </section>
        <h3><b>File Submission</b></h3>
        <div><b>Maximum size file yang diperbolehkan adalah 1 MB</b></div>
        <section>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpketua))
                    <label>Scan KTP Ketua (wajib)</label>
                    @else
                    <label>Scan KTP Ketua <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpketua)) required @endif
                    name="scan_ktpketua" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ssketua))
                    <label>Screenshot Akun Ketua (wajib)</label>
                    @else
                    <label>Screenshot Akun Ketua <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ssketua)) required @endif
                    name="scan_ssketua" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpanggota1))
                    <label>Scan KTP Anggota 1 (wajib)</label>
                    @else
                    <label>Scan KTP Anggota 1 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpanggota1)) required @endif
                    name="scan_ktpanggota1" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ssanggota1))
                    <label>Screenshot Akun Anggota 1 (wajib)</label>
                    @else
                    <label>Screenshot Akun Anggota 1 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ssanggota1)) required @endif
                    name="scan_ssanggota1" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpanggota2))
                    <label>Scan KTP Anggota 2 (wajib)</label>
                    @else
                    <label>Scan KTP Anggota 2 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpanggota2)) required @endif
                    name="scan_ktpanggota2" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ssanggota2))
                    <label>Screenshot Akun Anggota 2 (wajib)</label>
                    @else
                    <label>Screenshot Akun Anggota 2 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ssanggota2)) required @endif
                    name="scan_ssanggota2" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpanggota3))
                    <label>Scan KTP Anggota 3 (wajib)</label>
                    @else
                    <label>Scan KTP Anggota 3 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpanggota3)) required @endif
                    name="scan_ktpanggota3" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ssanggota3))
                    <label>Screenshot Akun Anggota 3 (wajib)</label>
                    @else
                    <label>Screenshot Akun Anggota 3 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ssanggota3)) required @endif
                    name="scan_ssanggota3" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpanggota4))
                    <label>Scan KTP Anggota 4 (wajib)</label>
                    @else
                    <label>Scan KTP Anggota 4 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpanggota4)) required @endif
                    name="scan_ktpanggota4" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ssanggota4))
                    <label>Screenshot Akun Anggota 4 (wajib)</label>
                    @else
                    <label>Screenshot Akun Anggota 4 <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ssanggota4)) required @endif
                    name="scan_ssanggota4" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="form-row justify-items-center">
                <div class="form-group col-md-6">
                    @if (!isset($data->path_ktpcadangan))
                    <label>Scan KTP Anggota Cadangan (wajib)</label>
                    @else
                    <label>Scan KTP Anggota Cadangan <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_ktpcadangan)) required @endif
                    name="scan_ktpcadangan" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">
                        (Jika tidak ada dapat menggunakan SIM atau Kartu Keluarga)
                    </small>
                </div>
                <div class="form-group col-md-6">
                    @if (!isset($data->path_sscadangan))
                    <label>Screenshot Akun Anggota Cadangan (wajib)</label>
                    @else
                    <label>Screenshot Akun Anggota Cadangan <b class="text-success">Data Sudah Diupload</b> </label>
                    @endif
                    <input type="file" class="form-control-file" @if (!isset($data->path_sscadangan)) required @endif
                    name="scan_sscadangan" accept=".jpg, .jpeg, .png">
                </div>
            </div>
        </section>
        <h3><b>Asal Info</b></h3>
        <section>
            <div class="form-group ">
                <label>Dapat Informasi tentang Mage dari</label>
                <select name="asal_info" class="custom-select">
                    <option value="1">Media Sosial (Facebook)</option>
                    <option value="5">Media Sosial (Instagram)</option>
                    <option value="6">Media Sosial (Twitter)</option>
                    <option value="2">Guru</option>
                    <option value="3">Roadshow</option>
                    <option value="4">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Asal Info</label>
                <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" id="info"
                    name="info" placeholder="Asal Info..." disabled>
            </div>
        </section>

        <div class="form-check my-4">
            <input class="form-check-input" required name="snk" type="checkbox" id="check">
            <label class="form-check-label" for="check">SAYA MENYETUJUI SYARAT-SYARAT DAN KETENTUAN</label>
        </div>
    </div>

    <!-- Confirm Modal-->
    <div class="modal fade" id="snkModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>SYARAT DAN KETENTUAN <br> MULTIMEDIA AND GAME
                            6</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4><b>Dengan Mengisi Formulir Ini Saya Menyetujui :</b></h4>
                    <ol>
                        <li>Setiap data yang saya isi dalam formulir pendaftaran ini adalah benar dan sah</li>
                        <li>Identitas diri sesuai dengan kartu identitas yang dicantumkan </li>
                        <li>Gambaran umum dan poster yang kami cantumkan adalah karya original dan belum pernah
                            diikutsertakan dalam lomba apapun (khusus peserta development competition) </li>
                        <li>Apabila dikemudian hari ditemukan bahwa dokumen yang telah kami berikan adalah tidak benar,
                            maka kami bersedia dikenakan sanksi sesuai peraturan dan ketentuan yang berlaku </li>
                        <li>Formulir ini diisi tanpa adanya paksaan dari pihak manapun dan untuk digunakan sebagaimana
                            mestinya </li>
                        <li>Kesalahan dalam pengisian biodata bukan tanggung jawab panitia </li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="button" data-dismiss="modal" onclick="agree()">Setuju</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Modal-->
    <div class="modal fade" id="submitModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>PASTIKAN DATA YANG KAMU ISI BENAR SEKALI LAGI
                            !!!</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> *NOTE<br> PANITIA TIDAK BERTANGGUNG JAWAB ATAS KESALAHAN DATA YANG DIISI
                    PESERTA
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary my-3" onclick="showModal()">Submit</button>
</form>
</div>
</div>
@endsection