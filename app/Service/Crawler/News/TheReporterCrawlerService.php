<?php

namespace App\Service\Crawler\News;

use App\DTO\NewsDTO;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class TheReporterCrawlerService implements NewCrawlerInterface
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
        $response = $this->httpClient->request('GET', 'https://www.twreporter.org/categories/world');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html, 'https://www.twreporter.org');
        $result = [];
        $crawler
            ->filter('#root > div > div > div:nth-child(2) > div > div > div > div > div > div > div')
            ->each(function (Crawler $node) use (&$result) {
                $url = $node->filter('a')->link()->getUri();
                $title = $node->filter('img')->attr('alt');
                $image = $node->filter('img')->attr('src');
                array_push(
                    $result,
                    new NewsDTO(title: $title, image: $image, url: $url)
                );
            });

        $result = array_slice($result, 0, 6);

        return $result;
    }
}
