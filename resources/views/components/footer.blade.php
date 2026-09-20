<footer class="bg-body-tertiary text-center py-3">
    <p class="mb-2">Presto.it</p>
    @auth
        @if (Auth::user()->is_revisor)
            <a href="{{ route('revisor.index') }}" class="btn btn-success btn-sm">{{ __("ui.revisorZone") }}</a>
        @else
            <h5>{{ __("ui.wantRevisor") }}</h5>
            <p>{{ __("ui.revisorExplain") }}</p>
            <a href="{{ route('revisor.request') }}" class="btn btn-success btn-sm">{{ __("ui.becomeRevisor") }}</a>
        @endif
    @else
        <h5>{{ __("ui.wantRevisor") }}</h5>
        <p>{{ __("ui.loginToRequest") }}</p>
        <a href="{{ route('login') }}" class="btn btn-success btn-sm">{{ __("ui.login") }}</a>
    @endauth
</footer>
