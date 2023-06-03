<?php

use App\Events\UserLogin;
use App\Models\Page;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('robots.txt', 'RobotController');
Route::get('/sms',function (){
//    ini_set("soap.wsdl_cache_enabled", "0");
//    try {
//        $client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));
//        $parameters['username'] = "09113381347";
//        $parameters['password'] = "B@8g^66U";
//        $parameters['from'] = "500010001100";
//        $parameters['to'] = array("9358320577");
//        $parameters['text'] ="سلام";
//        $parameters['isflash'] = true;
//        $parameters['udh'] = "";
//        $parameters['recId'] = array(0);
//        $parameters['status'] = 0x0;
//        echo "One:".$client->GetCredit(array("username"=>$parameters['username'],"password"=>$parameters['password']))->GetCreditResult;
//        echo "Two:".$client->SendSms($parameters)->SendSmsResult;
////        echo $status;
//    } catch (SoapFault $ex) {
//        echo $ex->faultstring;
//    }
//    event(new UserLogin(\App\Models\User::first()));
});