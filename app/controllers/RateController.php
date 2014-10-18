<?php


class RateController extends BaseController
{
    public function postPlus()
    {
        return self::stateMark(true);
    }

    public function postMinus()
    {
        return self::stateMark();
    }

    protected function stateMark($plus=false)
    {
        if(!Auth::check())
            return '{"error" : "No auth"}';

        $rate = new Rate();

        $rate->module_id = Input::get('module_id');
        $rate->instance_id = Input::get('instance_id');
        $rate->user_id = Auth::user()->id;
        $rate->plus = $plus;

        $rate->save();




        return '{"success" : "mark stated"}';
    }

    private function getRate($countPlus, $countMinus)
    {
        if(!$countPlus)
            return self::getRate(1, $countMinus);

        $count = $countPlus + $countMinus;

        //коэффициент доверия. При 1.6 равен 95%
        $coef = 1.6;

        $plusPerc = $countPlus/$count;

        return round(10*(($plusPerc+$coef*$coef/(2*$count)-$coef*sqrt(($plusPerc*(1-$plusPerc)+$coef*$coef/(4*$count))/$count))/(1+$coef*$coef/$count)), 2);
    }
} 