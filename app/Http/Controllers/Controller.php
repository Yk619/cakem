<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function send_FCM_push($title, $body, $token, $extra = [], $icon = '')
    {

        if(isset($token) and !empty($token) and !is_null($token) and trim($token) != '123')
        {
			$optionBuilder = new OptionsBuilder();
			$optionBuilder->setTimeToLive(60 * 20);

			//$this->data["notification_id"] = $this->notification;

			//$notificationBuilder = new PayloadNotificationBuilder($title);
			//$notificationBuilder->setBody($body)->setSound('default');
			//$notification = $notificationBuilder->build();

			$dataBuilder = new PayloadDataBuilder();
			$dataBuilder->addData(['title'=> $title, 'body' => $body]);

			$option = $optionBuilder->build();
			//$notification = $notificationBuilder->build();
			$data = $dataBuilder->build();
			
			//dd($data);

			try {
				$downstreamResponse = FCM::sendTo($token, $option, null, $data);
			//dd($downstreamResponse);	
			}catch (\Exception $e) {
				//print_r($e); die;
				return false;
			}
			$downstreamResponse->numberSuccess();
			$downstreamResponse->numberFailure();
			$downstreamResponse->numberModification();

			//return Array - you must remove all this tokens in your database
			$downstreamResponse->tokensToDelete();

			//return Array (key : oldToken, value : new token - you must change the token in your database )
			$downstreamResponse->tokensToModify();

			//return Array - you should try to resend the message to the tokens in the array
			$downstreamResponse->tokensToRetry();

			// return Array (key:token, value:errror) - in production you should remove from your database the tokens

			return true;
        }else{
            return false;
        }

    }

}