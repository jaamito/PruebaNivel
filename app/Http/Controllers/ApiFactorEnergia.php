<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

header('Content-Type: application/json; charset=utf-8');

/*
|--------------------------------------------------------------------------
| API Controller
|--------------------------------------------------------------------------
|
| Author: Ian Lopez
|
*/

class ApiFactorEnergia extends Controller
{
    //URL API
    public function urlApi(){
        return "https://api.stackexchange.com/2.3/questions";
    }

    //Call Api Satck Exchange
    public function callApi($method, $url, $data = false){
        $curl = curl_init(); 

        if($data){
            $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        //Options CURL
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        
        $result = curl_exec($curl);

        if(!$result){
            return response()->json([
                'Causa' => curl_error($curl), 
                'Error' => curl_errno($curl), 
            ]);
        }

        curl_close($curl);
        return $result;

    }

    //URL 1
    public function info(){

        return response()->json([
            'URL 1' => array("/api/info','Devuelve todas las URL de nuestra API."), 
            'URL 2' => array("/api/random','Devuelve preguntas de stackOverflow aleatoriamente. "), 
            'URL 3' => array("URL"  => "/api/getQuestions?tagged=php&fromdate=1293840000&todate=1294444800",
                             "Info" =>"Devuelve todas las preguntas con un tag **¡Obligatorio!** de post, con una fecha de inicio y una fecha de fin **¡Opcional!**", 
                             "Parámetros" => array('tagged'   => array("Obligatorio", 'Escribe un tag para buscar ej. PHP, Python, Java'),
                                                   'fromdate' => array("Opcional", 'Escribe fecha de inicio en TimeStamp ej. 1293840000'),
                                                   'todate'   => array("Opcional", 'Escribe fecha de fin en TimeStamp ej. 1294444800'))
                                             ), 
        ]);	

    }

    //URL 2
    public function random(){
        
        //Parámetros
        $url  = $this->urlApi();
        $randomTag = array( 'php', 'java' , 'python');

        $data = array('site'=>'stackoverflow',
                      'fromdate'=>'1293840000',
                      'todate'=>'1294444800',
                      'tagged'=> "'" . $randomTag[rand(0, 2)] . "'",
                    );
                    
        $get_data = $this->callApi('GET', $url, $data);

        return $get_data;

    }

    //URL 3
    public function getQuestions(Request $request){
        
        //Parámetros
        $url  = $this->urlApi();
        $data = array('site' => 'stackoverflow');   

        if($request->get("tagged") == ''){
            return response()->json([
                'Error' => "Sin parámetro tagged no puedo devolverte nada."
            ]); 
        }else{
            $data = array_merge($data, array('tagged' => $request->get("tagged")));
        }

        if($request->get("fromdate") && $request->get("fromdate") != ''){$data = array_merge($data, array('fromdate' => $request->get("fromdate")));}
        if($request->get("todate") && $request->get("todate") != ''){$data = array_merge($data, array('todate' => $request->get("todate")));}

        $get_data = $this->callApi('GET', $url, $data);
        return $get_data;
       
    }

}
