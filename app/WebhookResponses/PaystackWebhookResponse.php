<?php


namespace App\WebhookResponses;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookResponse\RespondsToWebhook;

class PaystackWebhookResponse implements RespondsToWebhook
{
    public function respondToValidWebhook(Request $request, WebhookConfig $config)
    {
        // Implement your custom response logic here
        // For example, return a custom JSON response for Paystack webhooks
        return response()->json(['message' => 'Webhook received and processed successfully'], 200);
    }
}
