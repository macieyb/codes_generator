<?php

namespace CodeGenerator;

class CliRequestHandler extends CodeGenerationRequest
{
    private
        $codesQty,
        $codesLength,
        $fileName,
        $filePath;

    public function __construct($request)
    {
        $this->codesQty = $request['numberOfCodes'];
        $this->codesLength = $request['lengthOfCode'];
        $this->fileName = $this->setFileName($request);
        $this->filePath = self::CODES_FILE_DIR . $this->fileName;
        $this->validateCodeGenerationRequirements($this->codesQty, $this->codesLength);
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

        print_r(
            [
                "status" => "Done!",
                "message" => "Your codes have been generated and saved as {$this->fileName}",
            ]
        );
    }

    protected function setFileName($request = false)
    {
        $fileName = parent::setFileName();
        if ($request && !empty($request['file'])) {
            $requestFile = explode('/', $request['file']);
            $fileName = $requestFile[count($requestFile) - 1];
        }
        return $fileName;
    }
}
