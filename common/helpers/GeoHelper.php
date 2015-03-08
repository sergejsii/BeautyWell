<?php
/**
 * Created by PhpStorm.
 * User: atkaz
 * Date: 28.02.2015
 * Time: 14:38
 */

namespace common\helpers;


class GeoHelper {
    /**
     *  Liefert die Addressbestandteile ausgehend von dem Namen
     *
     *
     */
    public function getByAddress(){

    }


    public  function getGeoDataByByAddress($address)
    {
        $address = urlencode($address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
        $resp_json = file_get_contents($url);
        // decode the json
        $resp = json_decode($resp_json, true);

        if ($resp['status'] == 'OK') {
            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];

            // verify if data is complete
            if ($lati && $longi && $formatted_address) {

                // put the data in the array
                $data_arr['lat'] = $lati;
                $data_arr['lng'] = $longi;
                $data_arr['address'] = $formatted_address;

                return $data_arr;
            } else {
                return false;
            }
        }
    }



    public static  function getGeoData($address,$falseOnPartial=false)
    {
        $address = urlencode($address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
        $resp_json = file_get_contents($url);
        // decode the json
        $resp = json_decode($resp_json, true);

        if ($resp['status'] == 'OK') {

            if($falseOnPartial && $resp['results'][0]['partial_match']){
                return false;
            }

            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];


            $formatted_address = $resp['results'][0]['formatted_address'];

            // verify if data is complete
            if ($lati && $longi && $formatted_address) {

                // put the data in the array
                $data_arr['lat'] = $lati;
                $data_arr['lng'] = $longi;
                $data_arr['address'] = $formatted_address;

                return $data_arr;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
}