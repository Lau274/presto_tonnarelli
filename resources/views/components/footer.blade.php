<footer class="bg-body-tertiary text-center py-3">
    <p class="mb-2">Presto.it</p>
    @auth
        @if (Auth::user()->is_revisor)
            <a href="{{ route('revisor.index') }}" class="btn btn-success btn-sm">Zona revisore</a>
        @else
            <h5>Vuoi diventare revisore?</h5>
            <p>Cliccando il bottone sottostante farai richiesta al nostro admin</p>
            <a href="{{ route('revisor.request') }}" class="btn btn-success btn-sm">Diventa revisore</a>
        @endif
    @else
        <h5>Vuoi diventare revisore?</h5>
        <p>Accedi per inviare la richiesta al nostro admin</p>
        <a href="{{ route('login') }}" class="btn btn-success btn-sm">Accedi</a>
    @endauth
</footer>
