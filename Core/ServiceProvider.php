<?php

namespace Core;

use Core\Noticer;
use Core\ValidationException;

class ServiceProvider
{
    public static function boot($sanitizedTableName)
    {
        try {
            $db = App::resolve(Database::class);
            $authenticator = App::resolve(Authenticator::class, [$db, $sanitizedTableName]);
            $table = App::resolve(Table::class, [$db, $sanitizedTableName]);

            App::bind('db', fn() => $db);
            App::bind('authenticator', fn() => $authenticator);
            App::bind('table', fn() => $table);
            App::bind('sanitizedTableName', fn() => $sanitizedTableName);

        } catch (ValidationException $e) {
            die(Noticer::message('error', "No Connection with database: ") . $e->getMessage());
        }
    }
}