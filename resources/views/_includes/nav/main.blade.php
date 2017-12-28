        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="Brand" src="{{ asset('img/bstrp.png') }}">  
                    
                    </a>
                    
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
@if (Auth::user()->hasRole('bank_user'))
    @if(Auth::user()->bank != "")
                        <li><a  href="{{route('bank.dashboard')}}">
                    <img src = "{{ asset('uploads/' . Auth::user()->bank->image_path)}}" alt="Bank Logo" height="20">
                    </a></li>
                    <li><a  href="{{route('bank.dashboard')}}">  {{Auth::user()->bank->name}} Panel    </a></li>
    @endif
@endif

                    <li><a href="{{route('bet_list')}}"><span class="icon"><i class="fa fa-lg fa-trophy m-r-5"></i>
                              </span>Bets</a>
                    </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('accounts.index')}}"><span class="icon">
                              <i class="fa fa-lg fa-user m-r-10"></i>
                              </span>Update Profile</a>
                                  </li>
                            <li><a href="{{route('accounts.index')}}"><span class="icon">
                              <i class="fa fa-lg fa-key m-r-5"></i>
                              </span>Change Password</a>
                                  </li>
                                    <li><a href="{{route('accounts.index')}}"><span class="icon">
                              <i class="fa fa-lg fa-money m-r-5"></i>
                              </span>Accounts</a>
                                  </li>
                                  <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="icon">
                              <i class="fa fa-lg fa-sign-out m-r-5"></i>
                              </span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
