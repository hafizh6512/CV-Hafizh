<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ URL::to('/') }}" class="brand-link">
        <img src="{{ asset('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Menu</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ URL::to('/') }}" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if(session('auth_user')['roles'] == 'admin')
                    <li class="nav-item">
                        <a href="{{ URL::to('/users') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/category') }}" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>Category</p>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ URL::to('/book') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>Books</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/challenge') }}" class="nav-link">
                            <i class="nav-icon fa fa-bullseye"></i>
                            <p>Challenge</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/user-points') }}" class="nav-link">
                            <i class="nav-icon fa fa-coins"></i>
                            <p>User Point</p>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ URL::to('/user-leaderboard') }}" class="nav-link">
                            <i class="nav-icon fa fa-sort-amount-up"></i>
                            <p>Leaderboard</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/rewards') }}" class="nav-link">
                            <i class="nav-icon fa fa-gift"></i>
                            <p>Reward Leaderboard</p>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/redeem') }}" class="nav-link">
                            <i class="nav-icon fa fa-hand-holding-usd"></i>
                            <p>Reedem Request</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ URL::to('/item') }}" class="nav-link">
                            <i class="nav-icon fa fa-box"></i>
                            <p>Shop</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/item-transaction') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>Item Transaction</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/review') }}" class="nav-link">
                            <i class="nav-icon fa fa-comments"></i>
                            <p>Reviews</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ URL::to('/point-setting') }}" class="nav-link">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>Activity Setting</p>
                        </a>
                    </li>

                @else
                    <li class="nav-item">
                        <a href="{{ URL::to('/list-book') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>Books</p>
                        </a>
                    </li> 

                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/rewards-list') }}" class="nav-link">
                            <i class="nav-icon fa fa-gift"></i>
                            <p>Reward List</p>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ URL::to('/user-leaderboard') }}" class="nav-link">
                            <i class="nav-icon fa fa-sort-amount-up"></i>
                            <p>Leaderboards</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('/shop') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>Shop</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ URL::to('/shop-history') }}" class="nav-link">
                            <i class="nav-icon fa fa-hourglass-half"></i>
                            <p>Shop History</p>
                        </a>
                    </li> --}}
                @endif
                
            </ul>
        </nav>
    </div>
</aside>
