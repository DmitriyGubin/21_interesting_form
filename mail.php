<?php
$arResult = array('status' => false);

foreach ($_POST as $key => $value) 
{
	$_POST[$key] = trim($value);
}

require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';
require 'php_mailer/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->CharSet = "UTF-8";
$mail->From     = 'cooperation@example.com';
$mail->AddAddress('gubindmitry91@mail.ru');

$mail->IsHTML(true);

$mail->Subject  =  "Форма взаимодействие";
$mail->Body     =  "ФИО:".$_POST['fio']." <br>".
"Номер действующего договора:".$_POST['dog_num']." <br>".
"Номер телефона, указанный в договоре:".$_POST['phone']." <br>".
"Желаемая сумма добора:".$_POST['money']." <br>".
"Марка:".$_POST['mark']." <br>".
"Модель:".$_POST['model']." <br>".
"Год выпуска:".$_POST['year']." <br>".
"VIN-номер:".$_POST['vin']." <br>".
"PIN-номер:".$_POST['pin']." <br>";


function Make_Attachment($inp_name, $section_name, $mail)
{
	foreach ($_FILES[$inp_name]['tmp_name'] as $key => $value) 
	{
		$arr =  explode('.', $_FILES[$inp_name]['name'][$key]);
		$rassh = $arr[count($arr) - 1];
		$_FILES[$inp_name]['name'][$key] = $section_name.'_'.$key.'.'.$rassh;
		$mail->addAttachment($_FILES[$inp_name]['tmp_name'][$key], $_FILES[$inp_name]['name'][$key]);
	}
}

Make_Attachment('carcase', 'Фото_кузова', $mail);
Make_Attachment('under_hood', 'Фото_подкапотного_пространства', $mail);
Make_Attachment('salon', 'Фото_салона', $mail);
Make_Attachment('panel', 'Фото_приборной_панели', $mail);
Make_Attachment('passport', 'Фото_паспорта_PIN', $mail);

if($mail->send())
{
   $arResult['status'] = true;
}

require("add_lead_bitrix_24.php");

echo json_encode($arResult); 