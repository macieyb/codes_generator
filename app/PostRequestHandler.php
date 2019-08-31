<?php

namespace CodeGenerator;

class PostRequestHandler extends CodeGenerationRequest
{
    private
        $codesLength,
        $codesQty,
        $fileName,
        $filePath;

    public function __construct($request)
    {
        $this->codesQty = $request['codesQty'];
        $this->codesLength = $request['codesLength'];
        $this->fileName = $this->setFileName(false);
        $this->filePath = self::CODES_FILE_DIR . $this->fileName;
        $this->validateCodeGenerationRequirements($this->codesQty, $this->codesLength);
    }

    private function getDownloadFilePath()
    {
        return "tmp/{$this->fileName}";
    }

    public function createCodes()
    {
        $codesArr = [];
        for ($i = 0; $i < $this->codesQty; $i++) {
            $codesArr[] = $this->generateCode($this->codesLength);
        }
        if (count($codesArr) > 0) {
            $this->saveCodesToFile($codesArr, $this->filePath);
        };

        return $this->getDownloadFilePath();
    }
}
