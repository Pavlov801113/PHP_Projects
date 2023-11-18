<?php
trait EnterPrize
{
    public function suboffice(){
        echo "Under the trait";
    }
}

class Company
{
    use EnterPrize;
    public function suboffice()
    {
        echo "Remake trait class method";
    }
}

$company = new Company();
$company->suboffice();