@extends('front.app')

@section('title', 'Technews - Categorie')

@section('main_section')
    <div class="row">
        @if(count($category->articles))
            @foreach($category->articles as $article)
                <div class="col-lg-6">
                    <div class="position-relative mb-3">
                        <img
                            class="img-fluid w-100"
                            src="{{ $article->imageUrl() }}"
                            style="object-fit: cover"
                        />
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-2">
                                <a class="text-body" href=""
                                    @php $time = $article->created_at @endphp
                                ><small>{{ $time->isoFormat('LL') }}</small></a
                                >
                            </div>
                            <a
                                class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                href="{{ route('article.detail', $article->slug) }}"
                            >{{ $article->title }}</a>

                        </div>
                        <div
                            class="d-flex justify-content-between bg-white border border-top-0 p-4"
                        >
                            <div class="d-flex align-items-center">
                                <img
                                    class="rounded-circle mr-2"
                                    src="{{ asset('back_auth/assets/profile/'.$article->author->image) }}"
                                    width="25"
                                    height="25"
                                    alt=""
                                />
                                <small>{{ $article->author->name }}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ml-3"
                                ><i class="far fa-eye mr-2"></i>{{ $article->views }}</small
                                >
                                <small class="ml-3"
                                ><i class="far fa-comment mr-2"></i>{{ $article->comments->count() }}</small
                                >
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Il n'y a pas d'articles pour cette categorie</p>
        @endif
    </div>
@endsection
