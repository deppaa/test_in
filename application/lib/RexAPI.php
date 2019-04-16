<?php

namespace application\lib;

class RexAPI
{
	public function jsonAPI($lang, $code, $input=[])
	{
		$url = "https://rextester.com/rundotnet/api";

		$params = [
			'LanguageChoice' => $lang,//язык
			'Program' => $code,//код
			'Input' => $input,//входные параметры
			'CompilerArgs' => '',
		];

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

		$result = curl_exec($ch);
		$result = json_decode($result,true); 

		curl_close($ch);

		return $result;
	}
}
?>