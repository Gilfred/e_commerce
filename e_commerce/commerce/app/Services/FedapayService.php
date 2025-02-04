<?php

// namespace App\Services;

// use FedaPay\FedaPay;
namespace App\Services;

use FedaPay\FedaPay;
use FedaPay\Transaction;

class FedapayService
{
    public function __construct()
    {
        // Initialisation des clés et de l'environnement
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_ENV', 'sandbox'));
    }

    public function createPayout(array $data)
    {
        try {
            // Crée un paiement avec les données fournies
            $payout = Transaction::create([
                'amount' => $data['amount'],
                'currency' => ['iso' => 'XOF'],
                //'payment_method' => ['name' => 'mtn_open'],                'customer' => [
                "customer" => [ // Non obligatoire.
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone_number' => [
                        'number' => $data['number'],
                        'country' => $data['country']
                    ],
                ],
            ]);
            return $payout;
        } catch (\Exception $e) {
            throw new \Exception('Erreur lors de la création du paiement : ' . $e->getMessage());
        }
    }
}
