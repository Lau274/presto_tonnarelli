<div>
    @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form wire:submit="store" class="bg-body-tertiary shadow rounded p-4 my-4">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __("ui.title") }}</label>
            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" wire:model.blur="title">
            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __("ui.description") }}</label>
            <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" wire:model.blur="description"></textarea>
            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{ __("ui.price") }}</label>
            <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" wire:model.blur="price">
            @error('price') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">{{ __("ui.category") }}</label>
            <select id="category" class="form-control @error('category') is-invalid @enderror" wire:model.blur="category">
                <option value="" disabled>{{ __("ui.selectCategory") }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.".$category->name) }}</option>
                @endforeach
            </select>
            @error('category') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark">{{ __("ui.create") }}</button>
        </div>
    </form>
</div>
