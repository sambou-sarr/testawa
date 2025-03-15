<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lebouto Service Électroménagers - Dakar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo1.png') }}g">
    <style>
        :root {
            --primary-color: #2E5D7D;  /* Nouvelle palette bleu professionnel */
            --secondary-color: #FFA726; 
            --light-bg: #F8F9FA;
            --text-dark: #2C363F;
        }

        .hero-appliance {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                        url('https://images.unsplash.com/photo-1556911220-bff31c812dba') center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
        }

        .appliance-card {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .appliance-specs {
            padding: 1rem;
            background: #f8f9fa;
            border-top: 2px solid #eee;
        }

        .spec-badge {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

                /* Pour desktop */
                .logo-img {
                width: 80px !important; 
                min-width: 80px;
            }
            
            /* Pour les tablettes */
            @media (max-width: 991px) {
                .logo-img {
                    width: 60px !important;
                    min-width: 60px;
                }
                .brand-text {
                    font-size: 0.9rem;
                }
            }
            
            /* Pour les mobiles */
            @media (max-width: 768px) {
                .logo-img {
                    width: 50px !important;
                    min-width: 50px;
                }
                .navbar-brand {
                    margin-right: 0.5rem;
                }
            }
            
            /* Animation au survol */
            .logo-img:hover {
                transform: scale(1.05) rotate(-5deg);
            }
            
            /* Ajustement de l'alignement */
            .navbar-brand {
                display: flex;
                align-items: center;
                padding-top: 0.3rem;
                padding-bottom: 0.3rem;
            }
            .navbar {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-brand img {
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover img {
            transform: rotate(-10deg);
        }
        
        .nav-link {
            position: relative;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 991px) {
            .navbar-collapse {
                padding-top: 1rem;
            }
            
            .dropdown-menu {
                margin-left: 1rem;
                border-left: 3px solid var(--primary-color);
            }
            
            .form-control {
                margin-right: 0 !important;
            }
        }
        .footer-modern {
            background: #1a1a1a;
            color: rgba(255,255,255,0.7);
            font-size: 0.95rem;
        }
        
        .footer-modern h5 {
            color: #fff;
            letter-spacing: 0.5px;
            font-size: 1.1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-modern h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: #2E5D7D;
        }
        
        .hover-white:hover {
            color: #fff !important;
        }
        
        .btn-social {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .btn-social:hover {
            background: #2E5D7D !important;
            border-color: #2E5D7D !important;
            transform: translateY(-2px);
        }
        
        .newsletter .form-control {
            background: rgba(255,255,255,0.05);
            color: #fff;
        }
        
        .newsletter .form-control::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        .text-white-70 {
            color: rgba(255,255,255,0.7);
        }
        
        .border-dark {
            border-color: rgba(255,255,255,0.1) !important;
        }
        
        @media (max-width: 768px) {
            .footer-modern {
                text-align: center;
            }
            
            .footer-modern h5::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .contact-info div {
                justify-content: center !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('client.index')}}">
                <img src="{{ asset('logo1.png') }}" 
                     alt="Logo Lebouto Services" 
                     class="me-3 logo-img"
                     style="width: 80px; height: auto; transition: transform 0.3s ease;">
                <span class="brand-text d-none d-md-block">Lebouto Services</span>
            </a>
            
    
            <!-- Menu Hamburger Mobile -->
            <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#mainNav" 
                    aria-controls="mainNav" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Contenu du menu -->
            <div class="collapse navbar-collapse" id="mainNav">
                <!-- Menu principal -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="">À propos</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                </ul>
                <!-- Section droite -->
                <div class="d-lg-flex align-items-center">
                    <!-- Barre de recherche -->
                    <form class="d-flex me-lg-3 mb-3 mb-lg-0" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
    
                    <!-- Panier + Compte -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('cart.index')}}" >
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge bg-danger rounded-pill position-absolute translate-middle">
                                    {{ count(session()->get('cart', [])) }}
                                </span>
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle" href="#" 
                               role="button" 
                               data-bs-toggle="dropdown" 
                               aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<br><br>
<main class="container-fluid p-0">
        @yield('content')
</main>
<br><br>
    <footer class="footer-modern bg-dark">
        <div class="container pt-5">
            <div class="row g-4">
                <!-- Section À propos -->
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="footer-about">
                        <h5 class="text-uppercase text-white mb-4">À propos</h5>
                        <p class="text-white-70 mb-4">
                            Lebouto Services - Spécialiste en électroménager de qualité à Dakar depuis 2020.
                        </p>
                        <div class="trust-badges">
                            <div class="d-flex gap-2">
                                <img src="https://via.placeholder.com/80x40?text=CGV" alt="Garantie CGV" class="img-fluid">
                                <img src="https://via.placeholder.com/80x40?text=Paiement+Sécurisé" alt="Paiement sécurisé" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Liens rapides -->
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <h5 class="text-uppercase text-white mb-4">Navigation</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2">
                            <a href="#" class="text-white-70 hover-white text-decoration-none d-block py-1">
                                <i class="fas fa-chevron-right me-2 small"></i>Accueil
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-white-70 hover-white text-decoration-none d-block py-1">
                                <i class="fas fa-chevron-right me-2 small"></i>Produits
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-white-70 hover-white text-decoration-none d-block py-1">
                                <i class="fas fa-chevron-right me-2 small"></i>Services
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-white-70 hover-white text-decoration-none d-block py-1">
                                <i class="fas fa-chevron-right me-2 small"></i>Contact
                            </a>
                        </li>
                    </ul>
                </div>
    
                <!-- Coordonnées -->
                <div class="col-md-4 col-lg-3 mb-4">
                    <h5 class="text-uppercase text-white mb-4">Coordonnées</h5>
                    <ul class="list-unstyled contact-info">
                        <li class="mb-3 d-flex">
                            <i class="fas fa-map-marker-alt text-primary mt-1 me-3"></i>
                            <div>
                                <span class="text-white-70 d-block">5 Rue Laperine x Lamine Gueye</span>
                                <span class="text-white-70">Dakar, Sénégal</span>
                            </div>
                        </li>
                        <li class="mb-3">
                            <a href="tel:+221338236172" class="text-white-70 hover-white text-decoration-none d-flex align-items-center">
                                <i class="fas fa-phone text-primary me-3"></i>
                                <div>
                                    <span class="d-block">33 823 61 72</span>
                                    <span class="d-block">76 534 60 60</span>
                                    <span class="d-block">77 651 70 72</span>
                                </div>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="mailto:contact@leboutoservices.com" class="text-white-70 hover-white text-decoration-none d-flex align-items-center">
                                <i class="fas fa-envelope text-primary me-3"></i>
                                contact@leboutoservices.com
                            </a>
                        </li>
                    </ul>
                </div>
    
                <!-- Réseaux sociaux -->
                <div class="col-md-4 col-lg-4 mb-4">
                    <h5 class="text-uppercase text-white mb-4">Réseaux sociaux</h5>
                    <div class="social-links mb-4">
                        <a href="#" class="btn btn-outline-light btn-social rounded-circle me-2 mb-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-social rounded-circle me-2 mb-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-social rounded-circle me-2 mb-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-social rounded-circle me-2 mb-2">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                    
                    <div class="newsletter">
                        <h6 class="text-white mb-3">Abonnez-vous à notre newsletter</h6>
                        <form class="input-group">
                            <input type="email" class="form-control border-0" placeholder="Votre email">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    
            <!-- Copyright et mentions légales -->
            <div class="footer-legal py-4 border-top border-dark">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="legal-links">
                            <a href="#" class="text-white-70 hover-white text-decoration-none me-3">Mentions légales</a>
                            <a href="#" class="text-white-70 hover-white text-decoration-none me-3">CGV</a>
                            <a href="#" class="text-white-70 hover-white text-decoration-none">Politique de confidentialité</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="text-white-70 mb-0">
                            &copy; <span class="current-year"></span> Lebouto Services - 
                            Tous droits réservés - Site concus par 
                            <a href="#" class="text-primary hover-white text-decoration-none">sambou sarr</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
    // Année dynamique
    document.querySelector('.current-year').textContent = new Date().getFullYear();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>