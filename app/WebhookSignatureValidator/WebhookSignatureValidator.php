<?php

namespace App\WebhookSignatureValidator;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class WebhookSignatureValidator implements SignatureValidator
{
    public function isValid(Request $request, $signingSecret): bool
    {
        // Ensure the Paystack signature header is present
        if (!$request->hasHeader('X-Paystack-Signature')) {
            return false;
        }

        // Get the signature from the header
        $signatureHeader = $request->header('x-paystack-signature');

        // Compute the expected signature using the provided signing secret and request content
        $computedSignature = hash_hmac('sha512', $request->getContent(), $signingSecret);

        // Compare the computed signature with the signature from the header
        return hash_equals($signatureHeader, $computedSignature);
    }
}