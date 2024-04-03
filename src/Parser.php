<?php

namespace Parser;

use Symfony\Component\Yaml\Yaml;

function parseFile(string $file): object
{
    // if (!file_exists($file)) {
    //     throw new \Exception('No such file!');
    // }

    $fileData = (string) file_get_contents($file, true);
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    // var_dump($extension);

    return match ($extension) {
        'json' => json_decode($fileData),
        'yml', 'yaml' => Yaml::parse($fileData, Yaml::PARSE_OBJECT_FOR_MAP),
        default => throw new \Exception('No such file!'),
    };
    // if ($extension === 'json') {
    //     return json_decode($fileData);
    // }
    // if ($extension === 'yml' || $extension === 'yaml') {
    //     return Yaml::parse($fileData, Yaml::PARSE_OBJECT_FOR_MAP);
    // }
}
