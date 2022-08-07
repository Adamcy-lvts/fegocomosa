{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}




<x-dashboard>
    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




    <div class="chart-row three">
        <div class="chart-container-wrapper">
            <div class="chart-container">
                <div class="chart-info-wrapper">
                    <h2>Applications</h2>
                    <span>20.5 K</span>
                </div>
                <div class="chart-svg">
                    <svg viewBox="0 0 36 36" class="circular-chart pink">
                        <path class="circle-bg"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <path class="circle" stroke-dasharray="30, 100"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <text x="18" y="20.35" class="percentage">30%</text>
                    </svg>
                </div>
            </div>
        </div>
        <div class="chart-container-wrapper">
            <div class="chart-container">
                <div class="chart-info-wrapper">
                    <h2>Shortlisted</h2>
                    <span>5.5 K</span>
                </div>
                <div class="chart-svg">
                    <svg viewBox="0 0 36 36" class="circular-chart blue">
                        <path class="circle-bg"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <path class="circle" stroke-dasharray="60, 100"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <text x="18" y="20.35" class="percentage">60%</text>
                    </svg>
                </div>
            </div>
        </div>
        <div class="chart-container-wrapper">
            <div class="chart-container">
                <div class="chart-info-wrapper">
                    <h2>On-hold</h2>
                    <span>10.5 K</span>
                </div>
                <div class="chart-svg">
                    <svg viewBox="0 0 36 36" class="circular-chart orange">
                        <path class="circle-bg"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <path class="circle" stroke-dasharray="90, 100"
                            d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831">
                        </path>
                        <text x="18" y="20.35" class="percentage">90%</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-row two">
        <div class="chart-container-wrapper big">
            <div class="chart-container">
                <div class="chart-container-header">
                    <h2>Top Active Jobs</h2>
                    <span>Last 30 days</span>
                </div>
                <div class="line-chart">
                    <canvas id="chart"></canvas>
                </div>
                <div class="chart-data-details">
                    <div class="chart-details-header"></div>
                </div>
            </div>
        </div>
        <div class="chart-container-wrapper small">
            <div class="chart-container">
                <div class="chart-container-header">
                    <h2>Acquisitions</h2>
                    <span href="#">This month</span>
                </div>
                <div class="acquisitions-bar">
                    <span class="bar-progress rejected" style="width:8%;"></span>
                    <span class="bar-progress on-hold" style="width:10%;"></span>
                    <span class="bar-progress shortlisted" style="width:18%;"></span>
                    <span class="bar-progress applications" style="width:64%;"></span>
                </div>
                <div class="progress-bar-info">
                    <span class="progress-color applications"></span>
                    <span class="progress-type">Applications</span>
                    <span class="progress-amount">64%</span>
                </div>
                <div class="progress-bar-info">
                    <span class="progress-color shortlisted"></span>
                    <span class="progress-type">Shortlisted</span>
                    <span class="progress-amount">18%</span>
                </div>
                <div class="progress-bar-info">
                    <span class="progress-color on-hold"></span>
                    <span class="progress-type">On-hold</span>
                    <span class="progress-amount">10%</span>
                </div>
                <div class="progress-bar-info">
                    <span class="progress-color rejected"></span>
                    <span class="progress-type">Rejected</span>
                    <span class="progress-amount">8%</span>
                </div>
            </div>
            <div class="chart-container applicants">
                <div class="chart-container-header">
                    <h2>New Applicants</h2>
                    <span>Today</span>
                </div>
                <div class="applicant-line">
                    <img src="https://images.unsplash.com/photo-1587628604439-3b9a0aa7a163?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjB8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                        alt="profile">
                    <div class="applicant-info">
                        <span>Emma Ray</span>
                        <p>Applied for <strong>Product Designer</strong></p>
                    </div>
                </div>
                <div class="applicant-line">
                    <img src="https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2555&q=80"
                        alt="profile">
                    <div class="applicant-info">
                        <span>Ricky James</span>
                        <p>Applied for <strong>IOS Developer</strong></p>
                    </div>
                </div>
                <div class="applicant-line">
                    <img src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzV8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                        alt="profile">
                    <div class="applicant-info">
                        <span>Julia Wilson</span>
                        <p>Applied for <strong>UI Developer</strong></p>
                    </div>
                </div>
                <div class="applicant-line">
                    <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80"
                        alt="profile">
                    <div class="applicant-info">
                        <span>Jess Watson</span>
                        <p>Applied for <strong>Design Lead</strong></p>
                    </div>
                </div>
                <div class="applicant-line">
                    <img src="https://images.unsplash.com/photo-1543965170-4c01a586684e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2232&q=80"
                        alt="profile">
                    <div class="applicant-info">
                        <span>John Pellegrini</span>
                        <p>Applied for <strong>Back-End Developer</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-dashboard>
