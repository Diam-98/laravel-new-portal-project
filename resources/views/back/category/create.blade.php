@extends('back.app')

@section('title', 'Dashboard - Creation d\'une categorie')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">@if(isset($category)) Modifier @else Ajouter @endif une categorie</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom de la categorie</label>
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                value="{{ isset($category) ? old('name', $category->name) : old('name') }}"
                            />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea
                                class="form-control"
                                rows="5"
                                id="comment"
                                name="description"
                            >
                                {{ isset($category) ? old('description', $category->description) : old('description') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Activation</label>
                            <select class="form-control" id="sel2" name="isActive">
                                <option @if(isset($category)) @selected($category->isActive == 1) @endif value="1">Activer</option>
                                <option @if(isset($category)) @selected($category->isActive == 0) @endif value="0">Ne pas activer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection
