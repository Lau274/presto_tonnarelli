<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h1 class="display-5">{{ __("ui.categoryArticles") }} <span class="fw-bold">{{ __("ui.".$category->name) }}</span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{ __("ui.noCategoryArticles") }}</h3>
                    @auth
                        <a class="btn btn-dark my-5" href="{{ route('create.article') }}">{{ __("ui.publishArticle") }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
