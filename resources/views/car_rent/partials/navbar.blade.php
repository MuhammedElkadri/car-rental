	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	      <div class="container">
	          <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
	          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	              <span class="oi oi-menu"></span> Menu
	          </button>

	          <div class="collapse navbar-collapse" id="ftco-nav">
	              <ul class="navbar-nav ml-auto">
	                  <li class="nav-item {{ Request::is('home') ? 'active' : '' }} "><a href="{{auth()->check()? route('dashboard.index') : route('home.index')  }}" class="nav-link">الرئيسية</a></li>
	                  <li class="nav-item  {{ Request::is('cars') ? 'active' : '' }} "><a href="{{ route('cars.index') }}" class="nav-link">السيارات</a></li>
	                  <li class="nav-item  {{ Request::is('contact') ? 'active' : '' }} "><a href="contact.html" class="nav-link">اتصل بنا</a></li>

	                  @if(Auth::check())
	                  <li class="nav-item">
	                      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
	                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                          @csrf
	                      </form>
	                  </li>
	                  @else
	                  <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a></li>
	                  <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">التسجيل</a></li>
	                  @endif

	              </ul>
	          </div>
	      </div>
	  </nav>