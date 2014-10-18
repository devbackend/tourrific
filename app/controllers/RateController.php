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

    protected function updateRate($modelId, $instanceId)
    {
        $rateValues  = Rate::whereRaw('module_id = ? && instance_id = ?', array($modelId, $instanceId))
            ->groupBy('plus')
            ->orderBy('plus', 'asc')
            ->get(array('plus',DB::raw('count(*) as cnt')));


        if(count($rateValues) == 0)
            return 0;

        if(count($rateValues) == 1)
            return ($rateValues['plus'] == 0)?self::getRate(1, $rateValues['cnt']):self::getRate($rateValues['cnt'], 1);

        $modelName = Models::find($modelId)->modelName;

        $instance = $modelName::find($instanceId);
        $instance->rate = self::getRate($rateValues[1]['cnt'], $rateValues[0]['cnt']);
        $instance->save();
    }
} 