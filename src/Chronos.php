<?php

namespace Zazalt\Chronos;

class Chronos
{
    /**
     * Transform/parse a human date to machine date (Y-m-d)
     * 	eg: 28.09.2013 (d.m.Y) => 2013-09-28
     *
     * @param   string  $datetime
     * @param   string  $humanFormat
     * @return  string
     */
    public function dateToMachineDate($datetime, $humanFormat)
    {
        $parsedDate = date_parse_from_format($humanFormat, $datetime);
        return $parsedDate['year'] .'-'. str_pad($parsedDate['month'], 2, 0, STR_PAD_LEFT) .'-'. str_pad($parsedDate['day'], 2, 0, STR_PAD_LEFT);
    }

    /**
     * Transform/parse a human date to machine date (Y-m-d H:i:s)
     * 	eg: 28.09.2013 23:41:12 => 2013-09-28 23:41:12
     *
     * @param   string  $datetime
     * @param   string  $humanFormat
     * @return  string
     */
    public function dateToMachineDateTime($datetime, $humanFormat)
    {
        $parsedDate = date_parse_from_format($humanFormat, $datetime);
        return $parsedDate['year'] .'-'. str_pad($parsedDate['month'], 2, 0, STR_PAD_LEFT) .'-'. str_pad($parsedDate['day'], 2, 0, STR_PAD_LEFT) .' '. (!empty($parsedDate['hour']) ? $parsedDate['hour'] : '00') .':'. (!empty($parsedDate['minute']) ? $parsedDate['minute'] : '00') .':'. (!empty($parsedDate['second']) ? $parsedDate['second'] : '00');
    }

    /**
     * Transform/parse a machine date to human date
     * 	eg: 01.09.2013 => 2013-09-01
     *
     * @param type $datetime
     */
    public function dateToHuman($datetime = null, $humanFormat)
    {
        $parsedDate = date_parse_from_format($humanFormat, $datetime);
        return date($humanFormat, strtotime($datetime));
    }

    /**
     * Return days number between two dates
     *
     * @param   date    $startDate
     * @param   date    $endDate
     * @return  integer
     *
     * @docs    http://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates
     */
    public function daysBetweenTwoDates($startDate, $endDate)
    {
        $startDate  = new \DateTime($startDate);
        $endDate    = new \DateTime($endDate);
        $interval = $startDate->diff($endDate);
        return $interval->format("%r%a");
    }

    /**
     * Return months number between two dates
     *
     * @param   date    $startDate
     * @param   date    $endDate
     * @return  integer
     */
    public function monthsBetweenTwoDates($startDate, $endDate)
    {
        $startDate  = new \DateTime($startDate);
        $endDate    = new \DateTime($endDate);
        return $startDate->diff($endDate)->m;
    }

    /**
     * Return years number between two dates
     *
     * @param   date    $startDate
     * @param   date    $endDate
     * @return  integer
     */
    public function yearsBetweenTwoDates($startDate, $endDate)
    {
        $startDate  = new \DateTime($startDate);
        $endDate    = new \DateTime($endDate);
        return $startDate->diff($endDate)->y;
    }

    public function seconds2HMS($secs)
    {
        if($secs < 0) {
            return false;
        }

        $m = (int) ($secs / 60);
        $s = $secs % 60;
        $h = (int) ($m / 60);
        $m = $m % 60;

        $m = str_pad($m, 2, '0', STR_PAD_LEFT);
        $h = str_pad($h, 2, '0', STR_PAD_LEFT);
        $s = str_pad($s, 2, '0', STR_PAD_LEFT);

        return $h . ':' . $m . ':' . $s;
    }
}