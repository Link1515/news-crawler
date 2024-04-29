<?php

namespace App\DTO;

class NewsDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $image,
        public readonly string $url,
    ) {
    }

}
