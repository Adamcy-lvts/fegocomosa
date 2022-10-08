<!DOCTYPE html>
<html class="dark" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Fegocomosa</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/ckeditor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-6/css/all.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles


    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" charset="utf-8"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <x-notifications />

    <div class="app-container">
        <div class="app-left">
            <button class="close-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
            <div class="app-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bar-chart-2">
                    <line x1="18" y1="20" x2="18" y2="10" />
                    <line x1="12" y1="20" x2="12" y2="4" />
                    <line x1="6" y1="20" x2="6" y2="14" />
                </svg>
                <span> <a href="/home">FEGOCOMOSA</a> </span>
            </div>

            <ul class="nav-list">
                <li class="nav-list-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('dashboard') }}">
                        <i class="fal fa-lg fa-tachometer-alt"></i>
                        <span class="feather feather-columns ml-3">Dashboard</span>
                    </a>
                </li>

                <li class="nav-list-item {{ Request::is('admin/roles') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('roles') }}">
                        <i class="fal fa-lg fa-user-tag"></i>
                        <span class="feather feather-columns ml-3">Roles</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/permissions') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('permissions') }}">
                        <i class="fal fa-lg fa-user-lock"></i>

                        <span class="feather feather-columns ml-3">Permissions</span>
                    </a>
                </li>
                @if (auth()->user()->hasAnyRole(['Super-Admin', 'admin']))
                    <li class="nav-list-item {{ Request::is('admin/members') ? 'active' : '' }}">
                        <a class="nav-list-link" href="{{ route('members.data') }}">
                            <i class="fal fa-lg fa-users"></i>
                            <span class="feather feather-columns feather feather-columns ml-3">Members</span>
                        </a>
                    </li>
                @endif
                <li class="nav-list-item {{ Request::is('admin/payments') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('payments') }}">
                        <i class="fa-thin fa-lg fa-money-check-dollar-pen"></i>
                        <span class="feather feather-columns feather feather-columns ml-3">Payments</span>
                    </a>
                </li>
                @can('access article')
                    <li class="nav-list-item {{ Request::is('admin/posts') ? 'active' : '' }}">
                        <a class="nav-list-link" href="{{ route('posts.data') }}">
                            <i class="fal fa-lg fa-newspaper"></i>
                            <span class="feather feather-columns ml-3"> Post</span>
                        </a>
                    </li>
                @endcan
                @can('access events')
                    <li class="nav-list-item {{ Request::is('admin/events') ? 'active' : '' }}">
                        <a class="nav-list-link" href="{{ route('event.data') }}">
                            <i class="fal fa-lg fa-calendar-alt"></i>
                            <span class="feather feather-columns ml-3">Event</span>
                        </a>
                    </li>
                @endcan
                <li class="nav-list-item {{ Request::is('admin/projects') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('projects.data') }}">
                        <i class="fa-light fa-lg  fa-bars-progress"></i>
                        <span class="feather feather-columns ml-3">Projects</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/procategory') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('profession.category') }}">
                        <i class="fa-light fa-briefcase fa-lg"></i>
                        <span class="feather feather-columns ml-3">Profession Category</span>
                    </a>
                </li>
                <div class="tabs">
                    <div class="tab">
                        <input class="check" type="checkbox" id="chck1">
                        <label class="tab-label" for="chck1"> <i
                                class="ml-2 mt-2 fa-light fa-box-dollar fa-lg"></i>
                            <span class="feather feather-columns ">Donation Managment</span>
                        </label>
                        <div class="tab-content pt-0">
                            <li class="nav-list-item mb-0 {{ Request::is('admin/organizers') ? 'active' : '' }}">
                                <a class="nav-list-link " href="{{ route('organizer.data') }}">
                                    <span class="feather feather-columns ml-3">Organizers</span>
                                </a>
                            </li>
                            <li class="nav-list-item mb-0 {{ Request::is('/admin/camapigns') ? 'active' : '' }}">
                                <a class="nav-list-link " href="{{ route('campaign.data') }}">
                                    <span class="feather feather-columns ml-3">Campaigns</span>
                                </a>
                            </li>
                            <li class="nav-list-item mb-0 {{ Request::is('admin/donations') ? 'active' : '' }}">
                                <a class="nav-list-link " href="{{ route('donation.data') }}">
                                    <span class="feather feather-columns ml-3">Donations</span>
                                </a>
                            </li>
                            <li class="nav-list-item mb-0 {{ Request::is('admin/donors') ? 'active' : '' }}">
                                <a class="nav-list-link " href="{{ route('donors.data') }}">
                                    <span class="feather feather-columns ml-3">Donors</span>
                                </a>
                            </li>

                        </div>
                    </div>
                    <li class="nav-list-item {{ Request::is('admin/settings') ? 'active' : '' }}">
                        <a class="nav-list-link" href="{{ route('settings') }}">

                            <i class="fal fa-lg fa-cog"></i>
                            <span class="feather feather-columns ml-3">Settings</span>
                        </a>
                    </li>

            </ul>

        </div>

        <div class="app-main ">
            <div class="main-header-line">

                <div class="action-buttons">
                    <button class="open-right-area">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg>
                    </button>
                    <button class="menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>

                {{ $slot }}
            </main>

        </div>


        <div class="app-right">

            <div class="flex">
                <button class="close-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="nav-list-item">
                        <a class="nav-list-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                          this.closest('form').submit();">
                            <i class="fal fa-2x fa-sign-out-alt"></i>
                            <span class="feather feather-columns ml-3">Logout</span>
                        </a>
                    </li>

                </form>
            </div>
            <div class="profile-box">
                <div class="profile-photo-wrapper">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                <p class="profile-text">{{ Auth::user()->username }}</p>
                <p class="profile-subtext"> {{ Auth::user()->profession }}</p>
            </div>
            <div class="app-right-content">
                @livewire('admin.dashboard-components.messages')
                <div class="app-right-section">
                    <div class="app-right-section-header">
                        <h2>Site Activity</h2>
                        <span class="notification-active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                        </span>
                    </div>

                    @livewire('admin.dashboard-components.site-activity')

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @livewireScripts
    @yield('script')
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("focus");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>


</body>

</html>
