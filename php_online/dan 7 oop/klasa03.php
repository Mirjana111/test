<?php
include 'klase02.php'; 
class HrMjesec extends HrDan
{
	private $mjesec = array (
	1=>'Siječanj',
	2=>'Veljača',
	3=>'Ožujak',
	4=>'Travanj',
	5=>'Svibanj',
	6=>'Lipanj',
	7=>'Srpanj',
	8=>'Kolovoz',
	9=>'Rujan',
	10=>'Listopad',
	11=>'Studeni',
	12=>'Prosinac',
	);
	public function getMonthName($date){
		$month = date('n',strtotime($date));
		$month_name = $this->mjesec[$month];
		return $month_name;
}
$date =new HrMjesec();
echo $date->getDayName('1966-02-28').','.$date->
getMonthName('1966-02-28');
?>