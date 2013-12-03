<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

$NETCAT_FOLDER = $_SERVER['DOCUMENT_ROOT'].'/';

//include_once($NETCAT_FOLDER.'vars.inc.php');
//include($ROOT_FOLDER.'connect_io.php');
//include($_SERVER['DOCUMENT_ROOT'].'/netcat/require/classes/nc_imagetransform.class.php');

parser();

function parser()
{

	//$xml2 = $xml->xpath("//Root/Номенклатура");

    /*
	$id = $xml->xpath('//УникальныйИдентификатор');
	$mark = $xml->xpath('//Производитель');
	$model = $xml->xpath('//Модель');
	$country = $xml->xpath('//СтранаПроисхождения');
	$rasp3 = $xml->xpath('//РасположениеВерхНиз');
	$rasp2 = $xml->xpath('//РасположениеПередЗад');
	$rasp1 = $xml->xpath('//РасположениеПравоЛево');
	$place = $xml->xpath('//Местонахождение');
	$sost = $xml->xpath('//Состояние');
	$name = $xml->xpath('//Наименование');
	$oem = $xml->xpath('//OEM');
	$dvig = $xml->xpath('//НомерДвигателя');
	$number = $xml->xpath('//НомерОптики');
	$kuzov = $xml->xpath('//НомерКузова');
	$nal = $xml->xpath('//Наличие');
	$price = $xml->xpath('//Цена');
	$photo = $xml->xpath('//Изображение1');
	$photo2 = $xml->xpath('//Изображение2');
	$photo3 = $xml->xpath('//Изображение3'); */

    //echo count($xml -> Номенклатура) . "<br>";
    //echo $xml -> Номенклатура[0] -> УникальныйИдентификатор;
	//mysql_query('TRUNCATE TABLE Message188'); //очистка таблицы

	$url = $_SERVER['DOCUMENT_ROOT'].'/export.xml';
	$xml = simplexml_load_file($url);
	foreach ($xml -> Номенклатура as $nomenklatura) {
        echo $nomenklatura -> УникальныйИдентификатор . "<br />";
    }

	/* создаем массив уже существующих id*/
	//$query = mysql_query("SELECT id,photo,photo2,photo3 FROM Message188");
	//$res = mysql_fetch_array($query);
	/*$i = 0;
	do
	{
		$current_ids[$i] = $res['id'];
		$current_photo[$i] = $res['photo'];
		$current_photo2[$i] = $res['photo2'];
		$current_photo3[$i] = $res['photo3'];
		$i++;
	}
	while($res = mysql_fetch_array($query));

	 обновляем или добавляем
	for($i=0;$i<count($id);$i++)
	{
		if(in_array($id[$i],$current_ids))
		{
			if($photo[$i]!='' && (!in_array($photo[$i],$current_photo) || !in_array($photo2[$i],$current_photo2) || !in_array($photo3[$i],$current_photo3)))
			{
				mysql_query("UPDATE Message188 SET photo='$photo[$i]',photo2='$photo2[$i]',photo3='$photo3[$i]' WHERE id='$id[$i]'");
				copy('/import/'.$photo[$i],'/img/'.$photo[$i]);
				copy('/import/'.$photo2[$i],'/img/'.$photo2[$i]);
				copy('/import/'.$photo3[$i],'/img/'.$photo3[$i]);
			}
			echo 'true<br>';
		}
		else
		{
			mysql_query("INSERT INTO Message188 (id,mark,model,country,rasp1,rasp2,rasp3,place,sost,name,oem,dvig,number,kuzov,nal,price,photo,photo2,photo3,User_ID,Subdivision_ID,Sub_Class_ID,Checked,Parent_Message_ID,action)
			VALUES
			('$id[$i]','$mark[$i]','$model[$i]','$country[$i]','$rasp1[$i]','$rasp2[$i]','$rasp3[$i]','$place[$i]','$sost[$i]','$name[$i]','$oem[$i]','$dvig[$i]','$number[$i]','$kuzov[$i]',
			'$nal[$i]','$price[$i]','$photo[$i]','$photo2[$i]','$photo3[$i]','1','203','243','1','0','1')");
			echo 'false';
		}
	}
	*/
}
?>