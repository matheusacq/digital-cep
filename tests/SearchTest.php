<?php

use PHPUnit\Framework\TestCase;
use Matheus\DigitalCep\Search;

class SearchTest extends TestCase{

    /**
     * @dataProvider dadosTeste
     */
    public function testGetAddressFromZipcodeDefaulUsage(string $input, array $esperado){
        $resultado = new Search;
        $resultado = $resultado->getAddressFromZipcode($input);

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTeste(){
        return [
            "Endereço Paraça da Sé" => [
                "01001000",
                [
                    "cep" => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004",
                ]
            ],
            "Endereço Qualquer" => [
                "01001001",
                [
                    "cep" => "01001-001",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado par",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004",
                ]
            ],
        ];
    }
}
