@extends('layout')

@section('content')
<div class="container">
    <div class="dashboard">
        <div class='row'>
            <div class='col-lg-3 col-md-12 col-sm-12'>
                
                   
            </div>

            <div class='col-lg-6 col-md-12 col-sm-12'>
                     @if(session()->has('good_msg'))
                            <p class='goodmsg'>{{session('good_msg')}}</p>
                      @endif
                  
                   
                    @auth
                        @if(auth()->user()->plan_id)
                        <img src="{https://www.google.com/imgres?imgurl=https%3A%2F%2Ffreight.cargo.site%2Ft%2Foriginal%2Fi%2F6e26993179a1fa0b405790ac901533f469978ec4993dad02e25ae5147108e82a%2FFink-Logo_Lg-01.png&imgrefurl=https%3A%2F%2Fandifink.com%2FLogos-Branding&tbnid=DlzzAQGdFCXp5M&vet=12ahUKEwi9uKi2x-v4AhVS8IUKHSjKDBgQMygHegUIARDLAQ..i&docid=8tiogMBxftXl_M&w=242&h=172&q=fink%20loggo&client=firefox-b-d&ved=2ahUKEwi9uKi2x-v4AhVS8IUKHSjKDBgQMygHegUIARDLAQ" />
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