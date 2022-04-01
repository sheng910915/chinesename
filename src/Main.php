<?php

namespace Sheng\Chinesename;

use Exception;
use Sheng\Chinesename\constants\Chinese;
include './constants/Chinese.php';
class Main
{
    const RANDOM_LEN_NAME = 0; // Random length name  It can only be two, three, four

    /**
     * @throws Exception
     */
    public static function getName($firstName = '', $len = 0)
    {
        $firstNameLen = count(Chinese::FIRST_NAME);
        $lastNameLen = count(Chinese::LAST_NAME);
        if (!is_string($firstName)) {
            throw new Exception('first name must be a character');
        }
        if (mb_strlen($firstName) > 2) {
            throw new Exception('first name cannot exceed two characters');
        }
        $name = $firstName ?: Chinese::FIRST_NAME[rand(0, $firstNameLen - 1)];
        $lastNameCount = $len - 1;
        if ($len == self::RANDOM_LEN_NAME) {
            $lastNameCount = rand(1, 2);
        }
        for ($i = 0; $i < $lastNameCount; $i++) {
            $name .= Chinese::LAST_NAME[rand(0, $lastNameLen - 1)];
        }
        return $name;
    }
}