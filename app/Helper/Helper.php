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


}
?>
