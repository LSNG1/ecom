<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Customer;

class PaymentController extends AbstractController
{
    public function createPaymentIntent(Request $request): JsonResponse
    {
        Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
        $cartData = json_decode($request->getContent(), true);

        $totalAmount = 0;
        foreach ($cartData['cartItems'] as $item) {
            if (isset($item['price'])) {
                $totalAmount += $item['price'];
            }
        }
        $totalAmount = $totalAmount * 100;

        $userId = $cartData['userId'];

        $customer = Customer::create([
            'metadata' => [
                'userId' => $userId,
            ],
        ]);

        $paymentIntentParams = [
            'amount' => $totalAmount,
            'currency' => 'usd',
            'customer' => $customer->id,
        ];

        $paymentIntent = PaymentIntent::create($paymentIntentParams);

        error_log('userId: ' . $userId);
        error_log('userId from metadata: ' . ($paymentIntent->customer ?? 'null'));

        return $this->json(['clientSecret' => $paymentIntent->client_secret]);
    }


    public function confirmPayment(Request $request): JsonResponse
    {
        Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

        $requestData = json_decode($request->getContent(), true);
        $paymentIntentId = $requestData['paymentIntentId'];
        $paymentDetails = $requestData['paymentDetails'];

        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        try {
            $paymentIntent->confirm([
            'payment_method' => $paymentDetails['paymentMethodId'],
            ]);

            $userId = $paymentIntent->metadata['userId'] ?? null;


            return $this->json(['success' => true]);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()]);
        }
    }

	
}