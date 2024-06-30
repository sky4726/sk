<?php
//https://www.yangshipin.cn/#/tv/home
error_reporting(-1);
header('Content-Type:text/json;charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id']) ? $_GET['id'] : 'bqkj';
$n = [
    //央视
    'cctv4k' => 2022575203, //cccv-4k
    'cctv8k' => 2020603421, //cccv-8k
    'cctv1' => 2022576803, //cccv1
    'cctv2' => 2022576703, //cccv2
    'cctv3' => 2022576503, //cccv3(vip)
    'cctv4' => 2022576603, //cccv4
    'cctv5' => 2022576403, //cccv5
    'cctv5p' => 2022576303, //cccv5+
    'cctv6' => 2022574303, //cccv6(vip)
    'cctv6hd' => 2013693901, //cccv6(vip)
    'cctv7' => 2022576203, //cccv7
    'cctv8' => 2022576103, //cccv8(vip)
    'cctv9' => 2022576003, //cccv9
    'cctv10' => 2022573003, //CCTV10
    'cctv11' => 2022575903, //CCTV11
    'cctv12' => 2022575803, //CCTV12
    'cctv13' => 2022575703, //CCTV13
    'cctv14' => 2022575603, //CCTV14
    'cctv15' => 2022575503, //CCTV15
    'cctv16' => 2022575403, //CCTV16
    'cctv16-4k' => 2022575103, //CCTV16-4k(vip)
    'cctv17' => 2022575303, //CCTV17
    //央视数字
    'bqkj' => 2012513403, //CCTV兵器科技(vip)
    'dyjc' => 2012514403, //CCTV第一剧场(vip)
    'hjjc' => 2012511203, //CCTV怀旧剧场(vip)
    'fyjc' => 2012513603, //CCTV风云剧场(vip)
    'fyyy' => 2012514103, //CCTV风云音乐(vip)
    'fyzq' => 2012514203, //CCTV风云足球(vip)
    'dszn' => 2012514003, //CCTV电视指南(vip)
    'nxss' => 2012513903, //CCTV女性时尚(vip)
    'whjp' => 2012513803, //CCTV央视文化精品(vip)
    'sjdl' => 2012513303, //CCTV世界地理(vip)
    'gefwq' => 2012512503, //CCTV高尔夫网球(vip)
    'ystq' => 2012513703, //CCTV央视台球(vip)
    'wsjk' => 2012513503, //CCTV卫生健康(vip)
    //央视国际
    'cgtn' => 2022575001, //CGTN
    'cgtnjl' => 2022574703, //CGTN纪录
    'cgtne' => 2022571703, //CGTN西语
    'cgtnf' => 2022574903, //CGTN法语
    'cgtna' => 2022574603, //CGTN阿语
    'cgtnr' => 2022574803, //CGTN俄语
    //教育
    'cetv1' => 2022823801, //教育1台
    //卫视
    'bjws' => 2000272103, //北京卫视
    'dfws' => 2000292403, //东方卫视
    'tjws' => 2019927003, //天津卫视
    'cqws' => 2000297803, //重庆卫视
    'hljws' => 2000293903, //黑龙江卫视
    'lnws' => 2000281303, //辽宁卫视
    'hbws' => 2000293403, //河北卫视
    'sdws' => 2000294803, //山东卫视
    'ahws' => 2000298003, //安徽卫视
    'hnws' => 2000296103, //河南卫视
    'hubws' => 2000294503, //湖北卫视
    'hunws' => 2000296203, //湖南卫视
    'jxws' => 2000294103, //江西卫视
    'jsws' => 2000295603, //江苏卫视
    'zjws' => 2000295503, //浙江卫视
    'dnws' => 2000292503, //东南卫视
    'gdws' => 2000292703, //广东卫视
    'szws' => 2000292203, //深圳卫视
    'gxws' => 2000294203, //广西卫视
    'gzws' => 2000293303, //贵州卫视
    'scws' => 2000295003, //四川卫视
    'xjws' => 2019927403, //新疆卫视
    'hinws' => 2000291503, //海南卫视
    'btws' => 2022606701,  // 兵团卫视
];
$cnlid = $n[$id];
$guid = generateGuid();
$randomString = rand_str(10);
$currentTimeMillis = round(microtime(true) * 1000);
$request_id = "999999" . $randomString . $currentTimeMillis;

$salt = '0f$IVHi9Qno?G';
$platform = "5910204";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();

$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|[url]https://www.yangshipin.c[/url]|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";

$len = strlen($el);
$xl = 0;
for ($i = 0; $i < $len; $i++) {
    $xl = ($xl << 5) - $xl + ord($el[$i]);
    $xl &= $xl & 0xFFFFFFFF;
}

$xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;

$el = '|' . $xl . $el;
$ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", $key, 1, $iv)));

$params = [
    "adjust" => 1,
    "appVer" => "V1.0.0",
    "app_version" => "V1.0.0",
    "cKey" => $ckey,
    "channel" => "ysp_tx",
    "cmd" => "2",
    "cnlid" => "{$cnlid}",
    "defn" => "fhd",
    "devid" => "devid",
    "dtype" => "1",
    "encryptVer" => "8.1",
    "guid" => $guid,
    "otype" => "ojson",
    "platform" => $platform,
    "rand_str" => rand_str(10),
    "sphttps" => "1",
    "stream" => "2"
];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}

$headers = [
    // "Content-Type: application/x-www-form-urlencoded;charset=UTF-8",
    "Referer: https://www.yangshipin.cn/",
    "Cookie: guid=$guid; versionName=99.99.99; versionCode=999999; platformVersion=Chrome; deviceModel=122; vplatform=109 updateProtocol=1; seqId=1; request-id={$request_id}",
    "Yspappid: 519748109",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0",
    // "Accept: */*",
    // "Host: player-api.yangshipin.cn",
    // "Connection: keep-alive"
    // 'x-forwarded-for:' . $onlineip,
    // 'client-ip:' . $onlineip,
];

$data =[
    "appid" => "ysp_pc",
    "guid" => $guid,
    "pid" => "0",
    "rand_str" => rand_str(10)
];

$authmd5 = md5(http_build_query($data). 'Q0uVOpuUpXTOUwRn');

$data["signature"] = $authmd5;
$auth=http_build_query($data);
$PostUrl = "https://player-api.yangshipin.cn/v1/player/auth";

$Postjson = json_decode(get_data($PostUrl, $headers, $auth));

$token = $Postjson->data->token;

$sign = md5(http_build_query($params) . $salt);
$params["signature"] = $sign;
$params = json_encode($params);
$headers[] = "Content-Type: application/json";
$headers[]= "Yspplayertoken: $token";
$bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";

$json = json_decode(get_data($bstrURL, $headers, $params));

$live = $json->data->playurl;

$burl = dirname($live) . "/";

header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");
print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($live, $headers)));
exit;
function get_data($url, $header, $post = null)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function rand_str($k)
{
    $e = "ABCDEFGHIJKlMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $i = 0;
    $str = "";
    while ($i < $k) {
        $str .= $e[mt_rand(0, 61)];
        $i++;
    }
    return $str;
}


function generateGuid()
{
    $timestamp = base_convert((string) round(microtime(true) * 1000), 10, 36);
    $randomPart = substr(base_convert((string) mt_rand(), 10, 36), 0, 11);

    while (strlen($randomPart) < 11) {
        $randomPart .= substr(base_convert((string) mt_rand(), 10, 36), 0, 1);
    }

    return $timestamp . "_" . $randomPart;
}
