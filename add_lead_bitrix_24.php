<?php

//https://sinyavsky.com/bitrix24-dobavit-lead-cherez-api-webhook/
//https://qna.habr.com/q/661213

//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

require("B24LeadSender.php");

$restApiUrl = "************"; // это демо урл, укажите вместо него свой
$userId = 7226;

$leadSender = new \Sinyavsky\B24LeadSender($restApiUrl, $userId);

/*
$file_data = [
            [
                "fileData" => [
                    $_FILES["carcase"]["name"][0],
                    base64_encode(file_get_contents($_FILES["carcase"]["tmp_name"][0]))
                ]
            ],
            [
                "fileData" => [
                    $_FILES["carcase"]["name"][1],
                    base64_encode(file_get_contents($_FILES["carcase"]["tmp_name"][1]))
                ]
            ],
 ];
 */

 function Create_File_Data($mas_names)
 {
 	$file_data = [];
 	foreach ($mas_names as $name) 
 	{
 		foreach ($_FILES[$name]["name"] as $key => $value) 
 		{
            if($_FILES[$name]["tmp_name"][$key] != '')
            {
                $file_data[] = ["fileData" => [$_FILES[$name]["name"][$key], 
                    base64_encode(file_get_contents($_FILES[$name]["tmp_name"][$key]))
                ]];
            }
 		}
 	}

 	return $file_data;
 }

$file_data = [];

$file_data = Create_File_Data(['carcase', 'under_hood', 'salon', 'panel', 'passport']);

$leadSender->SetUserField("UF_CRM_1706525022", "Дополнительное текстовое поле");
$leadSender->SetTitle("Тестовое");

$leadSender->SetUserField("UF_CRM_1714620892", $file_data);

$leadSender->Send();

 ?> 