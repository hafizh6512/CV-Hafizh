<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if(session('auth_user')['roles'] == 'user')
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ URL::to('/user-leaderboard') }}" class="nav-link" style="display: flex; align-items: center; justify-content: center">
                    <img src="{{ asset('assets/images/medal.png') }}" style="max-width: 35px;" > 
                    <b id="user-point-nav">{{ getUserPoint(session('auth_user')['id']) }} Points</b>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link" style="display: flex; align-items: center; justify-content: center">
                    <img src="{{ asset('assets/images/coin-icon-3830.png') }}" style="max-width: 35px;" >
                    <b id="user-score-nav">{{ getUserScore(session('auth_user')['id']) }} Coin</b>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                {{-- <a href="javascript:void(0);" class="nav-link" style="display: flex; align-items: center; justify-content: center" data-toggle="modal" data-target="#points_to_key"> --}}
                <a href="javascript:void(0);" class="nav-link" style="display: flex; align-items: center; justify-content: center">
                    <img src="{{ asset('assets/images/gold-key.png') }}" style="max-width: 35px;" > 
                    <b>{{ getUserKey(session('auth_user')['id']) }} Key</b>
                </a>
            </li>
        @endif
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if(session('auth_user')['roles'] == 'admin')
        @if( getDateReset(4)  == date('Y-m-d') )
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;max-width: max-content;">
                <span class="dropdown-item dropdown-header">Hello Admin, please remember to reset Leaderboard on {{ getDateReset(4) }}</span>
            </div>
        </li>
        @endif
        @else
        @if( date('Y-m-d')  <=  getDateReset(6))
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;max-width: max-content;">
                <span class="dropdown-item dropdown-header">Hello {{ session('auth_user')['name'] }}, please remember to claim your reward on {{ getDateReset(5) }} - {{ getDateReset(6) }} 00.00</span>
            </div>
        </li>
        @endif
        @endif
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ session('auth_user')['name'] }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                

                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ session('auth_user')['name'] }}
                        <small>{{ session('auth_user')['email'] }}</small>
                    </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                    <a href="{{ URL::to('/logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>