<?php
namespace App\Traits;
use App\Models\SmsServer;
use Illuminate\Http\Request;

trait SmsServerTraits {

    public function Send_Sms_GW($to,$msg){
		$url="https://portal.adnsms.com/api/v1/secure/send-sms";
        $data= array(
		'api_key' => "KEY-wlplazjri3r76qul3ifa4q5enzjvigte",
		'api_secret' => "oiy4YRPS1FjPzxO4",
		'request_type' => "SINGLE_SMS",
		'message_type' => "TEXT",
		'mobile' => $to,
		'message_body' =>$msg,
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = json_decode(curl_exec($ch));
        $status= $smsresult->api_response_code;
     
            if ($status ==200) {
               return 1;
            } else {
                //failed to sent do whatever you want
                return 0;
            }
        }
    

        
}



  