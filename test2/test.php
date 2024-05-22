<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
$jp_area_dict = array(
	array(
		'key' => 'hokkaido-tohoku', 'name' => '北海道・東北',
		'sub' => array(
			array( 'key' => 'hokkaido', 'name' => '北海道', ),
			array( 'key' => 'aomori', 'name' => '青森', ),
			array( 'key' => 'iwate', 'name' => '岩手 ', ),
			array( 'key' => 'miyagi', 'name' => '宮城', ),
			array( 'key' => 'akita', 'name' => '秋田', ),
			array( 'key' => 'yamagata', 'name' => '山形', ),
			array( 'key' => 'fukushima', 'name' => '福島', ),
		),
	),
	array(
		'key' => 'kanto', 'name' => '関東',
		'sub' => array(
			array( 'key' => 'ibaraki', 'name' => '茨城', ),
			array( 'key' => 'tochigi', 'name' => '栃木', ),
			array( 'key' => 'gunma', 'name' => '群馬', ),
			array( 'key' => 'saitama', 'name' => '埼玉', ),
			array( 'key' => 'chiba', 'name' => '千葉', ),
			array( 'key' => 'tokyo', 'name' => '東京', ),
			array( 'key' => 'kanagawa', 'name' => '神奈川', ),
			array( 'key' => 'niigata', 'name' => '新潟', ),
		),
	),
	array(
		'key' => 'chubu', 'name' => '中部',
		'sub' => array(
			
			array( 'key' => 'toyama', 'name' => '富山', ),
			array( 'key' => 'ishikawa', 'name' => '石川', ),
			array( 'key' => 'fukui', 'name' => '福井', ),
			array( 'key' => 'yamanashi', 'name' => '山梨', ),
			array( 'key' => 'nagano', 'name' => '長野', ),
			array( 'key' => 'gifu', 'name' => '岐阜', ),
			array( 'key' => 'shizuoka', 'name' => '静岡', ),
			array( 'key' => 'aichi', 'name' => '愛知', ),
		),
	),
	array(
		'key' => 'kinki', 'name' => '近畿',
		'sub' => array(
			array( 'key' => 'mie', 'name' => '三重', ),
			array( 'key' => 'shiga', 'name' => '滋賀', ),
			array( 'key' => 'kyoto', 'name' => '京都', ),
			array( 'key' => 'osaka', 'name' => '大阪', ),
			array( 'key' => 'hyougo', 'name' => '兵庫', ),
			array( 'key' => 'nara', 'name' => '奈良', ),
			array( 'key' => 'wakayama', 'name' => '和歌山', ),
		),
	),
	array(
		'key' => 'chugoku-shikoku', 'name' => '中国・四国',
		'sub' => array(
			array( 'key' => 'tottori', 'name' => '鳥取', ),
			array( 'key' => 'shimane', 'name' => '島根', ),
			array( 'key' => 'okayama', 'name' => '岡山', ),
			array( 'key' => 'hiroshima', 'name' => '広島', ),
			array( 'key' => 'yamaguchi', 'name' => '山口', ),
			array( 'key' => 'tokushima', 'name' => '徳島', ),
			array( 'key' => 'kagawa', 'name' => '香川', ),
			array( 'key' => 'ehime', 'name' => '愛媛', ),
			array( 'key' => 'kouchi', 'name' => '高知', ),
		),
	),
	array(
		'key' => 'kyushu-okinawa', 'name' => '九州・沖縄',
		'sub' => array(
			array( 'key' => 'fukuoka', 'name' => '福岡', ),
			array( 'key' => 'saga', 'name' => '佐賀', ),
			array( 'key' => 'nagasaki', 'name' => '長崎', ),
			array( 'key' => 'kumamoto', 'name' => '熊本', 
            'sub' => array(
                array( 'key' => 'fukuoka1', 'name' => '福岡1', ),
			    array( 'key' => 'saga1', 'name' => '佐賀1', ),
            ),
        ),
			array( 'key' => 'oita', 'name' => '大分', ),
			array( 'key' => 'miyazaki', 'name' => '宮崎', ),
			array( 'key' => 'kagoshima', 'name' => '鹿児島', ),
			array( 'key' => 'okinawa', 'name' => '沖縄', ),
		),
	),
);

var_dump(get_area_deep('fukuok1'));

function get_area_deep($area_key) {
	global $jp_area_dict;
    $res1="";$res2="";$res3="";$res4="";$res5="";
    $area_brunch1 = $jp_area_dict;
    for($i1=0;$i1<count($area_brunch1);$i1++) { //loop1
        if(array_key_exists('key', $area_brunch1[$i1])) {
            $res1 = $area_brunch1[$i1]['key'];
            if($area_key == $area_brunch1[$i1]['key']) {
                return [$res1];
            }
        }
    }
    for($i1=0;$i1<count($area_brunch1);$i1++) { //loop1
        if(array_key_exists('sub', $area_brunch1[$i1])) {
            $res1 = $area_brunch1[$i1]['key'];
            $area_brunch2 = $area_brunch1[$i1]['sub'];
            for($i2=0;$i2<count($area_brunch2);$i2++) { //loop2
                if(array_key_exists('key', $area_brunch2[$i2])) {
                    $res2 = $area_brunch2[$i2]['key'];
                    if($area_key == $area_brunch2[$i2]['key']) {
                        return [$res1, $res2];
                    }
                }
            }
            for($i2=0;$i2<count($area_brunch2);$i2++) { //loop2
                if(array_key_exists('sub', $area_brunch2[$i2])) {
                    $res2 =  $area_brunch2[$i2]['key'];
                    $area_brunch3 = $area_brunch2[$i2]['sub'];
                    for($i3=0;$i3<count($area_brunch3);$i3++) { //loop3
                        if(array_key_exists('key', $area_brunch3[$i3])) {
                            $res3 = $area_brunch3[$i3]['key'];
                            if($area_key == $area_brunch3[$i3]['key']) {
                                return [$res1, $res2, $res3];
                            }
                        }
                    }
                }
            }
        }
    }
    return [];
}


?>















</body>
</html>