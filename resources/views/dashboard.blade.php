<x-dashboard>
    @if (auth()->user()->hasAnyRole(['Super-Admin', 'admin']))
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
    @else
        <div class="mx-auto  py-24 w-8/12">
            <div class="flex py-48 flex-col items-center justify-center">
                <div class="uppercase  px-24 text-gray-600 text-5xl">Unauthorised Access</div>
                <div class="mt-2"><i class="fa-duotone fa-lock-keyhole fa-8x opacity-50"></i></div>
            </div>

        </div>
    @endif


</x-dashboard>
