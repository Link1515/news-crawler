<?php

namespace App\Http\Controllers;

use App\Service\Crawler\News\NewsLensCrawlerService;
use App\Service\Crawler\News\BbcCrawlerService;
use App\Service\Crawler\News\TheReporterCrawlerService;
use Illuminate\Http\Request;

class NewsCrawlerController extends Controller
{
    public function __construct(
        private readonly BbcCrawlerService $bbcCrawlerService,
        private readonly NewsLensCrawlerService $newsCrawlerController,
        private readonly TheReporterCrawlerService $theReporterCrawlerService
    ) {
    }

    public function index()
    {
        $newsList = [
            'BBC' => $this->bbcCrawlerService->crawlPopularList(),
            'News Lens' => $this->newsCrawlerController->crawlPopularList(),
            'The Reporter' => $this->theReporterCrawlerService->crawlPopularList()
        ];
        return view('index', ['newsList' => $newsList]);
    }

}
