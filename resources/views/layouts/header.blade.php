<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Navigation</h4>
          <ul class="list-unstyled">
            <li><a href="/" class="text-white">Main</a></li>
            <li><a href="{{route('books')}}" class="text-white">Books</a></li>
            <li><a href="{{route('authors')}}" class="text-white">Authors</a></li>
            <li><a href="{{route('home')}}" class="text-white">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
      @guest
          <div class="btn-margin_right"> 
            <a href="{{ route('login') }}" class="btn btn-primary my-2">{{ __('Login') }}</a>
          </div>  
          @if (Route::has('register'))
            <div class="btn-margin_right">
              <a class="btn btn-secondary my-2" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>    
          @endif                    
      @else
        <div class="btn-margin_right">
          <a class="btn btn-primary my-2" href="{{ route('logout') }}"
              onclick="
                  event.preventDefault();
                  document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>     
      @endguest     
  </div>
</header>

<main role="main">