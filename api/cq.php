<?php
//Rewrite by absentfriend
$cityId = '5A';
$playId= $_GET['id'];
$relativeId = $playId;
$type='1';
$appId = "kdds-chongqingdemo";
$url ='http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId='.$playId.'&relativeId='.$relativeId.'&type=1';
$curl = curl_init();
$timestamps = round(microtime(true) * 1000);
$sign =md5('aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appId' . $appId . "cityId" . $cityId. "playId" . $playId . "relativeId" . $relativeId . "timestamps" . $timestamps . "type" . $type);
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'appId: kdds-chongqingdemo',
    'sign: '.$sign,
    'timestamps:'.$timestamps,
    'Content-Type: application/json;charset=utf-8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$url = (json_decode($response));
echo $codes = $url->data->result->protocol[0]->transcode[0]->url;
exit;
header('location:'.$codes);
?>