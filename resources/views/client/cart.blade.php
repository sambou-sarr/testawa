@extends('client.base')

@section('content')
<style>
    .cart-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .cart-title {
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        color: #2C363F;
    }

    .empty-cart {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }

    /* Version desktop */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .cart-table th {
        background: #2E5D7D;
        color: white;
        padding: 1.2rem;
        text-align: left;
    }

    .cart-table td {
        padding: 1.2rem;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .cart-item-image {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .quantity-btn {
        background: #2E5D7D;
        color: white;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        cursor: pointer;
    }

    .remove-btn {
        background: #FF4D4F;
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 25px;
        cursor: pointer;
    }

    .total-section {
        text-align: right;
        padding: 1.5rem;
        background: #f8fafb;
        border-radius: 12px;
        margin: 2rem 0;
    }

    .checkout-buttons {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }

    .checkout-btn {
        background: #2E5D7D;
        color: white;
        padding: 1rem 2rem;
        border-radius: 25px;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    /* Version mobile */
    @media (max-width: 768px) {
        .cart-table, .cart-table thead, .cart-table tbody, .cart-table tr, .cart-table td {
            display: block;
            width: 100%;
        }

        .cart-table thead {
            display: none;
        }

        .cart-table tr {
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-radius: 8px;
            padding: 1rem;
        }

        .cart-table td {
            padding: 0.8rem;
            position: relative;
            padding-left: 45%;
            text-align: right;
        }

        .cart-table td::before {
            content: attr(data-label);
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 600;
            color: #2E5D7D;
        }

        .cart-item-image {
            width: 100%;
            height: auto;
            margin: 0.5rem 0;
        }

        .quantity-controls {
            justify-content: flex-end;
        }

        .checkout-buttons {
            flex-direction: column;
        }

        .checkout-btn, .clear-cart-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="cart-container">
    <h2 class="cart-title">🛒 Votre Panier</h2>

    @if(empty($cart))
        <div class="empty-cart">
            <i class="fas fa-shopping-basket fa-3x mb-3"></i>
            <p>Votre panier est vide</p>
            <a href="{{ route('client.index') }}" class="btn btn-primary mt-3">
                Continuer vos achats
            </a>
        </div>
    @else
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td data-label="Produit">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('storage/' . $item['image']) }}" 
                                 class="cart-item-image" 
                                 alt="{{ $item['name'] }}">
                            <span>{{ $item['name'] }}</span>
                        </div>
                    </td>
                    <td data-label="Prix">{{ number_format($item['price']) }} FCFA</td>
                    <td data-label="Quantité">
                        <div class="quantity-controls">
                            <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" name="change" value="-1" class="quantity-btn">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span>{{ $item['quantity'] }}</span>
                                <button type="submit" name="change" value="1" class="quantity-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td data-label="Total">{{ number_format($item['price'] * $item['quantity']) }} FCFA</td>
                    <td data-label="Actions">
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="remove-btn">
                                <i class="fas fa-trash-alt"></i>
                                <span class="d-none d-md-inline">Supprimer</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <h3 class="total-amount">Total : {{ number_format($total) }} FCFA</h3>
        </div>

        <div class="checkout-buttons">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger checkout-btn">
                    <i class="fas fa-trash-alt"></i> Vider le panier
                </button>
            </form>
            <a href="{{ route('checkout') }}" class="btn btn-success checkout-btn">
                <i class="fas fa-credit-card"></i> Commander
            </a>
        </div>
    @endif
</div>
@endsection