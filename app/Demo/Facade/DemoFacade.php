<?php
namespace App\Demo\Facade;

use Illuminate\Support\Facades\Facade;

class DemoFacade extends Facade
{
    protected static function getFacadeAccessor()
    { 
        return 'demo123';
    }
}
