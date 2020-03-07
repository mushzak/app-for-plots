<?php

namespace App\Http\Controllers;

use App\Http\Traits\RequestTrait;
use App\RosReestraInfo;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Psy\Util\Json;

class WebController extends Controller
{
    use RequestTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $array = explode(', ', $request->c_n);
        $data = RosReestraInfo::select('c_n')->whereIn('c_n', $array)->get();
        $dbData = $data->pluck('c_n')->toArray();
        $difference = array_diff($array, $dbData);

        if (!empty($difference)) {
            $res = $this->getData($difference);
        }
        if (isset($res) && !$res['success']) {
            return view('welcome', compact('data'))->withErrors('Wrong data form');
        }
        $data = RosReestraInfo::whereIn('c_n', $array)->get();

        return view('welcome', compact('data'));
    }
}
