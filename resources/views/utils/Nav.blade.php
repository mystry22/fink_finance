<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">Fink</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          
          @auth
          
          <li> <span > Hi: {{auth()->user()->first_name}}</span></li>
          <li>
            <form method='post' action='/logout'>
              @csrf
              <a href=''><button type='submit' class='butt'>Logout</button> </a>
            </form>
          </li>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto active" href="/dashboard">Dashboard</a></li>
          @else
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/login">login</a></li>
          <li><a class="getstarted scrollto" href="/signup">Get Started</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>