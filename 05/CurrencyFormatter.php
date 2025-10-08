<?php

class CurrencyFormatter
{
    public function format($value, $data, $formatData)
    {
        $separatedValue = $this->decimal($value, $formatData);
        $finalValue = $this->addCurrency($separatedValue, $data);
        return $finalValue;
    }

    public function addCurrency($value, $data = ["after" => "PLN"])
    {
        $currency = $data["after"] ?? NULL;
        $currencyBefore = $data["before"] ?? NULL;
        if(isset($currency)){
            $currencyFormated = $value . " $currency";
        }
        if(isset($currencyBefore)) {
            $before = "";
            $before .= $currencyBefore;
            $currencyFormated = $currencyBefore . " $value";}
        return $currencyFormated;
    }

    public function decimal($value, $formatData = ["decimal" => ",", "thousands" => ' '])
    {
        $separator = $formatData["decimal"];
        $skip = $formatData["thousands"];
        return number_format((float)$value, 2, $separator, $skip);
    }
}