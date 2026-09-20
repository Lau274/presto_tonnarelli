<x-layout>
    <div class="container pt-4">
        @if (session()->has('message'))
            <div class="alert alert-success text-center" role="alert">{{ session('message') }}</div>
        @endif
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger text-center" role="alert">{{ session('errorMessage') }}</div>
        @endif
    </div>
    <div class="container py-5 text-center">
        <h1 class="display-4">Presto.it</h1>
        <p>{{ __("ui.heroSubtitle") }}</p>
        <a class="btn btn-dark" href="{{ route('create.article') }}">{{ __("ui.createArticle") }}</a>
    </div>

    <div class="container py-5">
        <h2 class="text-center mb-4">{{ __("ui.latestArticles") }}</h2>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{ __("ui.noArticles") }}</h3>
                </div>
            @endforelse
        </div>
        <div class="text-center">
            <a class="btn btn-outline-dark" href="{{ route('article.index') }}">{{ __("ui.allListings") }}</a>
        </div>
    </div>
</x-layout>
