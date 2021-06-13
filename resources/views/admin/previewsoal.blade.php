<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset ('css/login-register.css') }}" />
    <link rel="shortcut icon" href="{{ asset ('img/logo.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">     --}}    
    <title>Preview Soal | MAGE6</title>
  </head>
  <body>    
        
    
      <!-- form -->
    <div class="container" style="margin-top: 100px">
        @if($soal !== null) 
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="h5">Soal Nomor {{ $soal->id }} (Difficulty: {{ $soal->difficulty }}, Pelajaran: {{ $soal->jenis_soal }})</div>
            </div>
        </div>     
        <div class="row" style="margin-top: 50px">            
            <div class="col-12 col-md-6 d-flex justify-center">
                <img src="{{ asset('olim/'.$soal->image_soal) }}" style="height: 50vh; object-fit: contain; overflow-x: hidden;">
            </div>
            <div cols="12" md="6" class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center mt-11 mt-sm-0">                                                 
                <div style="width: 75%">
                    <div>{{ $soal->text_soal }}</div>                    
                    <form class="mt-3">                        
                        <div class="form-group">
                            <input class="form-control" rows="" style="border-radius: 10px">                                                
                        </div>                        
                    </form>                                                                                  
                </div>                
            </div>
        </div>
        @else
        <div class="row d-flex justify-content-center">
          <div class="col-6">
            <div class="alert alert-info">Tidak ditemukan soal</div>
          </div>
        </div>
        @endif
        <div class="row d-flex justify-content-between" style="margin-top: 50px">
          <div class="col-3">
            <button class="btn btn-info justify-content-start" onclick="window.location.href='/soals/previewsoal/{{ $param - 1 }}'">Back</button>
          </div>
          <div class="col-3 d-flex justify-content-end">
            <button class="btn btn-info" onclick="window.location.href='/soals/previewsoal/{{ $param + 1 }}'">Next</button>
          </div>
        </div>
    </div>
      <!-- akhir form -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>    
  </body>
</html>
