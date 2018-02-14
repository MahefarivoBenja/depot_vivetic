<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   
}
if ( ! function_exists('assets_url'))
{
    function assets_url($array_file,$type)
    {
		$timenow = date("YmdHis");
        $res = '';
		if($type == 'js')
		{
			foreach ($array_file as $valuejs)
			{
				$res .= "
					<script src='".base_url("assets/".$valuejs.".js")."?".$timenow."' ></script>
				";
			}
		}
		if($type == 'css')
		{
			foreach ($array_file as $valuejs)
			{
				$res .= "
					<link rel='stylesheet' href='".base_url("assets/".$valuejs.".css")."?".$timenow."' />
				";
			}
		}
		
		echo $res;
    }   
}

if ( ! function_exists('datetime_fr'))
{
    function datetime_fr($datetime = '')
    {
		list($date,$time) = explode(" ",$datetime);
		list($annee,$mois,$jour) = explode("-",$date);
		$date_final_fr = $jour.'/'.$mois.'/'.$annee.' '.$time;
		return $date_final_fr;
    }   
}

if ( ! function_exists('date_tobd'))
{
    function date_tobd($date = '')
    {
		// 26/04/2017 
		list($jours,$mois,$annee) = explode("/",$date);
		$date_final_bd = $annee.'-'.$mois.'-'.$jours;
		return $date_final_bd;
    }   
}