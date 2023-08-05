<?php

// app/WebhookSignatureValidator.php

namespace App\WebhookValidator;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class WebhookSignatureValidator implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        // Ensure the Paystack signature header is present
        if (!$request->hasHeader($config->signatureHeaderName)) {
            return false;
        }

        // Get the signature from the header
        $signatureHeader = $request->header($config->signatureHeaderName);

        // Compute the expected signature using the provided signing secret and request content
        $computedSignature = hash_hmac('sha512', $request->getContent(), $config->signingSecret);

        // Compare the computed signature with the signature from the header
        return hash_equals($signatureHeader, $computedSignature);
    }
}
