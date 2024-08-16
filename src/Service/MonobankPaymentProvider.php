<?php

namespace App\Service;

class MonobankPaymentProvider implements PaymentProviderInterface
{
    public function getRedirectUrl(array $params): string
    {
        $monobankUrl = 'https://monobank.com/';
        $query = http_build_query(['user' => $params['user'], 'signature' => 'monobankSignature']);

        return $monobankUrl . $query;
    }

    public static function getName(): string
    {
        return 'monobank';
    }
}
