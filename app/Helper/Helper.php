<?php
namespace App\Helper;
use Carbon\Carbon;

class Helper
{

    public function generator(string $type, int $number)
    {
        $length = $this->digits($number);
        if ($length <= 1) {
            $sequential_id = $type . "0000" . $number;
        } else if ($length <= 2) {
            $sequential_id = $type . "000" . $number;
        } else if ($length <= 3) {
            $sequential_id = $type . "00" . $number;
        } else if ($length <= 4) {
            $sequential_id = $type . "0" . $number;
        } else if ($length <= 5) {
            $sequential_id = $type . $number;
        } else {
            $sequential_id = $type . $number;
        }
        return $sequential_id;
    }

    public function digits($num)
    {
        return (int) (log($num, 10) + 1);
    }

    function getPercent2($percentToGet, $myNumber)
    {
        $percentInDecimal = $percentToGet / 100;
        $percent = $percentInDecimal * $myNumber;
        return round($percent,2);
    }

    //Differntiate Inclusive Tax Amount
    function getActualPrice($percentToGet, $amount)
    {
        $taxPriceCal = 118;
        $totalTax = ($amount/$taxPriceCal)*$percentToGet;
        return round(($amount - $totalTax), 2);
    }



}
?>
