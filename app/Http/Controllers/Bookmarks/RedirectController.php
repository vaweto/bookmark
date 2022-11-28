<?php

namespace App\Http\Controllers\Bookmarks;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use JustSteveKing\UriBuilder\Uri;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Bookmark $bookmark
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke(Request $request, Bookmark $bookmark): Application|RedirectResponse|Redirector
    {
        $url = Uri::fromString(
            uri: $bookmark->url,
        )->addQueryParam(
            key: 'utm_campaign',
            value: 'bookmarker_' . auth()->id(),
        )->addQueryParam(
            key: 'utm_source',
            value: 'Bookmarker App'
        )->addQueryParam(
            key: 'utm_medium',
            value: 'website',
        );

        return redirect(
            $bookmark->url,
        );
    }
}
