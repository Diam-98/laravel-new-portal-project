@extends('back.app')

@section('title', 'Dashboard - Page ajout d\'article');

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">@if(isset($article)) Modifier @else Ajouter @endif un article</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ isset($article) ? route('article.update', $article) : route('article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($article))
                    @method('PUT')
                @endif
                <div class="row formtype">

                    @if(isset($article))
                        <div class="col-12">
                            <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" style="width: 100%" height="200">
                        </div>
                    @endif

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de l'article</label>
                            <input
                                class="form-control"
                                type="text"
                                name="title"
                                value="{{ isset($article) ? old('title', $article->title) : old('title') }}"
                            />
                            @error('name')
                                <p class="text-reed-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categorie</label>
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach($categories as $category)
                                    <option @if(isset($article)) @selected($article->category_id == $category->id) @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-reed-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="customFile"
                                    name="image"
                                />
                                <label class="custom-file-label" for="customFile"
                                >Choisir une image</label
                                >
                            </div>
                        </div>
                    </div>

                    <textarea
                        class="form-control"
                        rows="5"
                        id="comment"
                        name="description">
                        {{ isset($article) ? old('description', $article->description) : old('description')}}
                  </textarea>
                        @error('description')
                            <p class="text-reed-500 mt-2">{{ $message }}</p>
                        @enderror

                        @if(isset($article))
                            <div class="col-md-12 mt-3">
                                @foreach($article->tags as $tag)
                                    <label class="label label-info btn btn-primary">{{ $tag->name }}</label>
                                @endforeach

                            </div>
                        @endif

                        <div class="col-md-12 mt-3">
                            <input class="form-control" type="text" data-role="tagsinput" name="tags">
                            @if($errors->has('tags'))
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            @endif
                        </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" @if(isset($article)) @checked($article->isActive == 1) @else checked @endif type="radio" id="article_active" name="isActive" value="1">
                            <label class="form-check-label" for="article_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isActive == 0) @endif id="article_inactive" name="isActive" value="0">
                            <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" @if(isset($article)) @checked($article->isSharable == 1) @else checked @endif id="article_share_active" name="isSharable" value="1">
                            <label class="form-check-label" for="article_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_share_inactive" @if(isset($article)) @checked($article->isSharable == 0) @endif name="isSharable" value="0">
                            <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_active" @if(isset($article)) @checked($article->isComment == 1) @else checked @endif name="isComment" value="1" >
                            <label class="form-check-label" for="article_comment_active">Autorise</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_inactive" @if(isset($article)) @checked($article->isComment == 0) @endif name="isComment" value="0">
                            <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Enregistrer l'article</button>
                </div>
            </form>
        </div>
    </div>
@endsection
