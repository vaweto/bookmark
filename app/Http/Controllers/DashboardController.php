<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function __invoke(Request $request): View|Factory|Application
    {
        return view('dashboard', [
            'bookmarks' => Bookmark::query()
                ->where('user_id', auth()->id())
                ->get()
        ]);
    }
}
