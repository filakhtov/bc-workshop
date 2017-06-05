<?php

namespace Tests\EvilCorp\Utilities;

use EvilCorp\Utilities\FileWrapper;
use PHPUnit\Framework\TestCase;

class FileWrapperTest extends TestCase
{
    public function testFilePutContents()
    {
        $expected = 'cool thing';

        $fileWriter = new FileWrapper();
        $fileWriter->filePutContents('/tmp/test', $expected);

        static::assertSame($expected, file_get_contents('/tmp/test'));
    }
}
