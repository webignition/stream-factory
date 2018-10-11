<?php

namespace webignition\StreamFactory\Tests;

use GuzzleHttp\Psr7\Stream;
use webignition\StreamFactory\StreamFactory;
use webignition\StreamFactoryInterface\StreamFactoryInterface;

class StreamFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var StreamFactoryInterface
     */
    private $factory;

    protected function setUp()
    {
        parent::setUp();

        $this->factory = new StreamFactory();
    }

    public function testCreateFromString()
    {
        $content = 'stream content';

        $stream = $this->factory->createFromString($content);

        $this->assertInstanceOf(Stream::class, $stream);
        $this->assertEquals($content, $stream->getContents());
    }
}
