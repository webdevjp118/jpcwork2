<!-- <form action="" method="post">
	type
	<input type="text" name="sh_type"><br>
	post_id
	<input type="text" name="sh_id"><br>

	<input type="submit" value="Submit">
	<input type="hidden" name="hasval" value="hasval">
</form> -->
<form action="" method="post">
	prefecture
	<input type="text" name="prefecture"><br>

	<input type="submit" value="Submit">
	<input type="hidden" name="hasval" value="hasval">
</form>
<?php
global $wpdb;
if(isset($_POST['hasval']) && $_POST['hasval'] == 'hasval') {
	$sh_type = 'get_cities';
	$prefecture =$_POST['prefecture'];
		$res = [];
		$res['rs_type'] = 'get_cities';
		$totalrow = $wpdb->get_results("SELECT id FROM prefectures WHERE name = '$prefecture'");
		var_dump($totalrow);
		$pref_id = 0;
		foreach($totalrow as $eachrow) {
			$pref_id = $eachrow->id;
		}
		$totalrow = $wpdb->get_results("SELECT name FROM cities WHERE area_id = $pref_id");
		$cities = [];
		foreach($totalrow as $eachrow) {
			array_push($cities, $eachrow->name);
		}
		$res['cities'] = $cities;

	var_dump($res);
}
?>