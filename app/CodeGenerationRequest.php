<?php

namespace CodeGenerator;

abstract class CodeGenerationRequest
{
    const
        CODES_FILE_DIR = __DIR__ . "/../tmp/",
        MIN_CODE_QTY = 1,
        MAX_CODE_QTY = 1000000,
        MIN_CODE_LENGTH = 8,
        MAX_CODE_LENGTH = 30;

    public abstract function createCodes();

    protected function setFileName($request = false)
    {
        return md5(time()) . ".txt";
    }

    protected function validateCodeGenerationRequirements($codesQty, $codesLength)
    {
        if ($codesQty < self::MIN_CODE_QTY
            || $codesQty > self::MAX_CODE_QTY
            || $codesLength < self::MIN_CODE_LENGTH
            || $codesLength > self::MAX_CODE_LENGTH
        ) {
            die('Invalid code generator arguments, check requirements');
        }
    }

    public function saveCodesToFile(array $codesArr, $filePath)
    {
        file_put_contents($filePath, implode("\n", $codesArr) . "\n");
    }

    // There is no duplicates when generating 1M of 10-characters long codes
    public function generateCode(int $length)
    {
        $code = "";
        $allowedCharacters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($allowedCharacters);

        for ($i = 0; $i < $length; $i++) {
            $code .= $allowedCharacters[random_int(0, $max - 1)];
        }

        return $code;
    }
}
