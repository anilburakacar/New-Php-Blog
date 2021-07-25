<?php

$meta = [
    'title' => setting('title'),
    'description' => setting('description'),
    'keywords' => setting('keywords')
];

//view fonksiyonuyla indexi çağırdık
require view('index');