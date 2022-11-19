<?php

use LucaTerribili\HelloWorld\Http\Controllers\HelloWorldController;

Route::controller(HelloWorldController::class)->prefix('helloworld')->as('helloworld.')->group(callback: function (
) {
    Route::get('/', 'index')->name('index');
});
