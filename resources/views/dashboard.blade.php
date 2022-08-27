<x-dashboard>
    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @livewire('admin.dashboard-components.stat-component')

    <div class="chart-row two">

        @livewire('admin.dashboard-components.sitetop-activity-component')

        <div class="chart-container-wrapper small">
            @livewire('admin.dashboard-components.members-stats-component')

            <div class="chart-container applicants">

                @livewire('admin.dashboard-components.new-members-component')
            </div>
        </div>
    </div>




</x-dashboard>
