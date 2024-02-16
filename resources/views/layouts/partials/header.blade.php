<nav class="navbar sticky-top navbar-light bg-light d-flex justify-content-between">
    <div class="max-w-6xl sm:px-6 lg:px-8">
        <a class="navbar-brand" href="{{ route('home') }}">Laravel project</a>
    </div>
    <div class="search d-flex align-items-center">
        @if(!Route::is('all-items'))
            <form class="form-inline my-2 my-lg-0" action="{{ route('all-items') }}">
                <input class="form-control mr-sm-2 animated" type="search" placeholder="Search..." name="search" value="{{Request::input('search')}}" aria-label="Search">
            </form>
        @endif
        @if(auth()->check())
            <a id="make-request" class="d-flex align-items-center pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
                <sup>0</sup>
            </a>
            <div class="btn-group dropstart">
                <ul class="dropdown-menu">
                    <li><h4>{{ auth()->user()->name }}</h4></li>
                </ul>
            </div>
        @else
            <a class="profile-btn" href="{{ route('login') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </a>
        @endif
    </div>
</nav>
