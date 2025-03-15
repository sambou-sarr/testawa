@extends('admin.base')
    @section('content')
        <br><br>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Détails de la Commande #{{ $commande->id }}</h1>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour aux commandes</a>
    </div>

    <!-- Informations client -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informations client</h5>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nom</dt>
                <dd class="col-sm-9">{{ $commande->nom }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $commande->email }}</dd>

                <dt class="col-sm-3">Téléphone</dt>
                <dd class="col-sm-9">{{ $commande->telephone }}</dd>

                <dt class="col-sm-3">Adresse</dt>
                <dd class="col-sm-9">{{ nl2br(e($commande->adresse)) }}</dd>

                <dt class="col-sm-3">Date</dt>
                <dd class="col-sm-9">{{ date('d/m/Y H:i', strtotime($commande->date_commande)) }}</dd>

                <dt class="col-sm-3">Statut</dt>
                <dd class="col-sm-9">
                    <dd class="col-sm-9">
                        <span class="badge bg-{{ $commande->getStatusBadgeColor() }}">
                            {{ ucfirst($commande->statut) }}
                        </span>
                    </dd>
                </dd>
                <a href="{{ route('commandes.download.facture', $commande->id) }}" class="btn btn-primary">Télécharger la facture</a>
            </dl>
        </div>
    </div>

    <!-- Articles commandés -->
    <div class="card">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Articles commandés</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th class="text-end">Quantité</th>
                        <th class="text-end">Prix unitaire</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalGeneral = 0; @endphp
                    @foreach ($articles as $article)
                        @php 
                            $totalLigne = $article->prix_unitaire * $article->quantite;
                            $totalGeneral += $totalLigne;
                        @endphp
                        <tr>
                            <td>{{ $article->produit_nom }}</td>
                            <td class="text-end">{{ $article->quantite }}</td>
                            <td class="text-end">{{ number_format($article->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                            <td class="text-end">{{ number_format($totalLigne, 0, ',', ' ') }} FCFA</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-active">
                        <th colspan="3" class="text-end">Total général</th>
                        <th class="text-end">{{ number_format($totalGeneral, 0, ',', ' ') }} FCFA</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection