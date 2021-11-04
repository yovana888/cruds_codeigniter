<?php

namespace App\Peticiones_Externas;
use Goutte\Client;

class peTipoCambio
{
	public function obtenerTipoCambioSBS($modedaDestino)
	{
		$client = new Client();
		$crawler = $client->request('GET', 'https://www.sbs.gob.pe/app/pp/sistip_portal/paginas/publicacion/tipocambiopromedio.aspx');

		$fechacambio = $crawler->filter('#ctl00_cphContent_lblFecha')->text(); // Tipo de Cambio al 31/12/2020
		$fechacambio = substr($fechacambio, 18, 10);
		// en caso que el peso mexicano este en la lista => si total es 10 esta el peso else no esta
		$total = $crawler->filter('.APLI_fila3')->count();

		if ($total == 9) {
			$i = 4;
			$j = 5;
		} else {
			$i = 5;
			$j = 6;
		}

		// realizamos un swith case para extraer el tipo de cambio
		switch ($modedaDestino) {
			case "USD": //Dólar de N.A.3.6183.624
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__0')->text(); 
				$compra = substr($data, 14, 5);
				$venta = substr($data, 19, 5);
				break;
			case "CAD": //Dólar Canadiense2.6913.107
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__1')->text(); 
				$compra = substr($data, 16, 5);
				$venta = substr($data, 21, 5);
				break;
			case "GBP": //libra
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__2')->text(); 
				$compra = substr($data, 16, 5);
				$venta = substr($data, 21, 5);
				break;
			case "JPY": //Yen Japonés
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__3')->text(); 
				$compra = substr($data, 11, 5);
				$venta = substr($data, 16, 5);
				break;
			case "CHF": // FRANCO
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__' . $i)->text();
				$compra = substr($data, 12, 5);
				$venta = substr($data, 17, 5);
				break;
			case "EUR": //Euro2.6913.107
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__' . $j)->text(); 
				$compra = substr($data, 4, 5);
				$venta = substr($data, 9, 5);
				break;
		}
		$respuesta = ['fechacambio' => $fechacambio, 'compra' => $compra, 'venta' => $venta];
		return $respuesta;
	}

	public function obtenerTipoCambioOTROS($modedaDestino)
	{
		$client = new Client();
		$crawler = $client->request('GET', 'https://www.sbs.gob.pe/app/pp/SISTIP_PORTAL/Paginas/Publicacion/TipoCambioContable.aspx');

		$fechacambio = $crawler->filter('#ctl00_cphContent_lblFecha')->text();
		$fechacambio = substr($fechacambio, 18, 10);

		switch ($modedaDestino) {

			case "CLP": //Peso Chileno
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__8')->text();
				$venta = substr($data, 17, 8);
				break;

			case "ARS": //Peso Argentino
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__1')->text();
				$venta = substr($data, 24, 8);
				break;
			
			case "BOB": //Boliviano
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__4')->text();
				$venta = substr($data, 43, 8);
				break;

            case "BRL": //Real
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__5')->text();
				$venta = substr($data, 11, 8);
				break;
			
			case "COP": //Peso Colombiano
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__11')->text();
				$venta = substr($data, 24, 8);
				break;

			case "MXN": //Peso Mexicano
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__25')->text();
				$venta = substr($data, 20, 8);
				break;

			case "UYU": //Peso Uruguayo
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__40')->text();
				$venta = substr($data, 21, 8);
				break;

			case "CNY": //Yuan
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__10')->text();
				$venta = substr($data, 10, 8);
				break;

            case "AUD": //Dólar Australiano
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__2')->text();
				$venta = substr($data, 27, 8);
				break;

			case "BDT": //Taka Bangladesí
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__3')->text();
				$venta = substr($data, 26, 8);
				break;

			case "BGN": //Lev
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__6')->text();
				$venta = substr($data, 12, 8);
				break;
			
			case "KRW": //Won Surcoreano
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__12')->text();
				$venta = substr($data, 40, 8);
				break;
			
			case "DKK": //Corona Danesa
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__13')->text();
				$venta = substr($data, 23, 8);
				break;
			
			case "RUB": //Rublo
				$data = $crawler->filter('#ctl00_cphContent_rgTipoCambio_ctl00__16')->text();
				$venta = substr($data, 29, 8);
				break;

			default:
				$venta = 'error';
		}
		$compra = ' ';
		$respuesta = ['fechacambio' => $fechacambio, 'compra' => $compra, 'venta' => $venta];
		return $respuesta;
	}
}
