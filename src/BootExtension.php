<?php

namespace Liuhelong\laravelAdmin\LogViewer;

use Encore\Admin\Admin;

trait BootExtension
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('log-viewer', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('logs', 'Liuhelong\laravelAdmin\LogViewer\LogController@index')->name('log-viewer-index');
            $router->get('log', 'Liuhelong\laravelAdmin\LogViewer\LogController@index')->name('log-viewer-file');
            $router->get('log/tail', 'Liuhelong\laravelAdmin\LogViewer\LogController@tail')->name('log-viewer-tail');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Log viewer', 'logs', 'fa-database');

        parent::createPermission('Logs', 'ext.log-viewer', 'logs*');
    }
}
