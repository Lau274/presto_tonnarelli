<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>Lavora con noi</h1>
                <p>Richiedi di diventare revisore di Presto.it.</p>
                <p>Nome: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <form method="POST" action="{{ route('become.revisor') }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Invia richiesta</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
