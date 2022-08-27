<div class="chart-container">
    <div class="chart-container-header">
        <h2>Members Stats</h2>

    </div>
    <div class="acquisitions-bar">
        <span class="bar-progress rejected" style="width:8%;"></span>
        <span class="bar-progress on-hold" style="width:{{ $activeMembersPercentage }}%;"></span>
        <span class="bar-progress shortlisted" style="width:{{ $FemalePercentage }}%;"></span>
        <span class="bar-progress applications" style="width:{{ $MalePercentage }}%;"></span>
    </div>
    <div class="progress-bar-info">
        <span class="progress-color applications"></span>
        <span class="progress-type">Male Members</span>
        <span class="progress-amount">{{ round($MalePercentage, 2) }}%</span>
    </div>
    <div class="progress-bar-info">
        <span class="progress-color shortlisted"></span>
        <span class="progress-type">Female Members </span>
        <span class="progress-amount">{{ round($FemalePercentage, 2) }}%</span>
    </div>
    <div class="progress-bar-info">
        <span class="progress-color on-hold"></span>
        <span class="progress-type">Active Members</span>
        <span class="progress-amount">{{ round($activeMembersPercentage, 2) }}%</span>
    </div>
    <div class="progress-bar-info">
        <span class="progress-color rejected"></span>
        <span class="progress-type">Inactive Members</span>
        <span class="progress-amount">{{ round($inActiveMembers, 2) }}%</span>
    </div>
</div>
