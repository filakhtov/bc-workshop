<?php

namespace EvilCorp\Utilities;

class FileWrapper
{
    const FLAG_NONE = 0;

    public function filePutContents($filename, $data, $flag = self::FLAG_NONE)
    {
        return file_put_contents($filename, $data, $flag);
    }
}
