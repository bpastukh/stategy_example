<?php

namespace App\Controller;

use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'payment_show')]
    public function show(): Response
    {
        return $this->render('payment.html.twig');
    }

    #[Route('/pay', name: 'pay')]
    public function pay(Request $request, PaymentService $paymentService): Response
    {
        $paymentMethod = $request->request->get('paymentMethod');
        $redirectUrl = $paymentService->getPaymentUrl($paymentMethod, ['user' => 'dummy user']);

        dd($redirectUrl);
    }
}
