@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')

<h4 class="ml-4">Daftar Artikel Medium</h4>
<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#MediumCreate">Create</button>

<form method="POST" action="/mediumadmin/create" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="MediumCreate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mediumupdateTitle">Create an Article</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="mediumupdateBody">
            <div class="form-group">
                <label>judul</label>
                <input name="judul" type="text" class="form-control">                
            </div>
            <div class="form-group">
                <label>
                Konten
                </label>
                <textarea name="konten" rows="3" type="text" class="form-control"></textarea>                
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input name="path_gambar" type="file" class="form-control-file">                                                                        
                {{-- <small><a href="{{ $item->path_gambar }}"></a></small> --}}
            </div>              
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Create</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap" id="dataTableMedium" style="width:100%">
        <thead>
            <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Path_Gambar</th>                    
            <th>Waktu Buat</th>
            <th>Waktu Update</th>                                        
            <th>Hapus</th>
            <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->judul}}</td>
                <td>{!! $item->konten !!}</td>
                <td>
                    <a href="{{ asset('medium/'.$item->path_gambar) }}">{{ $item->path_gambar }}</a>
                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <button
                    class="btn btn-danger mediumDel"                
                    type="button"                    
                    data-kontenid="{{ $item->id }}"
                    data-judul="{{ $item->judul }}"
                    >
                    Hapus
                    </button>
                </td>
                <td>
                    <button type="button" id="mediumedit" class="btn btn-warning" data-toggle="modal" data-target="#MediumUpdateModal{{ $item->id }}">Edit</button>

                    <form method="POST" action="/mediumadmin/update" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="MediumUpdateModal{{ $item->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="mediumupdateTitle">Update {{ $item->judul }}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body" id="mediumupdateBody">
                                <div class="form-group">
                                    <label for="judul">judul</label>
                                    <input name="judul" type="text" class="form-control" id="judul" value="{{ $item->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="konten">Konten</label>
                                    <textarea name="konten" rows="3" type="text" class="form-control" id="konten">{{ $item->konten }}</textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="path_gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="path_gambar">                                                                        
                                    <small><a href="{{ $item->path_gambar }}"></a></small>
                                </div> --}}
                                  <input type="hidden" name="kontenid" value="{{ $item->id }}">                                  
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit">Update</button>
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
</div>

<!-- Delete Modal-->
<form method="POST" action="/mediumadmin/delete">
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
    
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              