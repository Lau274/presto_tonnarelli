<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>{{ __("ui.workWithUs") }}</h1>
                <p>{{ __("ui.requestRevisorDesc") }}</p>
                <p>{{ __("ui.name") }}: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <form method="POST" action="{{ route('become.revisor') }}">
                    @csrf
                    <button type="submit" class="btn btn-success">{{ __("ui.sendRequest") }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
