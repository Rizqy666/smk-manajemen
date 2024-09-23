<div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block g-6">SIPEBAR</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        {{-- <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">
                    {{ count(Session::get('notifications', [])) }}
                </span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                    You have {{ count(Session::get('notifications', [])) }} new notifications
                    <a href="{{ route('notifications.index') }}" id="show-all-notifications">
                        <span class="badge rounded-pill bg-primary p-2 ms-2">View all</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                @foreach (Session::get('notifications', []) as $notification)
                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>{{ $notification['title'] }}</h4>
                            <p>{{ $notification['message'] }}</p>
                            <p>{{ $notification['time'] }}</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                @endforeach

                <li class="dropdown-footer">
                    <a href="{{ route('notifications.index') }}" id="show-all-notifications-link">Show all
                        notifications</a>
                </li>
            </ul><!-- End Notification Dropdown Items -->

        </li>
        <!-- End Notification Nav -->

        <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">{{ $chats->count() }}</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                    You have {{ $chats->count() }} new messages
                    <a href="{{ route('chats.index') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                            all</span></a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                @foreach ($chats as $chat)
                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>{{ $chat->user->name }}</h4>
                                <p>{{ $chat->message }}</p>
                                <p>{{ $chat->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                @endforeach

                <li class="dropdown-footer">
                    <a href="{{ route('chats.index') }}">Show all messages</a>
                </li>
            </ul><!-- End Messages Dropdown Items -->
        </li> --}}


        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <div class="profile-circle-header">
                    <span>{{ strtoupper(substr(Auth::user()->name, 0, 3)) }}</span> <!-- Menggunakan Auth::user() -->
                </div>
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a>
            <!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <!-- User Info -->
                <li class="dropdown-header">
                    <h6>{{ Auth::user()->name }}</h6>
                    <span>{{ Auth::user()->role }}</span>

                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Profile -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.complete') }}">
                        <i class="bi bi-person"></i>
                        <span>Profile Details</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <!-- Settings -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Notifications -->
                {{-- <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('notifications') }}">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                        <span class="badge bg-primary ms-auto">{{ Auth::user()->unreadNotifications->count() }}</span>
                    </a>
                </li> --}}
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Help -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Logout -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul><!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->
