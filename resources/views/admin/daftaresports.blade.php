@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
  <h4>Daftar Peserta Esports</h4>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered display nowrap" id="dataTable" style="width:100%">
        <thead>
          <tr>
            <th>No.</th>
            <th>No.Peserta</th>
            <th>Email</th>
            <th>Cabang Lomba</th>
            <th>Asal Kota</th>
            <th>Nama Tim</th>
            <th>Nama Ketua</th>
            <th>Hp Ketua</th>
            <th>Wa Ketua</th>
            <th>Line Ketua</th>
            <th>Id Ketua</th>
            <th>Nama Anggota 1</th>
            <th>Id Anggota 1</th>
            <th>Nama Anggota 2</th>
            <th>Id Anggota 2</th>
            <th>Nama Anggota 3</th>
            <th>Id Anggota 3</th>
            <th>Nama Anggota 4</th>
            <th>Id Anggota 4</th>
            <th>Nama Anggota Cadangan</th>
            <th>Id Anggota Cadangan</th>
            <th>Path Kartu Pelajar</th>
            <th>Path Bukti Bayar</th>
            <th>Path ScreenShot Akun</th>
            <th>Nama Pembayar</th>
            <th>Harga</th>
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
              <td>{{$item->cabang_lomba}}</td>
              <td>{{$item->asal_kota}}</td>
              <td>{{$item->nama_tim}}</td>
              <td>{{$item->nama_ketua}}</td>
              <td>{{$item->hp_ketua}}</td>
              <td>{{$item->wa_ketua}}</td>
              <td>{{$item->line_ketua}}</td>
              <td>{{$item->id_ketua}}</td>
              <td>{{$item->nama_anggota1}}</td>
              <td>{{$item->id_anggota1}}</td>
              <td>{{$item->nama_anggota2}}</td>
              <td>{{$item->id_anggota2}}</td>
              <td>{{$item->nama_anggota3}}</td>
              <td>{{$item->id_anggota3}}</td>
              <td>{{$item->nama_anggota4}}</td>
              <td>{{$item->id_anggota4}}</td>
              <td>{{$item->nama_cadangan}}</td>
              <td>{{$item->id_cadangan}}</td>              
              <td>
                <a href="{{ asset("kp/$item->path_ktpketua")}}">{{$item->path_ktpketua}}</a><br>
                <a href="{{ asset("kp/$item->path_ktpanggota1")}}">{{$item->path_ktpanggota1}}</a><br>
                <a href="{{ asset("kp/$item->path_ktpanggota2")}}">{{$item->path_ktpanggota2}}</a><br>
                <a href="{{ asset("kp/$item->path_ktpanggota3")}}">{{$item->path_ktpanggota3}}</a><br>
                <a href="{{ asset("kp/$item->path_ktpanggota4")}}">{{$item->path_ktpanggota4}}</a><br>
                <a href="{{ asset("kp/$item->path_ktpcadangan")}}">{{$item->path_ktpcadangan}}</a>
              </td>
              <td>
                <a href="{{ asset("bb/$item->path_buktibayar")}}">{{$item->path_buktibayar}}</a>
              </td>
              <td>
                <a href="{{ asset("sa/$item->path_ssketua")}}">{{$item->path_ssketua}}</a><br>
                <a href="{{ asset("sa/$item->path_ssanggota1")}}">{{$item->path_ssanggota1}}</a><br>
                <a href="{{ asset("sa/$item->path_ssanggota2")}}">{{$item->path_ssanggota2}}</a><br>
                <a href="{{ asset("sa/$item->path_ssanggota3")}}">{{$item->path_ssanggota3}}</a><br>
                <a href="{{ asset("sa/$item->path_ssanggota4")}}">{{$item->path_ssanggota4}}</a><br>
                <a href="{{ asset("sa/$item->path_sscadangan")}}">{{$item->path_sscadangan}}</a>
              </td>
              <td>{{$item->nama_bayar}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->updated_at}}</td>
              @if ($item->asal_info == 'Other')
                <td>{{$item->info}}</td>
              @else
                <td>{{$item->asal_info}}</td>
              @endif
              <td>

                {{-- Form Verifikasi --}}
                
                  @if ($item->status != 0)
                    <form method="post" action="/daftaresport/verif">
                      @csrf
                      <input type="hidden" value="{{ $item->id }}" name="timId" />
                        <button class="btn btn-danger" type="submit">Unverif</button>
                    </form>
                  @else
                    <button
                    class="btn btn-primary VerifBtn"
                    data-timid="{{ $item->id}}"
                    data-namatim="{{ $item->nama_tim}}"
                    data-nopeserta="{{ $item->no_peserta}}">Verif</button>
                  @endif

              </td>
              <td>
                <button
                  class="btn btn-danger DelBtn"
                  type="button"
                  data-timid="{{ $item->id }}"
                  data-namatim="{{ $item->nama_tim }} ">Hapus</button>
              </td>
              <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}" type="button" >Edit</button>

                {{-- Update Form --}}
                <form method="POST" action="/daftaresport/update">
                  @csrf
                  <input type="hidden" name="timId" value="{{$item->id}}">
                  <div class="modal fade" id="editModal{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="text" class="form-control mb-2" name="no_peserta" value="{{$item->no_peserta}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Kota Asal </label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="asal_kota"value="{{$item->asal_kota}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Tim</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="nama_tim"value="{{$item->nama_tim}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Cabang Lomba</label>
                            <div class="col-auto">
                              <select class="custom-select mb-2" name="cabang_lomba" id="inlineFormInput" >
                                <option value="1" @if($item->cabang_lomba == "PUBGM") selected @endif>PUBGM</option>
                                <option value="2" @if($item->cabang_lomba == "DOTA") selected @endif>DOTA</option>
                                <option value="3" @if($item->cabang_lomba == "CSGO") selected @endif >CSGO</option>
                                <option value="3" @if($item->cabang_lomba == "Mobile Legends") selected @endif >Mobile Legends</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Ketua</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="nama_ketua"value="{{$item->nama_ketua}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Hp Ketua</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2"name="hp_ketua" value="{{$item->hp_ketua}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">WA Ketua</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="wa_ketua"value="{{$item->wa_ketua}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Line Ketua</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="line_ketua"value="{{$item->line_ketua}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Ketua</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_ketua"value="{{$item->id_ketua}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 1</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="nama_anggota1" value="{{$item->nama_anggota1}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Anggota 1</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_anggota1" value="{{$item->id_anggota1}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 2</label>
                            <div class="col-auto">
                              <input type="text" name="nama_anggota2"class="form-control mb-2" value="{{$item->nama_anggota2}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Anggota 2</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_anggota2" value="{{$item->id_anggota2}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 3</label>
                            <div class="col-auto">
                              <input type="text" name="nama_anggota3"class="form-control mb-2" value="{{$item->nama_anggota3}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Anggota 3</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_anggota3" value="{{$item->id_anggota3}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 4</label>
                            <div class="col-auto">
                              <input type="text" name="nama_anggota4"class="form-control mb-2" value="{{$item->nama_anggota4}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Anggota 4</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_anggota4" value="{{$item->id_anggota4}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota Cadangan</label>
                            <div class="col-auto">
                              <input type="text" name="nama_cadangan"class="form-control mb-2" value="{{$item->nama_cadangan}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">ID Anggota Cadangan</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="id_cadangan" value="{{$item->id_cadangan}}" id="inlineFormInput" >
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
  <button class="btn btn-primary" onclick="location.href='/daftaresport/download'">Download Data</button>
  </div>

  <!-- Delete Modal-->
  <form method="POST" action="/daftaresport/hapus">
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
  <form method="POST" action="/daftaresport/verif">
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

@endsection
