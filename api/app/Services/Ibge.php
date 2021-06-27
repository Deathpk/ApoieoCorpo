<?php


namespace App\Services;

use GuzzleHttp\Client;

class Ibge
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getListOfUfs()
    {
        $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome";
        try{
            $response = $this->client->request('GET', $url);
        } catch(\Exception $e){
           throw new \Exception('Falha ao consultar api de localidades do ibge. Erro: '.$e->getMessage());
        }

        return json_decode($response->getBody());
    }

    public function getMunicipiosByUf($ufCode)
    {
        $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/".$ufCode."/municipios?orderBy=nome";
        try{
            $response = $this->client->request('GET', $url);
        } catch(\Exception $e){
            throw new \Exception('Falha ao consultar api de localidades do ibge. Erro: '.$e->getMessage());
        }

        return json_decode($response->getBody());
    }

}
