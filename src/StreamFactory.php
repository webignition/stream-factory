<?php

namespace webignition\StreamFactory;

use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;
use webignition\StreamFactoryInterface\StreamFactoryInterface;

class StreamFactory implements StreamFactoryInterface
{
    public function createFromString(string $content): StreamInterface
    {
        $stream = fopen('php://temp', 'r+');
        if ($content !== '') {
            fwrite($stream, $content);
            fseek($stream, 0);
        }

        return new Stream($stream);
    }
}
