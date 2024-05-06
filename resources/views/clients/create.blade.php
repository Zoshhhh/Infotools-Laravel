@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouveau client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomCli">Nom</label>
            <input type="text" class="form-control" id="nomCli" name="nomCli" required>
        </div>
        <div class="form-group">
            <label for="prenomCli">Prénom</label>
            <input type="text" class="form-control" id="prenomCli" name="prenomCli" required>
        </div>
        <div class="form-group">
            <label for="mailCli">Email</label>
            <input type="email" class="form-control" id="mailCli" name="mailCli" required>
        </div>
        <div class="form-group">
            <label for="telCli">Téléphone</label>
            <input type="tel" class="form-control" id="telCli" name="telCli" required>
        </div>
        <div class="form-group">
            <label for="villeCli">Ville</label>
            <input type="text" class="form-control" id="villeCli" name="villeCli" required>
        </div>
        <div class="form-group">
            <label for="rueCli">Rue</label>
            <input type="text" class="form-control" id="rueCli" name="rueCli" required>
        </div>
        <div class="form-group">
            <label for="cpCli">Code Postal</label>
            <input type="text" class="form-control" id="cpCli" name="cpCli" required>
        </div>
        <div class="form-group">
            <label for="prospect">Prospect</label>
            <select class="form-control" id="prospect" name="prospect" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Créer Client</button>
    </form>
</div>
@endsection
