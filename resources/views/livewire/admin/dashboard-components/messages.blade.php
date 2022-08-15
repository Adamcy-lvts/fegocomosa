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
                    <img src="{{ asset('storage/' . $member->profile_photo_path) }}" alt="profile">
                @else
                    <img src="{{ asset('storage/photos/anonymous_avatar.jpg') }}" alt="profile">
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
    </div>
</div>
