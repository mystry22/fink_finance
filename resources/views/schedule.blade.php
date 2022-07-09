@extends('layout')
@section('title', 'Payment Schedule')
@section('content')
<div class="container">
    <div class="dashboard">
        <div class='row'>
            <div class='col-lg-3 col-md-12 col-sm-12'>
                
                   
            </div>

            <div class='col-lg-6 col-md-12 col-sm-12'>
                     @if(session()->has('msg'))
                            <p class='goodmsg'>{{session('msg')}}</p>
                      @endif
                  
                   
                    @auth
                        @if(auth()->user()->plan_id)
                         <img src="{{asset('/assets/img/favicon.png')}}" />
                           <p>Hi {{auth()->user()->first_name}} Kindly  See Your Payment Schedule for Your Goal {{auth()->user()->goal}} </p>
                            <table class='table'>
                                <tr>
                                    <th>Sn</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>      
                                  @php
                                    if(auth()->user()->freq == 7){
                                        $freq = 7;
                                       
                                    }elseif(auth()->user()->freq == 30){
                                        $freq = 30;
                                       
                                    }
                                  @endphp

                                @for($i = 1; $i <=auth()->user()->no_payment; $i++)
                                            @php
                                            $start_date = auth()->user()->start;
                                             $next_interval = ($i -1) * $freq;
                                             $newDate = date('Y-m-d',strtotime($start_date.'+ '.$next_interval.' days'));
                                            @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>Payment for goal {{auth()->user()->goal}}</td>
                                        <td>
                                           {{$newDate}}
                                        </td>
                                        <td>{{auth()->user()->single_payment}}</td>
                                    </tr>
                                @endfor
                            </table>

                                <form action="/getpdf" method="get">
                                    @csrf
                                    <button type="submit" class="but">Send PDF</button>
                                </form>
                                <a href='/dashboard'>Dashboard</a> 
                            @else
                                <p>You have no Current Goal Please click <a href='/create_goal'>here</a> to start a plan</p>
                            
                        @endif

                      
                    @endauth
                 
            </div>

            <div class='col-lg-3 col-md-12 col-sm-12'>
                
                   
            </div>
        </div>

    </div>
</div>