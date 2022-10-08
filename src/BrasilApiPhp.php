<?php

namespace BrasilApi\BrasilApiPhp;


class BrasilApiPhp
{
    public $URL_API             = 'https://brasilapi.com.br/api/';
    public $BANK_API            = 'banks/v1';
    public $CEP_API             = 'cep/v1';
    public $CEP_API_V2          = 'cep/v2';
    public $CNPJ_API            = 'cnpj/v1';
    public $DDD_API             = 'ddd/v1/';
    public $FERIADOS_API        = 'feriados/v1';
    public $FIPE_API            = 'fipe/tabelas/v1';
    public $FIPE_API_MARCAS     = 'fipe/marcas/v1';
    public $FIPE_API_PRECOS     = 'fipe/preco/v1';
    public $IBGE_API            = 'ibge/municipios/v1';
    public $IBGE_API_ESTADOS    = 'ibge/uf/v1';
    
    public function getData($endpoint, $arg = null)
    {
        
        $this->curl =  curl_init();
        $URL_API = $this->URL_API.$endpoint.$arg;
        curl_setopt_array($this->curl, [
            CURLOPT_URL             => $URL_API,
            CURLOPT_CUSTOMREQUEST   => 'GET',
            CURLOPT_RETURNTRANSFER  => TRUE 
        ]);

        $res = curl_exec($this->curl);
        curl_close($this->curl);

        echo $res;
    }

    public function getAllBanks()
    {
        return $this->getData($this->BANK_API);
    }

    public function getAllBanksByCode(int $code)
    {
        return $this->getData($this->BANK_API, $code);
    }

    public function getCep(string $cep)
    {
        return $this->getData($this->CEP_API, $cep);
    }
    
    public function getCepV2(string $cep)
    {
        return $this->getData($this->CEP_API_V2, $cep);
    }
    
    public function getCnpj(string $cnpj)
    {
        return $this->getData($this->CNPJ_API, $cnpj);
    }

    public function getDDD(int $ddd)
    {
        return $this->getData($this->DDD_API, $ddd);
    }

    public function getFeriadosPorAno(int $ano)
    {
        return $this->getData($this->FERIADOS_API, $ano);
    }

    public function getTabelaFipe()
    {
        return $this->getData($this->FIPE_API);
    }

    public function getTabelaFipePorTipoVeiculo(string $veiculo)
    {
        return $this->getData($this->FIPE_API_MARCAS, $veiculo);
    }

    public function getPrecoVeiculoPorCodigoFipe($codigoFipe)
    {
        return $this->getData($this->FIPE_API_PRECOS, $codigoFipe);
    }

    public function getMunicipios(string $siglaUF)
    {
        return $this->getData($this->IBGE_API, $siglaUF);
    }

    public function getEstados()
    {
        return $this->getData($this->IBGE_API_ESTADOS);
    }

    public function getEstadosPorSigla(string $siglaUF)
    {
        return $this->getData($this->IBGE_API_ESTADOS, $siglaUF);
    }
}
