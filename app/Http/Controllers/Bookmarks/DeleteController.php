<?php

namespace App\Http\Controllers\Bookmarks;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Bookmark $bookmark
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Bookmark $bookmark): RedirectResponse
    {
        $bookmark->delete();
        return redirect()->route('dashboard');
    }
}
