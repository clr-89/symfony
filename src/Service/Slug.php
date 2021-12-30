<?php

namespace App\Service;

class Slug
{
    public function generate(string $input): string
    {
        $input = trim($input);
        $specialCharacter = ['à','ç'];
        $normalCharacter = ['a', 'c'];
        $newInput = str_replace($specialCharacter, $normalCharacter, $input);
        $finalInput = strtolower($newInput);
        return str_replace(' ', '-', $finalInput);

    }
}