<div class="col-lg-4">
    <!-- Social Follow debut -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Suivez Nous</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: #39569e"
            >
                <i
                    class="fab fa-facebook-f text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Fans</span>
            </a>
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: #52aaf4"
            >
                <i
                    class="fab fa-twitter text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: #0185ae"
            >
                <i
                    class="fab fa-linkedin-in text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Connects</span>
            </a>
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: #c8359d"
            >
                <i
                    class="fab fa-instagram text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none mb-3"
                style="background: #dc472e"
            >
                <i
                    class="fab fa-youtube text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Subscribers</span>
            </a>
            <a
                href=""
                class="d-block w-100 text-white text-decoration-none"
                style="background: #055570"
            >
                <i
                    class="fab fa-vimeo-v text-center py-4 mr-3"
                    style="width: 65px; background: rgba(0, 0, 0, 0.2)"
                ></i>
                <span class="font-weight-medium">12,345 Followers</span>
            </a>
        </div>
    </div>
    <!-- Social Follow fin -->

    <!-- Ads Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">
                Advertisement
            </h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <a href=""
            ><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""
                /></a>
        </div>
    </div>
    <!-- Ads fin -->

    <!-- Recent News debut -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Recents</h4>
        </div>

        <div class="bg-white border border-top-0 p-3">
            @if(count($global_recent_articles))
                @foreach($global_recent_articles as $article)
                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                        <img class="img-fluid" width="110px" height="100%" src="{{ $article->imageUrl() }}" alt="" />
                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                            <div class="mb-2">
                                <a class="badge badge-info text-uppercase font-weight-semi-bold p-1 mr-2" href="{{ route('category.article', $article->category->slug) }}">
                                    {{ $article->category->name }}
                                </a>
                                <a class="text-white" href="">
                                    @php $time = $article->created_at @endphp
                                    <small>{{ $time->isoFormat('LL') }}</small>
                                </a>
                            </div>
                            <a
                                class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden"
                                href="{{ route('article.detail', $article->slug) }}"
                            >{{ $article->title }}</a
                            >
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    <!-- Popular News fin -->

    <!-- Newsletter debut -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>
                Aliqu justo et labore at eirmod justo sea erat diam dolor diam
                vero kasd
            </p>
            <div class="input-group mb-2" style="width: 100%">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    placeholder="Your Email"
                />
                <div class="input-group-append">
                    <button class="btn btn-info font-weight-bold px-3">
                        Sign Up
                    </button>
                </div>
            </div>
            <small>Lorem ipsum dolor sit amet elit</small>
        </div>
    </div>
    <!-- Newsletter fin -->

    <!-- Tags debut -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                @foreach($global_tags as $tag)
                    <a href="#" class="btn btn-sm btn-outline-secondary m-1">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Tags fin -->
</div>
