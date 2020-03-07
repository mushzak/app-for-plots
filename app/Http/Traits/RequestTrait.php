<?php

namespace App\Http\Traits;

use App\RosReestraInfo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

trait RequestTrait {

    /**
     * @param $cadasterNumber
     */
    public function getData($cadasterNumber)
{
    try {
        $array = [
            "collection" => [
                "plots" => $cadasterNumber
            ]];
        $client = new Client(['headers' => ['Content-Type' => 'application/json']]);
        $result = $client->get('http://pkk.bigland.ru/api/test/plots', ['body' => json_encode($array)]);
        $response = json_decode($result->getBody());
        foreach ($response as $info) {
            $rosReestraInfo = new RosReestraInfo();
            $rosReestraInfo->c_n = $info->number;
            $rosReestraInfo->address = $info->data->attrs->address;
            $rosReestraInfo->cost = $info->data->attrs->cad_cost;
            $rosReestraInfo->area = $info->data->attrs->area_value;
            $rosReestraInfo->save();
        }
    } catch (\Exception $e) {
        return ['success' => false, json_encode($e->getMessage())];
    }

}
}
