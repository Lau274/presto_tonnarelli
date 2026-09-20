<form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn p-1" aria-label="{{ __('ui.chooseLanguage') }}: {{ $lang === 'uk' ? 'English' : ($lang === 'it' ? 'Italiano' : 'Español') }}">
        <img src="{{ asset('vendor/blade-flags/country-'.$lang.'.svg') }}" width="32" height="32" alt="{{ $lang }}">
    </button>
</form>
