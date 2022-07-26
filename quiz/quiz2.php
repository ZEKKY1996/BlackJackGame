<?php

echo '名前を入力してください' . PHP_EOL;
$name = trim(fgets(STDIN));
const MAX_NAME_LENGTH = 10;

if (mb_strlen($name) < MAX_NAME_LENGTH) {
    echo 'OK' . PHP_EOL;
} else {
    echo '長すぎ' . PHP_EOL;
}
