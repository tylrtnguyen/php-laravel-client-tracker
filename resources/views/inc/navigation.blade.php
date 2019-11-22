<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ (Auth::guest()) ? '/' : url('/home') }}">
                ClientTracker
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                        @if (!Auth::guest())
                            @if(Auth::user()->position=='Manager')
                                <li class="nav-item">
                                        <a class="nav-link active" href="/user">User</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link active" href="/log">Log</a>
                                </li>
                            @else
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/client">Client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/notification">Notification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/event">Event</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">{{ Auth::user()->firstname }} {{Auth::user()->lastname}} <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                            <li class="nav-item dropdown show"><a class="nav-link" href="/user/{{Auth::user()->id}}">Profile</a></li>
                                <li class="nav-item dropdown show">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </li>
                                </ul>
                          </li>
                        {{-- <li class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} {{Auth::user()->lastname}} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul> --}}
                        {{-- </li> --}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>
