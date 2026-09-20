<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_images = [];

    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric')]
    public $price = '';

    #[Validate('required')]
    public $category = '';

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images' => 'array|max:6',
            'temporary_images.*' => 'image|max:1024',
        ]);

        if (count($this->images) + count($this->temporary_images) > 6) {
            $this->addError('temporary_images', __('ui.maxImages'));
            $this->temporary_images = [];
            return;
        }

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }

        $this->temporary_images = [];
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }

    public function store()
    {
        // La pagina è protetta da auth: anche il submit Livewire deve richiedere il login.
        if (! Auth::check()) {
            return $this->redirectRoute('login');
        }

        $this->validate();
        $this->validate([
            'images' => 'array|max:6',
            'images.*' => 'image|max:1024',
        ]);

        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        foreach ($this->images as $image) {
            $newFileName = "articles/{$article->id}";
            $newImage = $article->images()->create([
                'path' => $image->store($newFileName, 'public'),
            ]);
            dispatch(new ResizeImage($newImage->path, 300, 300));
        }

        $this->reset('title', 'description', 'price', 'category', 'images', 'temporary_images');
        session()->flash('success', __('ui.articleCreated'));
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
