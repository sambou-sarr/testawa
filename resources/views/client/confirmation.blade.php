@extends('client.base')

@section('content')
<style>
    .confirmation-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .confirmation-header {
        text-align: center;
        padding: 2rem 0;
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 2rem;
    }

    .confirmation-icon {
        font-size: 4rem;
        color: #4CAF50;
        margin-bottom: 1rem;
    }

    .confirmation-title {
        font-size: 2.2rem;
        color: #2C363F;
        margin-bottom: 1rem;
    }

    .confirmation-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
    }

    .order-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .detail-card {
        background: #f8fafb;
        padding: 1.5rem;
        border-radius: 8px;
        border-left: 4px solid #2E5D7D;
    }

    .detail-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .detail-value {
        color: #2C363F;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .products-list {
        margin: 2rem 0;
    }

    .product-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        gap: 1.5rem;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .thank-you-section {
        text-align: center;
        padding: 3rem 0;
        background: #f8fafb;
        border-radius: 12px;
        margin-top: 2rem;
    }

    .home-button {
        background: #2E5D7D;
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 25px;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        text-decoration: none;
        transition: transform 0.2s;
    }

    .home-button:hover {
        transform: translateY(-2px);
        color: white;
    }

    @media (max-width: 768px) {
        .confirmation-container {
            padding: 1rem;
            margin: 1rem;
        }

        .order-details {
            grid-template-columns: 1fr;
        }

        .product-item {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="confirmation-container">
    <div class="confirmation-header">
        <div class="confirmation-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="confirmation-title">Paiement réussi !</h1>
        <p class="confirmation-subtitle">
            Merci pour votre commande. Votre paiement a été traité avec succès.
        </p>
    </div>

    <div class="order-details">
        <div class="detail-card">
            <div class="detail-label">Numéro de commande</div>
            <div class="detail-value">#{{ $commande->id }}</div>
        </div>
        
        <div class="detail-card">
            <div class="detail-label">Date</div>
            <div class="detail-value">{{ $commande->created_at->format('d/m/Y H:i') }}</div>
        </div>

        <div class="detail-card">
            <div class="detail-label">Total payé</div>
            <div class="detail-value">{{ number_format($commande->total) }} FCFA</div>
        </div>

        <div class="detail-card">
            <div class="detail-label">Méthode de paiement</div>
            <div class="detail-value">Orange Money</div>
        </div>
    </div>

    <div class="products-list">
        <h3 style="color: #2C363F; margin-bottom: 1.5rem;">Articles commandés</h3>
        
        @foreach($commande->details as $detail)
        <div class="product-item">
            <img src="{{ asset('storage/' . $detail->produit->image) }}" 
                 class="product-image" 
                 alt="{{ $detail->produit->libelle }}">
            <div style="flex-grow: 1;">
                <h4 style="color: #2C363F; margin-bottom: 0.5rem;">
                    {{ $detail->produit->libelle }}
                </h4>
                <div style="color: #6c757d;">
                    {{ $detail->quantite }} x {{ number_format($detail->prix_unitaire) }} FCFA
                </div>
            </div>
            <div style="color: #2C363F; font-weight: 500;">
                {{ number_format($detail->quantite * $detail->prix_unitaire) }} FCFA
            </div>
        </div>
        @endforeach
    </div>

    <div class="thank-you-section">
        <h3 style="color: #2C363F; margin-bottom: 1rem;">Merci de votre confiance !</h3>
        <p style="color: #6c757d; margin-bottom: 2rem;">
            Vous recevrez sous peu un email de confirmation avec les détails de livraison.
        </p>
        <a href="{{ route('client.index') }}" class="home-button">
            <i class="fas fa-home"></i>
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection