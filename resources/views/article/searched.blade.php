<x-layout>
    <div class="container-fluid py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h1 class="display-4">Risultati per la ricerca "<span class="fst-italic">{{ $query }}</span>"</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>Nessun articolo corrisponde alla tua ricerca</h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->appends(['query' => $query])->links() }}
        </div>
    </div>
</x-layout>
