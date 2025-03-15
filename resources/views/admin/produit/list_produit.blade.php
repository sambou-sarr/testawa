@extends('admin.base')
    @section('content')
        <br><br>
    <div class="container">
        <div class="card shadow-lg mb-4 hover-scale">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"> <i class="fas fa-tags"></i> Liste des produits</h4>
                    <a href="{{ route('produit.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Ajouter
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" 
                           placeholder="Rechercher un produit..." onkeyup="filterTable()">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Image produit</th>
                                <th>Libellé</th>
                                <th>Stock</th>
                                <th>Prix</th>
                                <th>Catégorie</th>
                                <th>Capacite</th>
                                <th>garantie</th>
                                <th>puissance</th>
                                <th>couleur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $produit->image1) }}" alt="{{ $produit->libelle }}" style="width: 50px; height: auto;">
                                    </td>
                                    <td>{{ $produit->libelle }}</td>
                                    <td>{{ $produit->stock }}</td>
                                    <td>{{ $produit->prix_u, 0, ',', ' ' }} FCFA</td>
                                    <td>{{ $produit->categorie->libelle }}</td>
                                    <td>{{ $produit->capacite }}</td>
                                    <td>{{ $produit->garantie }}</td>
                                    <td>{{ $produit->puissance }}</td>
                                    <td>{{ $produit->couleur }}</td>
                                    <td>
                                        <a href="{{ route('edit_produit', $produit->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('supprimer_produit', $produit->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirmer la suppression définitive ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection