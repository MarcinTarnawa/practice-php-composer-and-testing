<?php

class CurrencyFormatter
{
    public function format($value)
    {
        $separatedValue = $this->decimal($value);
        $formatedValue = $this->separateSign($separatedValue);
        $finalValue = $this->addCurrency($formatedValue);
        return $finalValue;
    }

    public function separateSign($value)
    {
        $formatedValue = str_replace('.', ',', $value);
        return $formatedValue;
    }
    
    public function addCurrency($value, $currency = "PLN")
    {
        $value .= " $currency";
        return $value;
    }

    public function decimal($value)
    {
        return number_format((float)$value, 2, ',', ' ');
    }
}