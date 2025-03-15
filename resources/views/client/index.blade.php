@extends('client.base')

@section('content')
<style>
    :root {
        --star-size: 18px;
        --star-color: #ddd;
        --star-active-color: #ffc107;
        --primary-color: #2E5D7D;
        --secondary-color: #FF4D4F;
    }

    /* Navigation Catégories */
    .category-nav {
        position: sticky;
        top: 70px;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(10px);
        padding: 1rem 0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        border-bottom: 1px solid #eee;
    }

    .category-filter {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        scrollbar-width: thin;
    }

    .category-btn {
        flex: 0 0 auto;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-weight: 500;
        color: #495057;
    }

    .category-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(46, 93, 125, 0.2);
    }

    /* Sections Catégories */
    .category-section {
        margin: 3rem 0;
        scroll-margin-top: 120px;
    }

   /* Style général du titre de catégorie */
.category-title {
    font-size: 1.8rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 20px;
    border-radius: 8px;
    background: linear-gradient(90deg, #ff8a00, #da1b60);
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

/* Icône de la catégorie */
.category-title i {
    font-size: 1.5rem;
}

/* Effet au survol */
.category-title:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    filter: brightness(1.1);
}

/* Couleurs dynamiques selon les catégories */
.category-section:nth-child(odd) .category-title {
    background: linear-gradient(90deg, #007bff, #6610f2);
}

.category-section:nth-child(even) .category-title {
    background: linear-gradient(90deg, #28a745, #20c997);
}


    /* Carte Produit */
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        border: 1px solid #eee;
        overflow: hidden;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .product-image-link {
        display: block;
        position: relative;
        overflow: hidden;
    }

    .product-image {
        transition: transform 0.5s ease;
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .product-badges {
        position: absolute;
        top: 10px;
        left: 10px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .product-badge {
        font-size: 0.8rem;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
    }

    .product-body {
        padding: 1.2rem;
    }

    .product-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2C363F;
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .product-specs {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }

    .product-specs i {
        margin-right: 0.5rem;
        color: var(--primary-color);
    }

    .product-actions {
        display: flex;
        gap: 0.8rem;
    }

    @media (max-width: 768px) {
        .category-nav {
            top: 60px;
        }
        
        .product-image {
            height: 150px;
        }
        
        .product-specs {
            grid-template-columns: 1fr;
        }
    }
    a{
        text-decoration: none;
    }
    
</style>
        <!-- Section Héro -->
        <section class="hero-appliance text-white text-center">
            <div class="container">
                <h1 class="display-4 mb-4">Équipez votre maison intelligemment</h1>
                <p class="lead">Découvrez notre sélection d'électroménagers haut de gamme</p>
            </div>
        </section>
<!-- Navigation Catégories -->
<nav class="category-nav">
    <div class="container">
        <div class="category-filter">
            @foreach($categories as $category)
            <a href="#category-{{ $category->id }}" 
               class="category-btn" 
               data-category="{{ $category->id }}">
               {{ $category->libelle }}
            </a>
            @endforeach
        </div>
    </div>
</nav>

<!-- Contenu Principal -->
<main class="container py-5">
    @foreach($categories as $category)
    @if ($category->produits->count() > 0) 
    <section class="category-section" id="category-{{ $category->id }}">
        <h2 class="category-title">
            <i class="fas fa-{{ $category->icon }}"></i>
            {{ $category->libelle }}
        </h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($category->produits as $produit)
            <div class="col">
                <div class="product-card">
                    <a href="{{ route('voir.detail.produit', $produit->id) }}" class="product-image-link">
                        <img src="{{ asset('storage/' . $produit->image1) }}" 
                             class="product-image" 
                             alt="{{ $produit->libelle }}">
                        <div class="product-badges">
                            @if($produit->promotion)
                            <span class="product-badge bg-danger text-white">
                                -{{ $produit->promotion }}%
                            </span>
                            @endif
                            <span class="product-badge bg-dark text-white">
                                {{ $category->libelle }}
                            </span>
                        </div>
                    </a>

                    <div class="product-body">
                        <h3 class="product-title">{{ $produit->libelle }}</h3>
                        <div class="product-price">{{ number_format($produit->prix_u) }} FCFA</div>
                        
                        <div class="product-specs">
                            <div><i class="fas fa-box-open"></i>{{ $produit->capacite }}</div>
                            <div><i class="fas fa-shield-alt"></i>{{ $produit->garantie }} mois</div>
                            <div><i class="fas fa-bolt"></i>{{ $produit->puissance }}</div>
                            <div><i class="fas fa-palette"></i>{{ $produit->couleur }}</div>
                        </div>

                        <div class="product-actions">
                            <form action="{{ route('cart.add', $produit) }}" method="POST" class="w-100">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-cart-plus me-2"></i>Ajouter
                                </button>
                            </form>
                            <a href="{{ route('voir.detail.produit', $produit->id) }}" 
                               class="btn btn-outline-secondary btn-sm">
                               <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
@endforeach
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categories = document.querySelectorAll('.category-section');
    const categoryBtns = document.querySelectorAll('.category-btn');
    let currentActive = null;

    // Navigation fluide
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.hash);
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            setActiveCategory(this);
        });
    });

    // Détection automatique au scroll
    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY + 150;
        
        categories.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            
            if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
                const correspondingBtn = document.querySelector(`.category-btn[href="#${section.id}"]`);
                if (correspondingBtn && currentActive !== correspondingBtn) {
                    setActiveCategory(correspondingBtn);
                }
            }
        });
    });

    function setActiveCategory(btn) {
        categoryBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentActive = btn;
    }

    // Filtrage initial si hash présent
    if (window.location.hash) {
        const initialBtn = document.querySelector(`.category-btn[href="${window.location.hash}"]`);
        if (initialBtn) initialBtn.click();
    }
});


</script>
@endsection