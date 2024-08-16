<?php

namespace App\Service;

class PBPaymentProvider implements PaymentProviderInterface
{
    public function getRedirectUrl(array $params): string
    {
        $pbUrl = 'https://pb.com/';
        $query = http_build_query(['user' => $params['user'], 'signature' => $this->getSignature()]);

        return $pbUrl . $query;
    }

    public static function getName(): string
    {
        return 'pb';
    }

    private function getSignature(): string
    {
        return md5('zsadsa');
    }
}
