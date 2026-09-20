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
        <div class="mb-3">
            <label for="temporary_images" class="form-label">{{ __('ui.photos') }}</label>
            <input type="file" id="temporary_images" class="form-control @error('temporary_images') is-invalid @enderror" wire:model.live="temporary_images" multiple accept="image/*">
            @error('temporary_images.*') <p class="text-danger">{{ $message }}</p> @enderror
            @error('temporary_images') <p class="text-danger">{{ $message }}</p> @enderror
            @error('images.*') <p class="text-danger">{{ $message }}</p> @enderror
            @error('images') <p class="text-danger">{{ $message }}</p> @enderror
        </div>
        @if (!empty($images))
            <div class="mb-3">
                <p>{{ __('ui.photoPreview') }}</p>
                <div class="row border border-success rounded shadow py-4 g-3">
                    @foreach ($images as $key => $image)
                        <div class="col-6 col-md-4 d-flex flex-column align-items-center" wire:key="photo-preview-{{ $key }}">
                            <div class="img-preview shadow rounded" style="background-image: url('{{ $image->temporaryUrl() }}');"></div>
                            <button type="button" class="btn btn-danger btn-sm mt-1" wire:click="removeImage({{ $key }})" aria-label="{{ __('ui.removePhoto') }} {{ $key + 1 }}">{{ __('ui.removePhoto') }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark">{{ __("ui.create") }}</button>
        </div>
    </form>
</div>
