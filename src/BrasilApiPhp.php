<?php

namespace BrasilApi\BrasilApiPhp;


class BrasilApiPhp
{
    public $URL_API             = 'https://brasilapi.com.br/api/';
    public $CEP_API             = 'cep/v1/';
    public $CEP_API_V2          = 'cep/v2/';
    public $BANK_API            = 'banks/v1/';
    public $CNPJ_API            = 'cnpj/v1/';
    public $DDD_API             = 'ddd/v1/';
    public $FERIADOS_API        = 'feriados/v1/';
    public $FIPE_API            = 'fipe/v1/';
    public $FIPE_API_MARCAS     = 'fipe/marcas/v1/';
    public $FIPE_API_PRECOS     = 'fipe/preco/v1/';
    public $IBGE_API            = 'ibge/municipios/v1/';
    public $IBGE_API_ESTADOS    = 'ibge/uf/v1';
    
    public function getData($endpoint, $arg)
    {
        
        $this->curl =  curl_init();
        $URL_API = $this->URL_API.$endpoint.$arg;

        curl_setopt_array($this->curl, [
            CURLOPT_URL => $URL_API,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        curl_exec($this->curl);
        curl_close($this->curl);
    }

    public function getCnpj($cnpj)
    {
        return $this->getData($this->CNPJ_API, $cnpj);
    }

    public function getCep($cep)
    {
        return $this->getData($this->CEP_API, $cep);
    }
}
