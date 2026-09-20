<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric')]
    public $price = '';

    #[Validate('required')]
    public $category = '';

    public function store()
    {
        // La pagina è protetta da auth: anche il submit Livewire deve richiedere il login.
        if (! Auth::check()) {
            return $this->redirectRoute('login');
        }

        $this->validate();

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        $this->reset('title', 'description', 'price', 'category');
        session()->flash('success', __('ui.articleCreated'));
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
