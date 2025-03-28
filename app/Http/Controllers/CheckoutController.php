<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paydunya\Setup;
use Paydunya\Checkout\Store;
use Paydunya\Checkout\CheckoutInvoice;

class CheckoutController extends Controller
{
    public function payWithPayDunya(Request $request)
    {
        // Configuration des clés API PayDunya
        Setup::setMasterKey(env('PAYDUNYA_MASTER_KEY'));
        Setup::setPublicKey(env('PAYDUNYA_PUBLIC_KEY'));
        Setup::setPrivateKey(env('PAYDUNYA_PRIVATE_KEY'));
        Setup::setToken(env('PAYDUNYA_TOKEN'));
        Setup::setMode(env('PAYDUNYA_MODE')); // "test" pour les tests, "live" en production

        // Création du store PayDunya
        $store = new Store();
        $store->setName("Mon E-commerce");
        $store->setTagline("Vente en ligne de jerseys");
        $store->setPhoneNumber("771234567");
        $store->setWebsiteUrl("https://mon-site.com");

        // Création de la facture
        $invoice = new CheckoutInvoice($store);
        $invoice->addItem("Jersey PSG", 1, 15000, 15000); // Nom, Quantité, Prix unitaire, Prix total
        $invoice->setTotalAmount(15000); // Total à payer

        // Définir l'URL de retour après paiement
        $invoice->setReturnUrl(route('checkout.success'));
        $invoice->setCancelUrl(route('checkout.cancel'));

        // Envoi de la requête de paiement
        if ($invoice->create()) {
            return redirect($invoice->getInvoiceUrl()); // Redirection vers PayDunya
        } else {
            return back()->with('error', "Erreur lors de la création du paiement.");
        }
    }

    // Confirmation du paiement
    public function paymentSuccess(Request $request)
    {
        return view('checkout.success'); // Page de confirmation
    }

    // Annulation du paiement
    public function paymentCancel()
    {
        return view('checkout.cancel'); // Page d'échec de paiement
    }
}
