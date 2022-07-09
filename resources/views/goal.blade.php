@extends('layout')
@section('title', 'Create A Goal')
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
                <form action="/create_new_goal" method="POST" >
                    @csrf
                    
                    <div class="form_cont_holder">
                      <div class='tittle'>Set Up A Goal</div>
                      @if(session()->has('err_msg'))
                            <p class='errmsg'>{{session('err_msg')}}</p>
                      @endif
                        <input class="form-control" name='goal_name'  value="{{old('goal_name')}}" placeholder='Goal Name' type='text' required/>
                        @error('goal_name')
                            <p class='errmsg'>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form_cont_holder">
                    
                        <input class="form-control" name='amount'  value="{{old('amount')}}" placeholder='Amount' type='number' required />
                        @error('amount')
                            <p class='errmsg'>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form_cont_holder">
                        <label>Start Date</label>
                        <input class="form-control" name='start'  value="{{old('start')}}"  type='date' required />
                        @error('start')
                            <p class='errmsg'>{{$message}}</p>
                        @enderror
                        
                    </div>
                    <div class="form_cont_holder">
                        <label>End Date</label>
                        <input class="form-control" name='end'  value="{{old('start')}}"  type='date' required />
                        @error('end')
                            <p class='errmsg'>{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form_cont_holder" required>
                        <select name="freq" class="form-control">
                            <option value="">Select Frequency</option>
                            <option value="7">Weekly</option>
                            <option value="30">Monthly</option>
                        </select>
                    </div>

                        @error('freq')
                            <p class='errmsg'>{{$message}}</p>
                        @enderror

                   
                    <br /><br />
                
                <button type="submit" class='but'>Create Goal</button>

                <hr />
                
                
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