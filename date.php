<?php
class Date
{
    protected $date;


    function __construct()
    {   
        $this->date = new DateTime();
    }

    public function today()
    {
        return (new DateTime())->format('d/m/Y');
    }

    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }
    public function advance()
    {
        date_add($this->date, date_interval_create_from_date_string('1 day'));
        return $this->getDay();
    }

    public function getDay()
    {
        return $this->date->format('d');
    }
    public function getMonth()
    {
        return $this->date->format('m');
    }
    public function getYear()
    {
        return $this->date->format('Y');
    }
}

$date = new Date();
echo "Data atual:".PHP_EOL;
echo $date->getDate().PHP_EOL.PHP_EOL;

echo "Método Advance retornando o próximo dia:" . PHP_EOL;
echo $date->advance().PHP_EOL.PHP_EOL;

echo "Nova Data:" . PHP_EOL;
echo $date->getDate().PHP_EOL;
