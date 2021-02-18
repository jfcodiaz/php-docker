<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class HelloTest extends TestCase
{

    public function testSayHelloWorld()
    {
        $helloObject = new \App\Hello();
        
        $this->assertSame('Hello World!', $helloObject->sayHelloWorld());
    }
}
