<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('payment_method')]
interface PaymentProviderInterface
{
    public function getRedirectUrl(array $params): string;

    public static function getName(): string;
}
