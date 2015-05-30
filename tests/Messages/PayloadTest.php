<?php

namespace WyriHaximus\React\Tests\ChildProcess\Messenger\Messages;

use WyriHaximus\React\ChildProcess\Messenger\Messages\Call;
use WyriHaximus\React\ChildProcess\Messenger\Messages\Payload;

class PayloadTest extends \PHPUnit_Framework_TestCase
{
    public function testBasic()
    {
        $payload = new Payload([
            'foo' => 'bar',
        ]);

        $this->assertEquals([
            'foo' => 'bar',
        ], $payload->getPayload());
        $this->assertTrue(isset($payload['foo']));
        $this->assertEquals('bar', $payload['foo']);
        $payload['ajsdhjkfad'] = 'abc';
        $this->assertEquals('abc', $payload['ajsdhjkfad']);
        unset($payload['ajsdhjkfad']);
        $this->assertFalse(isset($payload['ajsdhjkfad']));
        $payload[] = 'abc';
        $this->assertEquals('abc', $payload[0]);
        $this->assertEquals([
            'foo' => 'bar',
            0 => 'abc',
        ], $payload->getPayload());
    }
}
