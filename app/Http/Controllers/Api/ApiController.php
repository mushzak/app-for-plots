<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\RequestTrait;
use App\RosReestraInfo;
use http\Env\Response;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use RequestTrait;
    /**
     * @param $numbers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($numbers)
    {
        $array = explode(', ', $numbers);
        $data = RosReestraInfo::select('c_n')->whereIn('c_n', $array)->get();
        $dbData = $data->pluck('c_n')->toArray();
        $difference = array_diff($array, $dbData);

        if (!empty($difference)) {
            $res = $this->getData($difference);
        }
        if (isset($res) && !$res['success']) {
            return response()->json(['Status' => false, 'msg' => 'Wrong Form data'], 403);
        }
        $data = RosReestraInfo::whereIn('c_n', $array)->get();

        return $data;
    }
}
