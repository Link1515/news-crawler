<?php

namespace App\Service\Crawler\News;

use App\DTO\NewsDTO;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class BbcCrawlerService
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
        $response = $this->httpClient->request('GET', 'https://www.bbc.com/zhongwen/trad');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html, );
        $result = [];
        $crawler
            ->filter('[aria-labelledby="Top-stories"] > div + div > ul > li')
            ->each(function (Crawler $node) use (&$result) {
                $url = $node->filter('h3 a')->attr('href');
                $title = $node->filter('h3 a')->text();
                $image = $node->filter('img')->attr('src');
                array_push(
                    $result,
                    new NewsDTO(title: $title, image: $image, url: 'https://www.bbc.com' . $url)
                );
            });
        $result = array_slice($result, 0, 6);

        return $result;
    }
}
