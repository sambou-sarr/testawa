@extends('client.base')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Galerie d'images -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <div class="main-image mb-4 ratio ratio-1x1">
                    <img src="{{ asset('storage/'.$produit->image1) }}" 
                         class="img-fluid rounded-3" 
                         alt="{{ $produit->libelle }}"
                         id="mainImage">
                </div>
                
                <div class="thumbnails d-flex gap-2 flex-wrap">
                    @foreach([$produit->image1, $produit->image2, $produit->image3] as $image)
                        @if($image)
                        <div class="thumbnail-item ratio ratio-1x1" style="width: 80px">
                            <img src="{{ asset('storage/'.$image) }}" 
                                 class="img-fluid cursor-pointer rounded-2" 
                                 role="button"
                                 onclick="changeMainImage(this.src)"
                                 alt="Vue alternative {{ $loop->iteration }}">
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Détails du produit -->
        <div class="col-lg-6">
            <div class="product-details">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <h1 class="h2 mb-0">{{ $produit->libelle }}</h1>
                    <button class="btn btn-link text-danger p-0 wishlist-btn" 
                            data-product-id="{{ $produit->id }}">
                        <i class="far fa-heart fs-3"></i>
                    </button>
                </div>

                <!-- Prix -->
                <div class="product-pricing mb-4">
                    <span class="h2 text-primary">
                        {{ number_format($produit->prix_u, 0, ',', ' ') }} FCFA
                    </span>
                </div>

                <!-- Caractéristiques principales -->
                <div class="product-highlights mb-5">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-bolt text-primary fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Puissance</small>
                                    <strong>{{ $produit->puissance }}W</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-shield-alt text-primary fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Garantie</small>
                                    <strong>{{ $produit->garantie ?? 'Aucune' }} mois</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-box-open text-primary fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Capacité</small>
                                    <strong>{{ $produit->capacite }}L</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-palette text-primary fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Couleur</small>
                                    <strong>{{ $produit->couleur }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ajout au panier -->
                <form action="{{ route('cart.add', $produit) }}" method="POST" class="mb-5">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-auto">
                            <label class="form-label">Quantité</label>
                            <input type="number" 
                                   name="quantity" 
                                   value="1" 
                                   min="1" 
                                   max="{{ $produit->stock }}" 
                                   class="form-control" 
                                   style="width: 100px"
                                   required>
                        </div>
                        <div class="col">
                            <button type="submit" 
                                    class="btn btn-primary btn-lg w-100 py-3">
                                <i class="fas fa-cart-plus me-2"></i>Ajouter au panier
                            </button>
                        </div>
                        <div class="col-12">
                            <small class="text-muted">Stock disponible: {{ $produit->stock }}</small>
                        </div>
                    </div>
                </form>

                <!-- Description détaillée -->
                @if($produit->description)
                <div class="product-description mb-5">
                    <h3 class="h5 mb-3">Description du produit</h3>
                    <div class="text-muted lh-lg">
                        {!! nl2br(e($produit->description)) !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Zoom Image -->
<div class="modal fade" id="imageZoomModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="" id="zoomedImage" class="img-fluid" alt="Zoom">
            </div>
        </div>
    </div>
</div>

<style>
.product-gallery .main-image {
    border: 1px solid #eee;
    border-radius: 12px;
    overflow: hidden;
    background: #f8f9fa;
}

.thumbnail-item {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.thumbnail-item:hover {
    transform: translateY(-3px);
    border-color: #2E5D7D; /* Couleur principale */
}

.avatar {
    font-weight: 500;
    font-size: 1.2rem;
}
</style>

<script>
function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
}

// Zoom image
document.getElementById('mainImage').addEventListener('click', function() {
    document.getElementById('zoomedImage').src = this.src;
    new bootstrap.Modal(document.getElementById('imageZoomModal')).show();
});

// Gestion basique des favoris
document.querySelector('.wishlist-btn').addEventListener('click', function(e) {
    e.preventDefault();
    this.querySelector('i').classList.toggle('far');
    this.querySelector('i').classList.toggle('fas');
    // Ajouter ici la logique AJAX pour sauvegarder
});
</script>
@endsection