<?php

namespace App\Http\Controllers\Bookmarks;

use App\Actions\Bookmarks\CreateBookmarkAndTags;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bookmarks\StoreRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{

    public function __construct(protected CreateBookmarkAndTags $createBookmarkAndTags){}

    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            $this->createBookmarkAndTags->handle(
                request: $request->validated(),
                id: auth()->id(),
            );
            $status = 'success';
        }catch (\Exception $exception) {
            $status = 'error';
        }

        return redirect()->route('dashboard')->with('status', __($status));


    }
}
