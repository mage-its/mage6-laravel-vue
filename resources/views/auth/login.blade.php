@extends('layouts.app2')
@section('konten')
    <!-- form -->      
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 form shadow">
            <form class="text-center" method="POST" action="{{ route('login') }}">
              @csrf
              <h1 class="header">Login</h1>
              @error('email')
              <p style="color: red">{{ $message }}</p>
              @enderror
              @error('password')
              <p style="color: red">{{ $message }}</p>
              @enderror              
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  placeholder="Email"
                  autocomplete="off"
                  name="email"

                />
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  placeholder="Password"
                  name="password"
                />
              </div>
              <button type="submit" class="btn btn-primary gradient-2 mx-auto">
                Submit
              </button>
              @if(Route::has('password.request'))              
              <p>Forgot Your Password? <a href="{{ route('password.request') }}">Reset</a></p>
              @endif
            </form>
          </div>
        </div>      
@endsection

