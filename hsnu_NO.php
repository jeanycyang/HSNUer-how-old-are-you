<?php 
 
$this_year = date("Y"); 
$reference_age = $this_year - 1994 + 1;
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=content-type content="text/html; charset=utf-8" />
	<title>靠班號算年齡 V.1</title>
	<link rel="shortcut icon" href="hsnu_logo.ico" />
	<link href="css.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="jquery-1.7.1.js"></script>
	<script type="text/javascript" src="pack.js"></script>

</head>
<body>
<form action=<?php echo $_SERVER['PHP_SELF']; ?> method=POST>
	<img src=hsnu_logo.jpg /><P />
	靠班號算年齡V.1，請輸入您的附中班號：<BR />
	<input type=text name=classnumber style='width:50%' value='<?php echo $_POST['classnumber'] ; ?>' placeholder='範例：1245' autocomplete='off'  />
	<input type=submit value='換算！' />
	<input type=hidden value='1' name='op' />
	
	<p id="p_about" class="show_hide">注釋<p />
	<div id="about">
	注1：以最1235~1261這一屆當作基準，今年是<?php echo $this_year; ?>年，所以這屆的年紀約為<?php echo $reference_age."歲"; ?><BR>
	注2：參考資料：<a href='http://www.hs.ntnu.edu.tw/hsnuwp/wp-content/uploads/2010/10/s_class10008193.htm' target='_blank'>附中官網班號對照</a>
	</div>
	
	<p id="p_res" class="show_hide">原始碼<p />
	<div id="res">
	取得原始碼：<a href='hsnu.phps' target='_blank'>按我</a>(編碼為UTF-8)
	</div>
</form>
</body>
</html>

<?php
/*
Programmer: px1245 ( bdlas321@gmail.com )
Date: 2012-07-26
Lastupdate: 2012-09-26
*/


//定義資料

$classes = array(

//請從這裡插入新的陣列

"1316~1342",
"1289~1315",
"1262~1288",
"1235~1261",
"1208~1234",
"1181~1207",
"1154~1180",
"1127~1153",
"1100~1126",
"1073~1099",
"1046~1072",
"1018~1045",
"992~1017",
"965~991",
"938~964",
"911~937",
"884~910",
"857~883",
"830~856",
"804~829",
"777~803",
"750~776",
"724~749",
"696~723",
"670~695",
"644~669",
"618~643",
"592~617",
"566~591",
"540~565",
"514~539",
"488~513",
"464~487",
"441~463",
"417~440",
"394~416",
"372~393",
"349~371",
"327~348",
"307~326",
"285~306",
"263~284",
"243~262",
"223~242",
"201~222",
"181~200",
"161~180",
"140~160",
"121~139",
"107~120",
"98~106",
"89~97",
"77~88",
"68~76",
"62~67",
"56~61",
"48~55",
"44~47",
"41~43",
"37~40",
"32~36",
"26~31",
"20~25",
"14~19",
"10~13",
"6~9",
"3~5",
"1~2"

//以後只需要更新這裡↑↑

);



$c = split("~" , $classes[0]);
$d = array_search('1235~1261', $classes); //取得參考班級之索引值


/*以下區間禁止修改XDDDD*/

if($_POST['classnumber']=='1245'){
	$special_msg='<HR /><H1><font color=red>1245萬歲!!</font></H1>';
}

/*以上區間禁止修改XDDDD*/

if($_POST['op']=='1'){

	//檢驗開始
	
	if(empty($_POST['classnumber'])){
		$error_msg = '您未輸入班號';
	}	

	elseif(!preg_match("/^[0-9]+$/",$_POST['classnumber'])){
		$error_msg = '輸入必須是數字';
	}
	
	elseif($_POST['classnumber'] > $c[1]){
		$error_msg = '班號太大了，本程式無法支援 =  = ||| ';
	}
		
	if(!empty($error_msg)){
		echo "<font color=blue><B>".$error_msg."</B></font>";
		exit;
	}
	
	//檢驗結束
	
	foreach($classes as $key_num => $cl_num){

		$a = split("~" , $cl_num);
		//判斷班號區間
		if($_POST['classnumber'] <=$a[1] and $_POST['classnumber'] >= $a[0]){
			echo "<HR color=\"blue\" />您的班號<H1>{$_POST['classnumber']}</h1>落在".$a[0]."~".$a[1]."之間^^";
			$key = $key_num;
		}
	}	

	
	//用索引值算出歲數
	
	$e = $key - $d; //算出與參考班級的年紀差距
	
	$b = $reference_age + $e; //換算實際年紀

	echo "<HR />
	<H3>以班號1235~1261為".$reference_age."歲，則</h3>
	<H2>您應約為{$b}歲!!</h2>
	{$special_msg}
	";
}

?>
