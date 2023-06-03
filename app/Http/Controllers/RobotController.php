<?php

namespace App\Http\Controllers;

use MadWeb\Robots\Robots;

class RobotController extends Controller
{
    public function __invoke(Robots $robots)
    {
        $robots->addUserAgent('*');

        if($robots->shouldIndex()) {
            $robots->addDisallow('/admin');
            $robots->addDisallow('/user');
        } else {
            $robots->addDisallow('/');
        }

        return response($robots->generate(), 200, ['content-type' => 'text/plain']);
    }
}
