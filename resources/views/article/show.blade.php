<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h1 class="display-4">{{ __("ui.articleDetails") }}: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12 col-md-6 mb-3">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @if ($article->images->count())
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="{{ __('ui.photos') }} {{ $key + 1 }}: {{ $article->title }}">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/presto1/600/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.placeholderImage') }}">
                            </div>
                        @endif
                    </div>
                    @if ($article->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __("ui.previous") }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __("ui.next") }}</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 text-center">
                <h2>{{ __("ui.title") }}: {{ $article->title }}</h2>
                <h4>{{ __("ui.price") }}: {{ $article->price }} €</h4>
                <h5>{{ __("ui.description") }}:</h5>
                <p>{{ $article->description }}</p>
                <p>{{ __("ui.category") }}: <a href="{{ route('byCategory', ['category' => $article->category]) }}">{{ __("ui.".$article->category->name) }}</a></p>
            </div>
        </div>
    </div>
</x-layout>
