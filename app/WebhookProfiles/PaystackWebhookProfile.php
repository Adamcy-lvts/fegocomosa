<?php

namespace App\WebhookProfiles;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class PaystackWebhookProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        // Implement logic here to filter Paystack webhook events
        // For example, check the event type to determine whether to process it or not.
        $payload = $request->all();
        $event = $payload['event'] ?? null;

        if ($event === 'charge.success' || $event === 'charge.failed') {
            return true; // Process these events
        }

        return false; // Ignore other events
    }
}
