<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Crawler\News\BbcCrawlerService;

class NewsCrawlerController extends Controller
{
    public function __construct(private readonly BbcCrawlerService $bbcCrawlerService)
    {
    }

    public function index()
    {
        $newsList = [
            'BBC' => $this->bbcCrawlerService->crawlPopularList(),
        ];
        return view('index', ['newsList' => $newsList]);
    }

}
