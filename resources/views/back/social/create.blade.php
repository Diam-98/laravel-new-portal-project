@extends('back.app')

@section('title', 'Dashboard - Ajout Reseaux sociaux')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">@if(isset($social)) Modifier @else Ajouter @endif  une un reseau social</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ isset($social) ? route('social.update', $social) : route('social.store') }}" method="POST">
                @csrf
                @if(isset($social))
                    @method('PUT')
                @endif
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom du reseau</label>
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                value="{{ isset($social) ? old('name', $social->name) : old('name') }}"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Lien</label>
                        <input
                            class="form-control"
                            type="text"
                            name="link"
                            value="{{ isset($social) ? old('link', $social->link) : old('link') }}"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Icon</label>
                        <input
                            class="form-control"
                            type="text"
                            name="icon"
                            value="{{ isset($social) ? old('icon', $social->icon) : old('icon') }}"
                        />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">
                    Enregistrer
                </button>
        </form>
    </div>
@endsection
