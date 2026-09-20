<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        $article->save();

        return redirect()->back()->with('message', __('ui.articleAccepted'));
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        $article->save();

        return redirect()->back()->with('message', __('ui.articleRejected'));
    }

    public function requestForm()
    {
        if (Auth::user()->is_revisor) {
            return redirect()->route('revisor.index');
        }

        return view('revisor.request');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('homepage')->with('message', __('ui.revisorRequested'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);

        return redirect()->back();
    }
}
