<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Ramsey\Uuid\Type\Integer;

use function PHPUnit\Framework\isEmpty;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $sufix = '';
    protected $prefix = '';
    protected $bladeSuffix = '';

    public function bladeSuffix(){
        switch (request()->session()->get('userSession.AdminLevel')) {
            case '1':
                // $this->bladeSuffix = '-admin';
                $this->bladeSuffix = '';
                break;

                default:
                $this->bladeSuffix = '';
                break;
        }
        return $this->bladeSuffix;
    }


    protected function api( $segment = null ){
        $current_uri_segments = request()->segments();
        return is_null($segment) ? $current_uri_segments : in_array($segment, $current_uri_segments);
    }

    protected function columnDataArr(array $requestArray, array $keys = null, array $fills = [] ) {
        $requestArray = array_filter( $requestArray);
        if( ! count( $requestArray ) ){
            // echo 'subhash';print_r( $requestArray );exit('chandra');
            return null;
        }
        $k = $keys ?? array_keys($requestArray);
        $k = array_merge($k, array_keys( $fills ));
        array_unshift($requestArray , null);
        $requestArray = array_values($requestArray);
        $r = call_user_func_array("array_map", $requestArray);
        // dd($k, $requestArray);
        array_walk($r, function($v)use(&$re, $k, $fills){
            if (is_array($v)) {
                $v = array_merge($v, $fills);
            } else {
                $v = array_merge([$v], $fills);
            }
            $ck = count($k);
            $cv = count($v);
            if ($ck > $cv) {
                $k = array_slice($k, 0, $cv);
            } elseif($cv > $ck) {
                $v = array_slice($v, 0, $ck);
            }

            $re[] = array_combine($k, $v);

        });
        return $re;
    }


// Function to get the client IP address
public function get_client_ip($env = false) {
    $ipaddress = '';
    if($env){
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    }else{
        if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}


public function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}




    /**
     * END::CLASS
     */
}
