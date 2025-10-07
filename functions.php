<?php

// const BASE_PATH = __DIR__.'/../';

// autoloader 
// spl_autoload_register(function ($class) {
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

//     require base_path("{$class}.php");
// });

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path($path);
}

function confirm(){
    echo '<form action="" method="post">';
    echo '<p>Czy na pewno chcesz usunąć ten rekord?</p>';
    echo '<button type="submit" name="confirm">Confirm</button>';
    echo '<a href="/">Cancel</a>';
    echo '</form>';
}