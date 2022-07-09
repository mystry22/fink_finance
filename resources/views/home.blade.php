@extends('layout')
@section('title', 'Fink Finance')
@section('content')
@include('/utils/Nav')

<section id="hero" class="d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
      <h1>Let us plan your savings</h1>
      <h2>We are team of talented Financial Experts that helps you plan your earnings</h2>
      <div class="d-flex">
        <a href="/signup" class="btn-get-started scrollto">Get Started</a>
        
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img">
      <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section>

<section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-laptop"></i></div>
              <h4 class="title"><a href="/signup">Financial Independence</a></h4>
              <p class="description">Enjoy the status of having enough income or wealth sufficient to pay one's living expenses for the rest of one's life without having to be employed or dependent on others</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="/signup">Save Ahead</a></h4>
              <p class="description">We walk you throuugh the 50-30-20 rule: Spend 50 percent on needs, 30 percent on wants and put 20 percent toward savings and paying off debt</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-clipboard-data"></i></div>
              <h4 class="title"><a href="/signup">Trust Partner</a></h4>
              <p class="description">We are open and acknowledge feelings & practice being vulnerable communicate about key issues in your relationship.</p>
            </div>
          </div>
        </div>

      </div>
    </section>


@endsection
