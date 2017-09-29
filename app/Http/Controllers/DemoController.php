<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Demo456; // App\Demo\Facade\DemoFacade

class DemoController extends Controller
{
    public function testFacade()
    {
        echo Demo456::helloWorld();
    }
}

/*
Tạo PHP Class File.
Bind Class đó vào Service Provider.
Đăng ký Service Provider vào providers trong file config\app.php.
Tạo class extends từ lluminate\Support\Facades\Facade.
Đăng ký class ở bước 4 vào aliases trong file config\app.php.

http://larrestful.dev/demo
*/
