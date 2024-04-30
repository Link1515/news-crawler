<?php

namespace App\Service\Crawler\News;

interface NewCrawlerInterface
{
    public function crawlPopularList(): array;
}
