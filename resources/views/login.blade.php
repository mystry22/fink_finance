@extends('layout')
@section('title', 'Login')
@section('content')
@include('/utils/Nav')

<div class="container">

    <div class="row">
        <div class="col-lg-3 col-sm-12 col-xm-12">

        </div>
        <div class="col-lg-6 col-sm-12 col-xm-12">

        <div class="before_form">
        <div class="form_container">
            <div class="form_body">
                <form action="/authe" method="POST" >
                    @csrf

                    <div class="form_cont_holder">
                        <div class='tittle'>Login</div>
                        
                        <input type="text" name="email" class="form-control" id="name" value="{{old('email')}}" placeholder='Email' required>
                        @error('email')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form_cont_holder">
                        
                        <input type="password" class="form-control" name="password" id="pass" value="{{old('password')}}" placeholder='Password' required>
                        @error('password')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                    <br /> 
                    <br />
                
                  <button type="submit" class='but'>Login</button>
                  <hr />
                  <div class='route'>Don't Have An Account? <a href='/signup'>Signup</a></div>
                </form>
            </div>
        </div> 
        </div>

        </div>
        <div class="col-lg-3 col-sm-12 col-xm-12">

        </div>
    </div> 

</div>



@endsection