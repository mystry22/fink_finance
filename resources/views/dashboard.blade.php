@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="dashboard">
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                
                   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                  
                <div class="one_bar">
                @if(session()->has('msg'))
                            <p class='goodmsg'>{{session('msg')}}</p>
                @endif
                    @auth

                  <div class="tittle"><span>Welcome  {{auth()->user()->first_name}}</span></div>
                  
                 
                            @if(auth()->user()->img)
                                @php
                                    $img = auth()->user()->img;
                                    
                                @endphp
                                <div class="prof_pic">
                                
                                <img  src="{{asset('assets/img/upload/').'/'.$img}}" class="crop_img"/>
                            
                                </div>
                            @else
                                <div class="prof_pic">
                                
                                <img  src="{{asset('assets/img/upload/pro.png')}}" class="crop_img"/>
                            
                                </div>
                            @endif
                            
                            <br />
                      
                            <form action="/img_upload" method="post" enctype="multipart/form-data" >
                              @csrf
                              <input type="file" name="img" class="form-control"/><br /> <br />
                              <input type="submit" value="Upload" class="but" />
                            </form>
                        
                </div>
                @endauth
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="one_bar">

                        <div class="tittle"><span>Savings Plan</span></div>

                        <h5>Start A Goal <i class="bi bi-ball" ></i> </h5>
                        <br />

                        <------Plan Selection----->
                        <br /><br />

                        @if(auth()->user()->plan_id)
                            Happy Saving for your Goal {{auth()->user()->goal}}
                        @else
                            <a href="/create_goal">Create a Goal <i class="bi bi-arrow-right fa-lg" ></i></a>
                        @endif
                    </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="one_bar">

                    <div class="tittle"><span>Plan Schedule</span></div>

                    <h5>Consistency Is Key</h5>
                    

                    <a href="/plan_schedule">Payment Schedule <i class="bi bi-arrow-right fa-lg" ></i></a><br /><br />
                    <form method='post' action='/logout'>
                        @csrf
                        <a href=''><button type='submit' class='butt'>Logout</button> </a>
                    </form>

                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="img_class">
                            <img src="{{asset('assets/img/man-with-laptop-light.png')}}" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">

                        <div class="one_side">

                            <div class="tittle"><span>Transaction History</span></div>

                            <p>
                            The transaction history or account history is the detailed portion of any financial statement. 
                            The top of a bank statement for a 30-day period reports the account's available balance as 
                            well as the total amount of deposits and the total amount of 
                            withdrawals for the period. This is essentially a high-level overview.
                            </p>

                            <p>
                                You currently have  no Transaction History
                            </p>

                        </div>
                    </div>
                </div>

                
            </div>
        </div>

    </div>
</div>