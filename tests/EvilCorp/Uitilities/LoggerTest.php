<?php

namespace Tests\EvilCorp\Utilities;

use EvilCorp\Utilities\FileWrapper;
use EvilCorp\Utilities\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    private $loggerPath = '/var/log/foo.log';

    /** @covers EvilCorp\Utilities\Logger::log() */
    public function testLog()
    {
        $fileWrapperProphecy = $this->prophesize(FileWrapper::class);
        $fileWrapperProphecy
            ->filePutContents($this->loggerPath, 'foo bar')
            ->willReturn(7)
            ->shouldBeCalled();

        $logger = new Logger($fileWrapperProphecy->reveal(), $this->loggerPath);
        $logger->log('foo bar');
    }

    /** @covers EvilCorp\Utilities\Logger::log() */
    public function testLogFails()
    {
        $fileWrapperProphecy = $this->prophesize(FileWrapper::class);
        $fileWrapperProphecy
            ->filePutContents($this->loggerPath, 'foo bar')
            ->willThrow(new \Exception)
            ->shouldBeCalled();

        $logger = new Logger($fileWrapperProphecy->reveal(), $this->loggerPath);

        $this->expectException(\Exception::class);
        $logger->log('foo bar');
    }

    /** @covers EvilCorp\Utilities\Logger::log() */
    public function testLoggerUsesCorrectLogFilePath()
    {
        $anotherLoggerPath = '/var/log/evilcorp.log';

        $fileWrapperProphecy = $this->prophesize(FileWrapper::class);
        $fileWrapperProphecy
            ->filePutContents($anotherLoggerPath, 'foo bar')
            ->willReturn(false)
            ->shouldBeCalled();

        $logger = new Logger($fileWrapperProphecy->reveal(), $anotherLoggerPath);

        $this->expectException(\Exception::class);
        $logger->log('foo bar');
    }

}
