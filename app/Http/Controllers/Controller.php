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






    /**
     * END::CLASS
     */
}
