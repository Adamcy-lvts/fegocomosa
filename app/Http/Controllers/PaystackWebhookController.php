<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookProcessor;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\Models\WebhookCall; // Import the WebhookCall model

class PaystackWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $config = new WebhookConfig([
            'name' => 'paystack',
            'signing_secret' => config('webhook-client.config.paystack.signing_secret'),
            'signature_header_name' => 'X-Paystack-Signature',
            'signature_validator' => app(SignatureValidator::class),
            'webhook_profile' => app(config('webhook-client.config.paystack.webhook_profile')),
            'webhook_response' => app(config('webhook-client.config.paystack.webhook_response')),
            'webhook_model' => WebhookCall::class, // Use the default WebhookCall model
            'process_webhook_job' => config('webhook-client.config.paystack.process_webhook_job'),
        ]);

        $webhookProcessor = new WebhookProcessor($request, $config);
        $webhookProcessor->process();

        return response()->json(['message' => 'Webhook received and processed successfully'], 200);
    }
}

