@extends('front.app')

@section('title', 'Technews - Accueil')

@section('breaking_news')
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div
                            class="bg-info text-dark text-center font-weight-medium py-2"
                            style="width: 170px"
                        >
                            Breaking News
                        </div>
                        <div
                            class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px">

                            @foreach($articles as $article)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold"
                                       href="{{ route('article.detail', $article->slug) }}">{{ $article->title }}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('news_slider')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @if(count($articles))
                        @foreach($articles as $article)
                            @if($loop->iteration === 5)
                                @break
                            @endif
                            <div
                                class="position-relative overflow-hidden"
                                style="height: 500px"
                            >
                                <img
                                    class="img-fluid h-100"
                                    src="{{ $article->imageUrl() }}"
                                    style="object-fit: cover"
                                />
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a
                                            class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="{{ route('category.article', $article->category->slug) }}"
                                        >{{ $article->category->name }}</a
                                        >
                                        <a class="text-white" href="">
                                            @php $time = $article->created_at @endphp
                                            {{ $time->isoFormat('LL') }}
                                        </a>
                                    </div>
                                    <a
                                        class="h2 m-0 text-white text-uppercase font-weight-bold"
                                        href="{{ route('article.detail', $article->slug) }}"
                                    >{{ $article->title }}</a
                                    >
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @if(count($articles))
                        @foreach($articles as $article)
                            @if($loop->iteration < 5)
                                @continue
                            @endif
                            @if($loop->iteration === 9)
                                @break
                            @endif
                            <div class="col-md-6 px-0">
                                <div
                                    class="position-relative overflow-hidden"
                                    style="height: 250px"
                                >
                                    <img
                                        class="img-fluid w-100 h-100"
                                        src="{{ $article->imageUrl() }}"
                                        style="object-fit: cover"
                                    />
                                    <div class="overlay">
                                        <div class="mb-2">
                                            <a
                                                class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ route('category.article', $article->category->slug) }}"
                                            >{{ $article->category->name }}</a
                                            >
                                            <a class="text-white" href="">
                                                @php $time = $article->created_at @endphp
                                                <small>{{ $time->isoFormat('LL') }}</small>
                                            </a>
                                        </div>
                                        <a
                                            class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                            href="{{ route('article.detail', $article->slug) }}"
                                        >{{ $article->title }}</a
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('featured_news')
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Populaires</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @if($famous_articles)
                    @foreach($famous_articles as $article)
                        <div class="position-relative overflow-hidden" style="height: 300px">
                            <img
                                class="img-fluid h-100"
                                src="{{ $article->imageUrl() }}"
                                style="object-fit: cover"
                            />
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-info text-uppercase font-weight-semi-bold p-2 mr-2" href="">
                                        {{ $article->category->name }}
                                    </a>
                                    <a class="text-white" href="">
                                        @php $time = $article->created_at @endphp
                                        <small>{{ $time->isoFormat('LL') }}</small>
                                    </a>
                                </div>
                                <a
                                    class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ route('article.detail', $article->slug) }}"
                                >{{ $article->title }}</a
                                >
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection

@section('main_section')
    <div class="row">
        @foreach($categories as $category)

            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">
                        {{ $category->name }}
                    </h4>
                    <a
                        class="text-secondary font-weight-medium text-decoration-none"
                        href="{{ route('category.article', $category->slug) }}"
                    >Voire tous</a
                    >
                </div>
            </div>

            @if(count($category->articles))

                @foreach($category->articles as $article)

                    @if($loop->iteration === 3)
                        @break
                    @endif

                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img
                                class="img-fluid w-100"
                                src="{{ $article->imageUrl() }}"
                                style="object-fit: cover"
                            />
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">

                                    <a class="text-white" href="">
                                        @php $time = $article->created_at @endphp
                                        <small>{{ $time->isoFormat('LL') }}</small>
                                    </a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                   href="{{ route('article.detail', $article->slug) }}">
                                    {{ $article->title }}
                                </a>

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
            @endif

        @endforeach

    </div>
@endsection
