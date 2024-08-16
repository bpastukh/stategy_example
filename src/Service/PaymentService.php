<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class PaymentService
{
    public function __construct(
        #[AutowireIterator('payment_method', defaultIndexMethod: 'getName')]
        private iterable $strategies
    ) {
        $this->strategies = iterator_to_array($strategies);
    }

    public function getPaymentUrl(string $paymentMethod, array $params): string
    {
        if (!array_key_exists($paymentMethod, $this->strategies)) {
            throw new \Exception('unknown payment method');
        }

        return $this->strategies[$paymentMethod]->getRedirectUrl($params);
    }
}
