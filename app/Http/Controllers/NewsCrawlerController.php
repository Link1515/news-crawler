<?php

namespace App\Http\Controllers;

use App\Service\Crawler\News\NewsLensCrawlerService;
use App\Service\Crawler\News\BbcCrawlerService;
use Illuminate\Http\Request;

class NewsCrawlerController extends Controller
{
    public function __construct(
        private readonly BbcCrawlerService $bbcCrawlerService,
        private readonly NewsLensCrawlerService $newsCrawlerController
    ) {
    }

    public function index()
    {
        $newsList = [
            'BBC' => $this->bbcCrawlerService->crawlPopularList(),
            'News Lens' => $this->newsCrawlerController->crawlPopularList()
        ];
        return view('index', ['newsList' => $newsList]);
    }

}
