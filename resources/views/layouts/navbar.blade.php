<!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Akun</span>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Logout
                            </button>
                        </form>    
                        </a>
                    </a>
                </li>
            </ul>
        </nav>
<!-- /.navbar -->
