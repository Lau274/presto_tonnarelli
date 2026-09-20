<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPresto" aria-controls="navbarPresto" aria-expanded="false" aria-label="Apri navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarPresto">
            <div class="navbar-nav ms-auto align-items-lg-center">
                <a class="nav-link" href="{{ route('homepage') }}">{{ __("ui.home") }}</a>
                <a class="nav-link" href="{{ route('article.index') }}">{{ __("ui.allArticles") }}</a>
                @isset($categories)
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __("ui.categories") }}</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">{{ __("ui.".$category->name) }}</a>
                                </li>
                                @if (!$loop->last)
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endisset
                <form class="d-flex ms-lg-3 my-2 my-lg-0" role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control" placeholder="{{ __('ui.searchPlaceholder') }}" aria-label="{{ __('ui.searchPlaceholder') }}" value="{{ request('query') }}">
                        <button type="submit" class="btn btn-outline-success">{{ __("ui.search") }}</button>
                    </div>
                </form>
                <div class="d-flex align-items-center ms-lg-3 gap-1" aria-label="{{ __('ui.chooseLanguage') }}">
                    <x-_locale lang="it" />
                    <x-_locale lang="uk" />
                    <x-_locale lang="es" />
                </div>
                @auth
                    @if (Auth::user()->is_revisor)
                        <a class="nav-link position-relative me-lg-2" href="{{ route('revisor.index') }}">
                            {{ __("ui.revisorZone") }}
                            <span class="badge rounded-pill text-bg-danger ms-1">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('revisor.request') }}">{{ __("ui.workWithUs") }}</a>
                    @endif
                    <a class="nav-link" href="{{ route('create.article') }}">{{ __("ui.createArticle") }}</a>
                    <span class="nav-link">{{ __("ui.hello") }}, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark ms-lg-2">{{ __("ui.logout") }}</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">{{ __("ui.login") }}</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __("ui.register") }}</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
