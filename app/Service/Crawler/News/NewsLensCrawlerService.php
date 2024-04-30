<?php

namespace App\Service\Crawler\News;

use App\DTO\NewsDTO;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class NewsLensCrawlerService
{
    public function __construct(
        private readonly Client $httpClient,
    ) {
    }

    /**
     * @return NewsDTO[]
     */
    public function crawlPopularList(): array
    {
        $response = $this->httpClient->request('GET', 'https://www.thenewslens.com/category/world');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
        $result = [];
        $crawler
            ->filter('#list-container > article > .list-container:not(.sponsoredd-container)')
            ->each(function (Crawler $node) use (&$result) {
                $url = $node->filter('.info-box h2.title > a')->attr('href');
                $title = $node->filter('.info-box h2.title')->text();
                $image = $node->filter('.img-box img')->attr('src');
                array_push(
                    $result,
                    new NewsDTO(title: $title, image: $image, url: $url)
                );
            });

        $result = array_slice($result, 0, 6);

        return $result;
    }
}
