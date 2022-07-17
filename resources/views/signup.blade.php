@extends('layout')
@section('title', 'Sign Up')
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
                <form action="/register" method="POST" >
                    @csrf
                    <div class="form_cont_holder">
                      <div class='tittle'>Sign Up</div>
                        <input class="form-control" name='first_name'  value="{{old('first_name')}}" placeholder='First Name' type='text'/>
                        @error('first_name')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_cont_holder">
                    
                        <input class="form-control" name='last_name'  value="{{old('last_name')}}" placeholder='Last Name' type='text' />
                        @error('last_name')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_cont_holder">
                        <input class="form-control" name='email'  value="{{old('email')}}" placeholder='Email' type='email' />
                        @error('email')
                            <span class='alert alert-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form_cont_holder">
                        <input class="form-control" name='password'  value="{{old('password')}}" placeholder='password' type='password' />
                        @error('password')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <br /><br />
                
                <button type="submit" class='but'>Sign Up</button>

                <hr />
                
                <div class='route'>Already Have An Account? <a href='/login'>Login</a></div>

                </form>
                <a href="/tet">test</a>
            </div>
        </div> 
        </div>

        </div>
        <div class="col-lg-3 col-sm-12 col-xm-12">

        </div>
    </div> 

</div>



@endsection