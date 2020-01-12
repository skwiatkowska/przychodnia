<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Resources')
    ->exclude('Tests')
    ->in('C:\xampp\htdocs\przychodnia\app')
;

//return new Sami\Sami('C:\xampp\htdocs\przychodnia\app');

return new Sami($iterator, array(
    'title'                => 'Przychodnia',
    'build_dir'            => __DIR__.'/docs',
    'cache_dir'            => __DIR__.'/cache',
));