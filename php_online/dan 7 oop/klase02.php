<?php
class HrDan
{
	public $days = array(
	1=>'Pon',
	2=>'Uto',
	3=>'Sri',
	4=>'Cet',
	5=>'Pet',
	6=>'Sub',
	7=>'Ned',
	);
	public function getDayName($date){
		$day = date('N',strtotime($date));
		$day_name = $this->days[$day];
		return $day_name;
	}
}
$day = new HrDan();
echo $day->getDayName('1966-02-28');
$new_day = new HrDan();
echo '<br>';
echo $day->getDayName('1973-09-28');
$new1_day = new HrDan();
echo '<br>';
echo $day->getDayName('1973-08-28');

?>