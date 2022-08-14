<div>
    <div class="app-right-section">
        <div class="app-right-section-header">
            <h2>Messages</h2>
            <span class="notification-active">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-message-square">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
            </span>
        </div>

        @foreach ($messageNotifications as $message)
            @php
                $member = App\Models\User::find($message->data['user_id']);
                
            @endphp

            <div class="message-line">
                @if (isset($member->profile_photo_path) && $member->profile_photo_path)
                    <img src="{{ 'storage/' . $member->profile_photo_path }}" alt="profile">
                @else
                    <img src="{{ 'storage/photos/anonymous_avatar.jpg' }}" alt="profile">
                @endif
                @php
                    if ($message->data['user_id']) {
                        $fullName = $member->first_name . ' ' . $member->last_name;
                    }
                @endphp
                <div class="message-text-wrapper">
                    <p class="message-text">
                        {{ $fullName ?? $message->data['name'] }}
                    </p>
                    <p class="message-subtext">{{ $message->data['message'] }}</p>
                </div>
            </div>
        @endforeach

        {{-- <div class="message-line">
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
        </div> --}}
    </div>
</div>
