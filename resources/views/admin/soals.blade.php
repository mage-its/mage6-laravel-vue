@extends('layouts.dashboardtemplateadmin')

@section('isidashboard')
<h4 class="ml-4">Daftar Soal</h4>
<button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#soalcreate">Create</button>

<form method="POST" action="/soals/storesoal" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="soalcreate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="soalsupdateTitle">Create a Soal</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="soalsupdateBody">
            <div class="form-group">
                <label>Difficulty</label>
                <select class="form-control" id="difficulty" name="difficulty" required>
                  <option value="easy">Easy</option>
                  <option value="normal">Normal</option>
                  <option value="hard">Hard</option>
                  <option value="king">King</option>                  
                </select>
            </div>
            <div class="form-group">
                <label>
                Text Soal
                </label>
                <textarea name="text_soal" rows="3" type="text" class="form-control" required></textarea>                
            </div>
            <div class="form-group">
              <label>Jenis Soal</label>
              <select class="form-control" id="jenis_soal" name="jenis_soal" required>
                <option value="program">Program</option>
                <option value="fisika">Fisika</option>
                <option value="logika">logika</option>                                
              </select>
          </div>
          <div class="form-group">
            <label>Answer Soal</label>
            <input name="answer_soal" type="text" class="form-control" required>                
          </div>
          <div class="form-group">
              <label>Image Soal</label>
              <input name="image_soal" type="file" class="form-control-file" accept=".png,.jpg,.jpeg" required>                                                                        
              {{-- <small><a href="{{ $item->path_gambar }}"></a></small> --}}
          </div>              

          <div class="form-group">
            <label for="status_soal">Status Soal</label>
            <select class="form-control" id="status_soal" name="status_soal">
              <option value="ujicoba">Uji Coba</option>
              <option value="asli">Asli</option>                                    
            </select>
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
        <table class="table table-striped table-bordered display nowrap" id="dataTableSoal" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Difficulty</th>
                <th>Jenis Soal</th>
                <th>Text Soal</th>                    
                <th>Answer Soal</th>
                <th>Image Soal</th>
                <th>Status Soal</th>
                <th>Updated At</th>                     
                <th>Preview</th>
                <th>Hapus</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($soals as $soal)
            <tr>
                <td>{{$soal->id}}</td>
                <td>{{$soal->difficulty}}</td>
                <td>{{$soal->jenis_soal }}</td>
                <td>{{$soal->text_soal }}</td>
                <td>{{$soal->answer_soal }}</td>
                <td>
                    <a href="{{ asset('olim/'.$soal->image_soal) }}">{{ $soal->image_soal }}</a>
                </td>               
                <td>{{$soal->status_soal }}</td>
                <td>{{$soal->updated_at}}</td>
                <td>
                  <button class="btn btn-success" onclick="window.location.href='/soals/previewsoal/{{ $soal->id }}'">Preview</button>                
                </td>
                <td>
                    <button
                    class="btn btn-danger soalDel"                
                    type="button"                    
                    data-soalid="{{ $soal->id }}"
                    data-jenis_soal="{{ $soal->jenis_soal }}"
                    >
                    Hapus
                    </button>
                </td>                
                <td>
                    <button type="button" id="soaledit" class="btn btn-warning" data-toggle="modal" data-target="#SoalsUpdateModal{{ $soal->id }}">Edit</button>

                    <form method="POST" action="/soals/editsoal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="SoalsUpdateModal{{ $soal->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="soalsupdateTitle">Update Soalid {{ $soal->id }}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body" id="soalsupdateBody">
                                <div class="form-group">
                                  <label for="difficulty{{ $soal->id }}">Difficulty</label>
                                  <select class="form-control" id="difficulty{{ $soal->id }}" name="difficulty">
                                    <option value="easy" @if($soal->difficulty === "easy") echo selected @endif>Easy</option>
                                    <option value="normal" @if($soal->difficulty === "normal") echo selected @endif>Normal</option>
                                    <option value="hard" @if($soal->difficulty === "hard") echo selected @endif>Hard</option>
                                    <option value="king" @if($soal->difficulty === "king") echo selected @endif>King</option>                  
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="text_soal{{ $soal->id }}">Text Soal</label>
                                    <textarea name="text_soal" rows="3" type="text" class="form-control" id="text_soal{{ $soal->id }}">{{ $soal->text_soal }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_soal{{ $soal->id }}">Jenis Soal</label>
                                    <select class="form-control" name="jenis_soal" required id="jenis_soal{{ $soal->id }}">
                                      <option value="program" @if($soal->difficulty === "program") echo selected @endif>Program</option>
                                      <option value="fisika" @if($soal->difficulty === "fisika") echo selected @endif>Fisika</option>
                                      <option value="logika" @if($soal->difficulty === "logika") echo selected @endif>logika</option>                                
                                    </select>
                                </div>                                
                                <div class="form-group">
                                  <label for="answer_soal{{ $soal->id }}">Answer Soal</label>
                                  <input name="answer_soal" type="text" class="form-control" id="answer_soal{{ $soal->id }}" value="{{ $soal->answer_soal }}">
                                </div>
                                <div class="form-group">
                                  <label for="image_soal{{ $soal->id }}">Gambar Soal</label>
                                  <input type="file" class="form-control-file" name="image_soal" id="image_soal{{ $soal->id }}">
                                  <small><a href="{{asset('olim/'.$soal->image_soal)}}" target="_blank">Lihat Gambar</a></small>
                                </div>
                                <div class="form-group">
                                  <label for="status_soal{{ $soal->id }}">Status Soal</label>
                                  <select class="form-control" id="status_soal{{ $soal->id }}" name="status_soal">
                                    <option value="ujicoba" @if($soal->status_soal === "ujicoba") echo selected @endif>Uji Coba</option>
                                    <option value="asli" @if($soal->status_soal === "asli") echo selected @endif>Asli</option>                                    
                                  </select>
                                </div>                                
                                  <input type="hidden" name="soalid" value="{{ $soal->id }}">                                  
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
<form method="POST" action="/soals/deletesoal">
    @csrf
    <div class="modal fade" id="DelModalSoal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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