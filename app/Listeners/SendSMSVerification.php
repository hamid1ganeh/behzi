<?php

namespace App\Listeners;

use App\Events\UserLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SoapFault;

class SendSMSVerification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));
            $parameters['username'] = env('SMS_USERNAME');
            $parameters['password'] = env('SMS_PASSWORD');
            $parameters['from'] = env('SMS_FROM');
            $parameters['to'] = array(ltrim($event->user->mobile, '0'));
            $parameters['text'] ="سلام";
            $parameters['isflash'] = true;
            $parameters['udh'] = "";
            $parameters['recId'] = array(0);
            $parameters['status'] = 0x0;
            echo "One:".$client->GetCredit(array("username"=>env('SMS_USERNAME'),"password"=>env('SMS_PASSWORD')))->GetCreditResult;
            echo "Two:".$client->SendSms($parameters)->SendSmsResult;
//        echo $status;
        } catch (SoapFault $ex) {
            echo $ex->faultstring;
        }
    }
}
