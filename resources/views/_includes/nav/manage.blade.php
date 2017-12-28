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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="icon">
                              <i class="fa fa-lg fa-trophy m-r-5"></i>
                            </span>Bets
                             <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{route('manage.bets', ['type' => 'Today'])}}">Today</a>
                                  </li>
                                  <li><a href="{{route('manage.bets', ['type' => 'Active'])}}">Active</a>
                                  </li>
                                  <li><a href="{{route('manage.bets', ['type' => 'Verified'])}}">Verified</a>
                                  </li>
                              <li><a href="{{route('manage.bets', ['type' => 'Settled'])}}">Settled</a>
                              </li>
                              <li><a href="{{route('manage.bets', ['type' => 'All'])}}">All</a>
                                  </li>
                                </ul>
                              </li>
                                                          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="icon">
                              <i class="fa fa-lg fa-money m-r-5"></i>
                            </span>Accounts
                             <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{route('manage.transactions', ['type' => 'Credit'])}}">Credit</a>
                                  </li>
                                  <li><a href="{{route('manage.transactions', ['type' => 'Debit'])}}">Debit</a>
                                  </li>
                              <li><a href="#">Income</a>
                              </li>
                              <li><a href="{{route('manage.transactions', ['type' => 'All'])}}">All</a>
                                  </li>
                                  <li><a href="#">Finance Report</a>
                                </ul>
                              </li> 
                                    <li><a href="{{ route('users.index') }}"><span class="icon">
                              <i class="fa fa-lg fa-group m-r-5"></i>
                              </span>Users</a></li>
                            <li><a href="{{ route('manage.banks') }}"><span class="icon">
                              <i class="fa fa-lg fa-bank m-r-5"></i>
                              </span>Banks</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#"><span class="icon">
                              <i class="fa fa-lg fa-trophy m-r-5"></i>
                              </span>Games</a>
                                  </li>
                                    <li><a href="#"><span class="icon">
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
