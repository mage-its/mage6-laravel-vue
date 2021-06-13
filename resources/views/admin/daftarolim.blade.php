@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
  <h4>Daftar Peserta Olimpiade</h4>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered display nowrap" id="dataTable" style="width:100%">
        <thead>
          <tr>
            <th>No.</th>
            <th>No.Peserta</th>
            <th>Email</th>
            <th>Asal Sekolah</th>
            <th>Asal Alamat</th>
            <th>Asal Kota</th>
            <th>Nama Tim</th>
            <th>Nama Ketua</th>
            <th>Hp Ketua</th>
            <th>Wa Ketua</th>
            <th>Line Ketua</th>
            <th>Nama Anggota 1</th>
            <th>Nama Anggota 2</th>
            <th>Path Kartu Pelajar Ketua</th>
            <th>Path Kartu Pelajar Anggota 1</th>
            <th>Path Kartu Pelajar Anggota 2</th>
            <th>Path Bukti Bayar</th>
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
              <td>{{$item->asal_sekolah}}</td>
              <td>{{$item->asal_alamat}}</td>
              <td>{{$item->asal_kota}}</td>
              <td>{{$item->nama_tim}}</td>
              <td>{{$item->nama_ketua}}</td>
              <td>{{$item->hp_ketua}}</td>
              <td>{{$item->wa_ketua}}</td>
              <td>{{$item->line_ketua}}</td>
              <td>{{$item->nama_anggota1}}</td>
              <td>{{$item->nama_anggota2}}</td>
              <td>
                <a href="{{ asset("kp/$item->path_ktpketua")}}">{{$item->path_ktpketua}}</a>
              </td>
              <td>
                <a href="{{ asset("kp/$item->path_ktpanggota1")}}">{{$item->path_ktpanggota1}}</a>
              </td>
              <td>
                <a href="{{ asset("kp/$item->path_ktpanggota2")}}">{{$item->path_ktpanggota2}}</a>
              </td>
              <td>
                <a href="{{ asset("bb/$item->path_buktibayar")}}">{{$item->path_buktibayar}}</a>
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
                  @if ($item->status != false)
                    <form method="post" action="/daftarolim/verif">
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
                <form method="POST" action="/daftarolim/update">
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
                            <label class="col-form-label" for="inlineFormInput">Asal Sekolah</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="asal_sekolah"value="{{$item->asal_sekolah}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Alamat Sekolah</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="asal_alamat"value="{{$item->asal_alamat}}" id="inlineFormInput" >
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
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 1</label>
                            <div class="col-auto">
                              <input type="text" class="form-control mb-2" name="nama_anggota1" value="{{$item->nama_anggota1}}" id="inlineFormInput" >
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label class="col-form-label" for="inlineFormInput">Nama Anggota 2</label>
                            <div class="col-auto">
                              <input type="text" name="nama_anggota2"class="form-control mb-2" value="{{$item->nama_anggota2}}" id="inlineFormInput" >
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
  <button class="btn btn-primary" onclick="location.href='/daftarolim/download'">Download Data</button>
  </div>

  <!-- Delete Modal-->
  <form method="POST" action="/daftarolim/hapus">
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
  <form method="POST" action="/daftarolim/verif">
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
