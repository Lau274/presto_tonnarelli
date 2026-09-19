<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPresto" aria-controls="navbarPresto" aria-expanded="false" aria-label="Apri navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarPresto">
            <div class="navbar-nav ms-auto align-items-lg-center">
                <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
                @isset($categories)
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                                </li>
                                @if (!$loop->last)
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endisset
                @auth
                    @if (Auth::user()->is_revisor)
                        <a class="nav-link position-relative me-lg-2" href="{{ route('revisor.index') }}">
                            Zona revisore
                            <span class="badge rounded-pill text-bg-danger ms-1">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('revisor.request') }}">Lavora con noi</a>
                    @endif
                    <a class="nav-link" href="{{ route('create.article') }}">Inserisci annuncio</a>
                    <span class="nav-link">Ciao, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark ms-lg-2">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
