@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
<div class="row">
  <div class="col-lg-12">
<h4>Daftar Peserta Devcom</h4>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-striped table-bordered display nowrap" id="dataTable" style="width:100%">
      <thead>
        <tr>
          <th>No.</th>
          <th>No.Peserta</th>
          <th>Email</th>
          <th>Kat</th>
          <th>Cabang Lomba</th>
          <th>Asal Perguruan Tinggi / Sekolah</th>
          <th>Asal Alamat</th>
          <th>Asal Kota</th>
          <th>Nama Tim</th>
          <th>Nama Pembimbing</th>
          <th>Hp Pembimbing</th>
          <th>Wa Pembimbing</th>
          <th>Nama Ketua</th>
          <th>Hp Ketua</th>
          <th>Wa Ketua</th>
          <th>Line Ketua</th>
          <th>Nama Anggota 1</th>
          <th>Nama Anggota 2</th>
          <th>Path Proposal</th>
          <th>Link Karya dan Video</th>          
          <th>Path Bukti Bayar</th>
          <th>Nama Pembayar</th>
          <th>Harga</th>
          <th>Tahap</th>
          <th>Waktu Update</th>
          <th>Asal Info</th>
          <th>Verifikasi</th>
          <th>Hapus</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($peserta as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->no_peserta}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->kat}}</td>
          <td>{{$item->cabang_lomba}}</td>
          <td>{{$item->asal_perguruan}}</td>
          <td>{{$item->asal_alamat}}</td>
          <td>{{$item->asal_kota}}</td>
          <td>{{$item->nama_tim}}</td>
          <td>{{$item->nama_pembimbing}}</td>
          <td>{{$item->hp_pembimbing}}</td>
          <td>{{$item->wa_pembimbing}}</td>
          <td>{{$item->nama_ketua}}</td>
          <td>{{$item->hp_ketua}}</td>
          <td>{{$item->wa_ketua}}</td>
          <td>{{$item->line_ketua}}</td>
          <td>{{$item->nama_anggota1}}</td>
          <td>{{$item->nama_anggota2}}</td>
          <td>
            <a href="{{ asset("abstrak/$item->path_proposal")}}">{{$item->path_proposal}}</a>
          </td>
          <td>
            <a href="{{$item->link_karya}}">{{$item->link_karya}}</a>
          </td>          
          <td>
            <a href="{{ asset("bb/$item->path_buktibayar")}}">{{$item->path_buktibayar}}</a>
          </td>
          <td>{{$item->nama_bayar}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->tahap}}</td>
          <td>{{$item->updated_at}}</td>
          @if ($item->asal_info == 'Other')
          <td>{{$item->info}}</td>
          @else
          <td>{{$item->asal_info}}</td>
          @endif
          <td>

            {{-- Form Verifikasi --}}
            @if ($item->status != 0)
            <form method="post" action="/daftardevcom/verif">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="timId" />
              <button class="btn btn-danger" type="submit">Unverif</button>
            </form>
            @else
            <button class="btn btn-primary VerifBtn" data-timid="{{ $item->id}}" data-namatim="{{ $item->nama_tim}}"
              data-nopeserta="{{ $item->no_peserta}}">Verif</button>
            @endif

          </td>

          <td>
            <button class="btn btn-danger DelBtn" type="button" data-timid="{{ $item->id }}"
              data-namatim="{{ $item->nama_tim }} ">Hapus</button>
          </td>
          <td>
            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}"
              type="button">Edit</button>

            {{-- Update Form --}}
            <form method="POST" action="/daftardevcom/update">
              @csrf
              <input type="hidden" name="timId" value="{{$item->id}}">
              <div class="modal fade" id="editModal{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Data Tim {{$item->nama_tim}}</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">No Peserta</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="no_peserta" value="{{$item->no_peserta}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Asal Sekolah / Perguruan Tinggi</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="asal_perguruan"
                            value="{{$item->asal_perguruan}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Alamat Sekolah</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="asal_alamat" value="{{$item->asal_alamat}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Kota Asal </label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="asal_kota" value="{{$item->asal_kota}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Nama Tim</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="nama_tim" value="{{$item->nama_tim}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Kategori</label>
                        <div class="col-auto">
                          <select class="custom-select mb-2" name="kat" id="inlineFormInput">
                            <option value="1" @if($item->kat == "Mahasiswa") selected @endif>Mahasiswa</option>
                            <option value="2" @if($item->kat == "Siswa") selected @endif>Siswa</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Cabang Lomba</label>
                        <div class="col-auto">
                          <select class="custom-select mb-2" name="cabang_lomba" id="inlineFormInput">
                            <option value="1" @if($item->cabang_lomba == "Game") selected @endif>Game</option>
                            <option value="2" @if($item->cabang_lomba == "App") selected @endif>App</option>
                            <option value="3" @if($item->cabang_lomba == "IOT") selected @endif >IOT</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Nama Pembimbing</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="nama_pembimbing"
                            value="{{$item->nama_pembimbing}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">HP Pembimbing</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="hp_pembimbing"
                            value="{{$item->hp_pembimbing}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">WA Pembimbing</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="wa_pembimbing"
                            value="{{$item->wa_pembimbing}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Nama Ketua</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="nama_ketua" value="{{$item->nama_ketua}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Hp Ketua</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="hp_ketua" value="{{$item->hp_ketua}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">WA Ketua</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="wa_ketua" value="{{$item->wa_ketua}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Line Ketua</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="line_ketua" value="{{$item->line_ketua}}"
                            id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Nama Anggota 1</label>
                        <div class="col-auto">
                          <input type="text" class="form-control mb-2" name="nama_anggota1"
                            value="{{$item->nama_anggota1}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Nama Anggota 2</label>
                        <div class="col-auto">
                          <input type="text" name="nama_anggota2" class="form-control mb-2"
                            value="{{$item->nama_anggota2}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="form-row align-items-center">
                        <label class="col-form-label" for="inlineFormInput">Tahap</label>
                        <div class="col-auto">
                          <input type="text" name="tahap" class="form-control mb-2"
                            value="{{$item->tahap}}" id="inlineFormInput">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-warning" type="submit">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>

          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <button class="btn btn-primary" onclick="location.href='/daftardevcom/download'">Download All Data</button>
  {{-- <button class="btn btn-primary" onclick="location.href='/daftardevcom2/download/2'">Download Data Tahap 2</button>
  <button class="btn btn-primary" onclick="location.href='/daftardevcom2/download/3'">Download Data Tahap 3</button> --}}
</div>

<!-- Delete Modal-->
<form method="POST" action="/daftardevcom/hapus">
  @csrf
  <div class="modal fade" id="DelModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin akan Dihapus ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="delBody"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger" type="submit">Hapus</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Verif Modal-->
<form method="POST" action="/daftardevcom/verif">
  @csrf
  <div class="modal fade" id="VerifModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="verifTitle" />
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="verifBody"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Verif</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>
@endsection