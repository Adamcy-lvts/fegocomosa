<!DOCTYPE html>
<html class="dark" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-pro-5.10.2-web/css/all.css') }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script> --}}
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" charset="utf-8"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> --}}


</head>

<body>
    <x-notifications />
    <x-jet-banner />
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
                <li class="nav-list-item {{ Request::is('admin/members') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('members') }}">
                        <i class="fal fa-lg fa-users"></i>
                        <span class="feather feather-columns feather feather-columns ml-3">Members</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/posts') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('posts.data') }}">
                        <i class="fal fa-lg fa-newspaper"></i>
                        <span class="feather feather-columns ml-3"> Post</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/events') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('event.data') }}">
                        <i class="fal fa-lg fa-calendar-alt"></i>
                        <span class="feather feather-columns ml-3">Event</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/projects') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('projects.data') }}">
                        <i class="fal fa-lg fa-tasks"></i>
                        <span class="feather feather-columns ml-3">Projects</span>
                    </a>
                </li>
                <li class="nav-list-item {{ Request::is('admin/procategory') ? 'active' : '' }}">
                    <a class="nav-list-link" href="{{ route('profession.category') }}">
                        <i class="fal fa-lg fa-tasks"></i>
                        <span class="feather feather-columns ml-3">Profession Category</span>
                    </a>
                </li>
                <div class="tabs">
                    <div class="tab">
                        <input class="check" type="checkbox" id="chck1">
                        <label class="tab-label" for="chck1"> <i class="ml-3 mt-1 fal fa-dollar-sign"></i>
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
                    <li class="nav-list-item {{ Request::is('admin/settings/welcomepage') ? 'active' : '' }}">
                        <a class="nav-list-link" href="{{ route('welcomepage.slider') }}">

                            <i class="fal fa-lg fa-cog"></i>
                            <span class="feather feather-columns ml-3">Settings</span>
                        </a>
                    </li>

            </ul>

        </div>

        <div class="app-main ">
            <div class="main-header-line">
                {{-- <h1>Applications Dashboard</h1> --}}
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
                <div class="app-right-section">
                    <div class="app-right-section-header">
                        <h2>Messages</h2>
                        <span class="notification-active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-message-square">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </span>
                    </div>
                    <div class="message-line">
                        <img src="https://images.unsplash.com/photo-1562159278-1253a58da141?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzB8fHBvcnRyYWl0JTIwbWFufGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                            alt="profile">
                        <div class="message-text-wrapper">
                            <p class="message-text">Eric Clampton</p>
                            <p class="message-subtext">Have you planned any deadline for this?</p>
                        </div>
                    </div>
                    <div class="message-line">
                        <img src="https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80"
                            alt="profile">
                        <div class="message-text-wrapper">
                            <p class="message-text">Jess Flax</p>
                            <p class="message-subtext">Can we schedule another meeting for next thursday?</p>
                        </div>
                    </div>
                    <div class="message-line">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80"
                            alt="profile">
                        <div class="message-text-wrapper">
                            <p class="message-text">Pam Halpert</p>
                            <p class="message-subtext">The candidate has been shorlisted.</p>
                        </div>
                    </div>
                </div>
                <div class="app-right-section">
                    <div class="app-right-section-header">
                        <h2>Activity</h2>
                        <span class="notification-active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                        </span>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">Your plan is expires in <strong>3 days.</strong></p>
                            <a class="activity-link" href="#">Renew Now</a>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon applicant">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="12" y1="18" x2="12" y2="12" />
                                <line x1="9" y1="15" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">There are <strong>3 new applications</strong> for <strong>UI
                                    Developer</strong></p>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="15" y1="9" x2="9" y2="15" />
                                <line x1="9" y1="9" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">Your teammate, <strong>Wade Wilson</strong> has closed the job
                                post of <strong>IOS Developer</strong></p>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon applicant">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="12" y1="18" x2="12" y2="12" />
                                <line x1="9" y1="15" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">There are <strong>4 new applications</strong> for
                                <strong>Front-End Developer</strong>
                            </p>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon applicant">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="12" y1="18" x2="12" y2="12" />
                                <line x1="9" y1="15" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">There are <strong>2 new applications</strong> for <strong>Design
                                    Lead</strong></p>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="15" y1="9" x2="9" y2="15" />
                                <line x1="9" y1="9" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">Your teammate, <strong>Wade Wilson</strong> has closed the job
                                post of <strong>Back-End Developer</strong></p>
                        </div>
                    </div>
                    <div class="activity-line">
                        <span class="activity-icon draft">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-minus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="9" y1="15" x2="15" y2="15" />
                            </svg>
                        </span>
                        <div class="activity-text-wrapper">
                            <p class="activity-text">You have drafted a job post for <strong>HR Specialist</strong>
                            </p>
                            <a href="#" class="activity-link">Complete Now</a>
                        </div>
                    </div>
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
