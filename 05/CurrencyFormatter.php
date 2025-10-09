<?php

class CurrencyFormatter
{
    public function format($value, $dataCurrency = ["after" => "PLN"], $formatData = ["decimal" => ",", "thousands" => ' '])
    {
        $separatedValue = $this->decimal($value, $formatData);
        $finalValue = $this->addCurrency($separatedValue, $dataCurrency);
        return $finalValue;
    }

    public function addCurrency($value, $dataCurrency)
    {
        $currency = $dataCurrency["after"] ?? NULL;
        $currencyBefore = $dataCurrency["before"] ?? NULL;
        if(isset($currency)){
            $currencyFormated = $value . " $currency";
        }
        if(isset($currencyBefore)) {
            $before = "";
            $before .= $currencyBefore;
            $currencyFormated = $currencyBefore . " $value";}
        return trim($currencyFormated);
    }

    public function decimal($value, $formatData)
    {
        $separator = $formatData["decimal"];
        $skip = $formatData["thousands"];
        return number_format((float)$value, 2, $separator, $skip);
    }
}