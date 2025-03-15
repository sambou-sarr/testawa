<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title', 'Tableau de bord Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style> 
            .chart-container {
                width: 100%; /* La largeur du conteneur prend toute la place disponible */
                height: 500px; /* Hauteur personnalisée */
            }
            #salesChart {
                width: 100% !important; /* Le graphique prend toute la largeur du conteneur */
                height: 100% !important; /* Le graphique prend toute la hauteur du conteneur */
            }
        .brand-logo {
            height: 60px; /* Increase the height */
            max-width: 100%; /* Ensure the logo doesn't exceed the container width */
            transition: transform 0.3s ease;
        }
       
        .admin-header {
            background: linear-gradient(135deg, #4b79a1 0%, #283e51 100%);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            }
            
            .nav-link {
                color: rgba(255, 255, 255, 0.9) !important;
                margin: 0 1rem;
                padding: 0.5rem 1rem !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background: rgba(255, 255, 255, 0.1);
                transform: translateY(-2px);
            }

            .nav-link.active {
                background: rgba(255, 255, 255, 0.2);
                font-weight: 500;
            }

            .brand-logo {
                height: 40px;
                transition: transform 0.3s ease;
            }

            .user-dropdown {
                border-left: 1px solid rgba(255, 255, 255, 0.1);
                padding-left: 1.5rem;
            }

            @media (max-width: 992px) {
                .user-dropdown {
                    border-left: none;
                    padding-left: 0;
                    margin-top: 1rem;
                }
            }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="{{ route('dashboard') }}">
                    <img src="{{ asset('logo1.png') }}" alt="Logo Admin" class="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="adminNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('list_produit') ? 'active' : '' }}" href="{{ route('list_produit') }}">
                                <i class="fas fa-boxes"></i> Produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('commandes.index') ? 'active' : '' }}" href="{{ route('commandes.index') }}">
                                <i class="fas fa-shopping-cart"></i> Commandes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('list_categorie') ? 'active' : '' }}" href="{{ route('list_categorie') }}">
                                <i class="fas fa-tags"></i> Catégories
                            </a>
                        </li>
                    </ul>
    
                    <!-- Bouton de déconnexion aligné à droite -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white btn btn-danger px-3" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    
    
    <div class="containeur">
        @yield('content')
    </div>
    <br><br><br><br>
    <footer class="footer mt-auto py-5 text-white" style="background: linear-gradient(90deg, #4b79a1, #283e51);">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>À propos de nous</h5>
                    <p class="text-muted">
                        Lebouto Services est une entreprise spécialisée dans la vente d'appareils électroménagers de qualité.
                        Nous offrons des produits fiables et un service client exceptionnel.
                    </p>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Liens rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Produits</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Services</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Contactez-nous</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Adresse : 5 Rue Laperine x Lamine Gueye Dakar Sénégal 
                        </li>
                        <li class="mb-2">
                            <p><i class="fas fa-phone me-2"></i>33 823 61 72</p>
                            <p><i class="fas fa-phone me-2"></i>+221 76 534 60 60</p>
                            <p><i class="fas fa-phone me-2"></i>+221 77 651 70 72</p>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            contact@leboutoservices.com
                        </li>
                        <li class="mb-2">
                             <a href="https://wa.me/221773881690" class="text-white text-decoration-none">
                                <i class="fab fa-whatsapp me-2"></i>
                                 WhatsApp
                             </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Suivez-nous</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-tiktok"></i></a>
                        <a href="https://wa.me/221773881690" class="text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">
                        &copy; 2025 Lebouto Services. Tous droits réservés.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script >  
     document.addEventListener('DOMContentLoaded', function() {
        try {
            // Configuration du graphique
            const chartConfig = {
                type: 'line',
                data: {
                    labels: @json($chartData['labels'] ?? []), // Fallback sur tableau vide
                    datasets: [{
                        label: 'Ventes hebdomadaires (FCFA)',
                        data: @json($chartData['data'] ?? []), // Fallback sur tableau vide
                        borderColor: '#4b79a1',
                        backgroundColor: 'rgba(75, 121, 161, 0.1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 3,
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: '#333',
                                font: {
                                    size: 14,
                                    family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            callbacks: {
                                label: (context) => {
                                    const value = context.parsed.y || context.raw;
                                    return ` ${value.toLocaleString()} FCFA`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            },
                            ticks: {
                                color: '#666',
                                callback: (value) => `${value.toLocaleString()} FCFA`,
                                font: { 
                                    size: 12 
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#666',
                                font: { 
                                    size: 12 
                                },
                                autoSkip: true,
                                maxTicksLimit: 7 // Maximum 7 ticks pour les jours de la semaine
                            }
                        }
                    }
                }
            };
    
            // Initialisation du graphique
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, chartConfig);
    
            // Redimensionnement responsive
            window.addEventListener('resize', () => salesChart.resize());
    
        } catch (error) {
            console.error('Erreur d\'initialisation du graphique:', error);
            document.getElementById('salesChart').innerHTML = `
                <div class="alert alert-danger">
                    Impossible de charger les données du graphique
                </div>
            `;
        }
    });</script>
</body>
</html>
