<x-layout>
    <div class="container py-5">
        <h1 class="display-5 text-center mb-4">Zona revisore</h1>

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
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-6 col-md-4">
                                <img src="https://picsum.photos/seed/presto-revisor-{{ $i }}/400/300"
                                     class="img-fluid rounded shadow-sm w-100"
                                     alt="Immagine segnaposto {{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article_to_check->title }}</h2>
                            <p class="mb-1"><strong>Autore:</strong> {{ $article_to_check->user->name }}</p>
                            <p class="mb-1"><strong>Prezzo:</strong> {{ $article_to_check->price }} €</p>
                            <p class="mb-3"><strong>Categoria:</strong> {{ $article_to_check->category->name }}</p>
                            <p class="card-text">{{ $article_to_check->description }}</p>
                            <div class="d-flex flex-wrap gap-2">
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                                </form>
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Accetta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <h2 class="h4">Nessun articolo da revisionare</h2>
                <a href="{{ route('homepage') }}" class="btn btn-outline-dark mt-3">Torna alla homepage</a>
            </div>
        @endif
    </div>
</x-layout>
