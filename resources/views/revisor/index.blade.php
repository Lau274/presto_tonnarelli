<x-layout>
    <div class="container py-5">
        <h1 class="display-5 text-center mb-4">{{ __("ui.revisorZone") }}</h1>

        @if (session()->has('message'))
            <div class="alert alert-success text-center" role="alert">{{ session('message') }}</div>
        @endif
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger text-center" role="alert">{{ session('errorMessage') }}</div>
        @endif

        @if ($article_to_check)
            <div class="row justify-content-center g-4 align-items-center">
                <div class="col-12 col-lg-7">
                    <div class="row g-2">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ $image->getUrl(300, 300) }}"
                                                    class="img-fluid rounded-start"
                                                    alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                            </div>
                                            <div class="col-md-5 ps-3">
                                                <div class="card-body">
                                                    <h5>Labels</h5>
                                                    @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                            #{{ $label }};
                                                        @endforeach
                                                    @else
                                                        <p class="fst-italic">No labels</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card-body">
                                                    <h5>Ratings</h5>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->adult }}"></div>
                                                        </div>
                                                        <div class="col-10">adult</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->violence }}"></div>
                                                        </div>
                                                        <div class="col-10">violence</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                                        </div>
                                                        <div class="col-10">spoof</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->racy }}"></div>
                                                        </div>
                                                        <div class="col-10">racy</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-2">
                                                            <div class="text-center mx-auto {{ $image->medical }}"></div>
                                                        </div>
                                                        <div class="col-10">medical</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="col-6 col-md-4">
                                    <img src="https://picsum.photos/seed/presto-revisor-{{ $i }}/400/300" class="img-fluid rounded shadow-sm w-100" alt="{{ __('ui.placeholderImage') }} {{ $i }}">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article_to_check->title }}</h2>
                            <p class="mb-1"><strong>{{ __("ui.author") }}:</strong> {{ $article_to_check->user->name }}</p>
                            <p class="mb-1"><strong>{{ __("ui.price") }}:</strong> {{ $article_to_check->price }} €</p>
                            <p class="mb-3"><strong>{{ __("ui.category") }}:</strong> {{ __("ui.".$article_to_check->category->name) }}</p>
                            <p class="card-text">{{ $article_to_check->description }}</p>
                            <div class="d-flex flex-wrap gap-2">
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">{{ __("ui.reject") }}</button>
                                </form>
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">{{ __("ui.accept") }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <h2 class="h4">{{ __("ui.noReviewArticles") }}</h2>
                <a href="{{ route('homepage') }}" class="btn btn-outline-dark mt-3">{{ __("ui.backHome") }}</a>
            </div>
        @endif
    </div>
</x-layout>
