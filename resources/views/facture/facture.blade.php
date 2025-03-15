<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture #{{ $commande->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }
        .container { width: 80%; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #007BFF; padding-bottom: 10px; }
        .header img { max-width: 100px; }
        .header .company-info { text-align: right; }
        .company-info h2 { margin: 0; color: #007BFF; }
        .info, .total, .footer { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007BFF; color: white; }
        .total td { font-weight: bold; }
        .footer { text-align: center; font-size: 14px; color: #555; margin-top: 30px; }
    </style>
</head>
<body>

<div class="container">
    <!-- HEADER AVEC LOGO ET INFOS ENTREPRISE -->
    <div class="header">
        <img src="{{ asset('logo1.png') }}" alt="Logo de l'entreprise">
        <div class="company-info">
            <h2>Lebouto Service</h2>
            <p>Adresse : 5 Rue Laperine x Lamine Gueye Dakar Sénégal </p>
            <p>Téléphone : 33 823 61 72</p>
            <p>Téléphone : +221 76 534 60 60</p>
            <p>Téléphone : +221 77 651 70 72</p>
        </div>
    </div>

    <!-- INFOS CLIENT & COMMANDE -->
    <div class="info">
        <h3>Facture</h3>
        <p><strong>Date :</strong> {{ date('d/m/Y', strtotime($commande->created_at)) }}</p>
        <p><strong>Client :</strong> {{ $commande->nom }}</p>
        <p><strong>Email :</strong> {{ $commande->email }}</p>
        <p><strong>Téléphone :</strong> {{ $commande->telephone }}</p>
        <p><strong>Adresse :</strong> {{ $commande->adresse }}</p>
        <p><strong>Statut :</strong> {{ ucfirst($commande->statut) }}</p>
    </div>

    <!-- TABLEAU DES PRODUITS -->
    <h3>Détails de la commande</h3>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($details as $detail)
                @php 
                    $sousTotal = $detail->quantite * $detail->prix_unitaire;
                    $total += $sousTotal;
                @endphp
                <tr>
                    <td>{{ $detail->produit->libelle }}</td>
                    <td>{{ $detail->quantite }}</td>
                    <td>{{ number_format($detail->prix_unitaire, 2, ',', ' ') }} F CFA</td>
                    <td>{{ number_format($sousTotal, 2, ',', ' ') }} F CFA</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- TOTAL -->
    <table class="total">
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>{{ number_format($total, 2, ',', ' ') }} F CFA</strong></td>
        </tr>
    </table>
    <!-- PIED DE PAGE -->
    <div class="footer">
        <p>Merci pour votre achat !</p>
        <p>Lebouto Service - {{ date('Y') }} | Tous droits réservés.</p>
    </div>
</div>

</body>
</html>
