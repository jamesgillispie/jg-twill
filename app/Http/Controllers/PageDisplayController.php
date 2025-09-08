<?php
 
namespace App\Http\Controllers;
 
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
 
class PageDisplayController extends Controller
{
    public function show(string $slug, PageRepository $pageRepository): View
    {
        $page = $pageRepository->forSlug($slug);
 
        if (!$page) {
            abort(404);
        }
 
        return view('site.page', ['item' => $page]);
    }

    /**
     * Display the homepage.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home(): View
    {
        if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
            /** @var \App\Models\Page $frontPage */
            $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();
 
            if ($frontPage->published) {
                return view('site.page', ['item' => $frontPage]);
            }
        }
 
        abort(404);
    }
}