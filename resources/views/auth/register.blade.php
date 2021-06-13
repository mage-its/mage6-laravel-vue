@extends('layouts.app2register')

@section('konten')
    <!-- form -->
    
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 form shadow">
            <form class="text-center" method="POST" action="{{ route('register') }}">
            @csrf
              <h1 class="header">Register</h1>
              @error('name')                              
              <p style="color: red;">{{ $message }}</p>                
              @enderror
              @error('email')                              
              <p style="color: red;">{{ $message }}</p>                
              @enderror
              @error('phone')                              
              <p style="color: red;">{{ $message }}</p>                
              @enderror
              @error('password')                              
              <p style="color: red;">{{ $message }}</p>                
              @enderror
              <div class="form-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
              </div>
              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">
              </div>            
              <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
              </div>
              <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
              </div>
              <button type="submit" class="btn btn-primary gradient-2 mx-auto">
                Submit
              </button>
              <p>Already Have Account? <a href="{{route('login')}}">Login</a></p>
            </form>
          </div>
        </div>              
    <!-- akhir form -->
@endsection