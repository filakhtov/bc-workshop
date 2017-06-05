<?php

namespace EvilCorp\Utilities;

use \EvilCorp\Utilities\FileWrapper;

class Logger
{
    private $fileWrapper;
    private $logFilePath;

    public function __construct(FileWrapper $fileWrapper, string $logFilePath)
    {
        $this->logFilePath = $logFilePath;
        $this->fileWrapper = $fileWrapper;
    }

    public function log(string $data): Logger
    {
        $success = @$this->fileWrapper->filePutContents($this->logFilePath, $data);
        if ($success === FALSE) {
            throw new \Exception();
        }

        return $this;
    }
}
