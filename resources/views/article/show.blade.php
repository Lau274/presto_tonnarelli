<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h1 class="display-4">Dettaglio dell'articolo: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12 col-md-6 mb-3">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/seed/presto1/600/400" class="d-block w-100 rounded shadow" alt="Immagine segnaposto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/presto2/600/400" class="d-block w-100 rounded shadow" alt="Immagine segnaposto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/seed/presto3/600/400" class="d-block w-100 rounded shadow" alt="Immagine segnaposto 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successiva</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center">
                <h2>Titolo: {{ $article->title }}</h2>
                <h4>Prezzo: {{ $article->price }} €</h4>
                <h5>Descrizione:</h5>
                <p>{{ $article->description }}</p>
                <p>Categoria: <a href="{{ route('byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a></p>
            </div>
        </div>
    </div>
</x-layout>
