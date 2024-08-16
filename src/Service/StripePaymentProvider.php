<?php

namespace App\Service;

class StripePaymentProvider implements PaymentProviderInterface
{
    public function getRedirectUrl(array $params): string
    {
        return 'https://stripe.com?someParams';
    }

    public static function getName(): string
    {
        return 'stripe';
    }
}
