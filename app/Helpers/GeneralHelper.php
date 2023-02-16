<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class GeneralHelper
{
    public static function check($value){
        if (!is_null($value)){
            return $value;
        }
        else{
            return 'N/A';
        }
    }

    public static function upload_file($file, $folder, $old_file_with_path=null){
        if (!is_null($old_file_with_path)){
            $old_file=explode('/',$old_file_with_path);
            $old_file = $old_file[4];
            if(file_exists(public_path() .'/'.$folder.'/'.$old_file)){
                unlink(public_path() .'/'.$folder.'/'.$old_file);
            }
        }

        $random=Str::random(5);
        $name = time().$random.'.'.$file->extension();
        $file->move(public_path().'/'.$folder.'/', $name);
        return $name;
    }

    public static function delete_file($file_with_path, $folder){
        if (!is_null($file_with_path)){
            $old_file=explode('/',$file_with_path);
            $file = $old_file[4];
            if(file_exists(public_path() .'/'.$folder.'/'.$file)){
                unlink(public_path() .'/'.$folder.'/'.$file);
            }
        }
    }

    public static function date_time_DB($date_time,$timezone=''){
        if (!$timezone){
            $timezone = self::getTimeZoneFromIP();
        }
        $current_date = date('Y-m-d H:i',strtotime($date_time));
        $date_now = Carbon::createFromFormat('Y-m-d H:i', date('Y-m-d H:i', strtotime($current_date)),$timezone);
        $date_now->setTimezone('UTC');
        return $date_now;
    }

    public static function date_time_view($date_time){
        $timezone = self::getTimeZoneFromIP();
        $current_date = date('Y-m-d H:i',strtotime($date_time));
        $date_now = Carbon::createFromFormat('Y-m-d H:i', date('Y-m-d H:i', strtotime($current_date)),'UTC');
        $date_now->setTimezone($timezone);
        return $date_now;
    }

    public static function date($date){
        return date('d-m-Y', strtotime($date));
    }
    public static function frontEndDateTimeView($date_time){
        return date('Y-m-d H:i', strtotime($date_time));
    }
    public static function getTimeZoneFromIP(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        //return $ipaddress;
        $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ipaddress));
        if($ip_data && $ip_data->geoplugin_countryName != null){
            $result = $ip_data->geoplugin_timezone;
        }
        //return $result;
        $dtz = new \DateTimeZone($result);
        $time_in_sofia = new \DateTime(date("Y-m-d"), $dtz);
        $offset = $dtz->getOffset( $time_in_sofia ) / 3600;
         return "GMT" . ($offset < 0 ? $offset : "+".$offset);
    }
}
