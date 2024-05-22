<?php /* Template Name: Contact */ ?>
<?php 
/**
 * 出力用
 */
function _h($s)
{
	echo htmlspecialchars($s, ENT_QUOTES,'UTF-8');
}
/**
 * エラー表示用クラス名出力
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param boolean $class_string
 */
function print_error_class($error_sess_name, $class_string = 0)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		if ($class_string) {
			$s = ' class="error"';
		} else {
			$s .= ' error';
		}
	}
	echo $s;
}

/**
 * 項目ごとにエラーメッセージ表示
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param string $elm
 */
function print_error_each_message($error_sess_name, $elm)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		$s = '<'.$elm.' class="error">';
		$s .= $_SESSION["error"][$error_sess_name];
		$s .= '</'.$elm.'>';
	}
	echo $s;
}

/**
 * POST セッションの出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (empty($_SESSION["post"][$post_sess_name]) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $_SESSION["post"][$post_sess_name];
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}

/**
 * POST セッションの出力用（電話番号・郵便番号）
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session_num($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (is_array($post_sess_name)) {
		$tmp = "";
		$tmp2 = "";
		foreach ($post_sess_name as $val) {
			$tmp .= $_SESSION["post"][$val];
			$tmp2 .= $_SESSION["post"][$val]."-";
		}
		$tmp2 = substr($tmp2, 0, -1);
	} else {
		$tmp = $_SESSION["post"][$post_sess_name];
		$tmp2 = $_SESSION["post"][$post_sess_name];
	}
	if (empty($tmp) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $tmp2;
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}

/**
 * radio の checked 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_checked($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " checked";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}

/**
 * select の selected 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_selected($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " selected";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}
?>
<!-- プライバシーポリシー同意チェック -->
<script>
window.onpageshow = function(event) {
	var checkAgreement = document.getElementById('check');
	checkAgreement.checked = false;
};
function checkValue(check){
	var submitGo = document.getElementById('submit_go');

	if (check.checked) {
		submitGo.classList.remove("disabled");
		submitGo.removeAttribute("disabled");
	} else {
		submitGo.classList.add("disabled")
		submitGo.setAttribute("disabled", "disabled");
	}
}
</script>
<?php get_header(); ?>
<?php
if(isset($_GET['id'])){
	$post_id = $_GET['id'];
}
if(isset($_POST['id'])) {
	$post_id = $_POST['id'];
}
if(!empty($_SESSION['post']['id'])) $post_id = $_SESSION['post']['id'];
if(empty($post_id)) {
	$search_key = array(
		'post_type' => 'company',
		'meta_key' => 'company_no',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'posts_per_page' => '1',
	);
	$menu_query = new WP_Query($search_key);
	if($menu_query->have_posts()) {
		$menu_query->the_post(); 
		$first_id = get_the_id();
	}
	wp_reset_query();
	$post_id = $first_id;
}
$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );

$company_name = get_post_meta( $post_id, 'company_name', true );
$maker_name = get_post_meta( $post_id, 'maker_name', true );
$phone_number = get_post_meta( $post_id, 'phone_number', true );
$company_email = get_post_meta( $post_id, 'company_email', true );
$company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
$company_catalog = get_post_meta( $post_id, 'company_catalog', true );
$company_qrcode = get_post_meta( $post_id, 'company_qrcode', true );
$company_detail = get_post_meta( $post_id, 'company_detail', true );
$company_zoom_id = get_post_meta( $post_id, 'zoom_id', true );
$company_zoom_pass = get_post_meta( $post_id, 'zoom_pass', true );

$product_names = [];
$product_keys = [];
for($i=1;$i<=$max_product_count;$i++){
	$temp = get_post_meta( $post_id, 'product'.$i.'_name', true);
	$product_keys[$i] = 'product'.$i.'_name';
	$product_names[$i] = '';
	if(!empty($temp)){
		$product_names[$i] = $temp;
	} 
}
$product_values = [];
for($i=1;$i<=$max_product_count;$i++){
	$product_values[$i] = '';
	if(!empty($_SESSION['post'][$product_keys[$i]])) $product_values[$i] = $_SESSION['post'][$product_keys[$i]];
}
$product_count = $max_product_count;
if($company_name == $elephant_name) $product_count = 0;
?>
<main id="primary" class="site-main">



<div class="hero-banner">
    <img src="<?php echo !empty($company_3dcg)?$company_3dcg:$noimage; ?>"/>
    <div class="banner-caption"><?php echo $company_name; ?>3DCG展示ホール</div>
    <div class="hero__scroll__area"><p>SCROLL</p></div>
</div>
  
<section class="contents_ttl">
	<h2>お問い合わせフォーム</h2>
</section>
<section class="inner">
    <div class="contactCotainer">
        <div class="form_flow">
            <p class="active">入力</p>
            <p>内容確認</p>
            <p>送信完了</p>
        </div>
        <form id="application" action="<?php echo get_site_url().'/confirm/'; ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $post_id; ?>">
            <div class="form_area">
                <dl> 
                    <dt>病院様名<span>必須</span></dt>
                    <dd<?php print_error_class("病院様名", 1); ?>><input type="text" name="病院様名" placeholder="VETSEXPO動物病院" value="<?php print_post_session("病院様名"); ?>"><?php print_error_each_message("病院様名", "b"); ?></dd>
                    <dt>お名前<span>必須</span></dt>
                    <dd<?php print_error_class("お名前", 1); ?>><input type="text" name="お名前" placeholder="大獣医療　太郎" value="<?php print_post_session("お名前"); ?>"><?php print_error_each_message("お名前", "b"); ?></dd>
                    <dt>メールアドレス<span>必須</span></dt>
                    <dd<?php print_error_class("メールアドレス", 1); ?>><input type="email" inputmode="email" name="メールアドレス" value="<?php print_post_session("メールアドレス"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス", "b"); ?></dd>
                    <dt>メールアドレス（確認）<span>必須</span></dt>
                    <dd<?php print_error_class("メールアドレス（確認）", 1); ?>><input type="email" inputmode="email" name="メールアドレス（確認）" value="<?php print_post_session("メールアドレス（確認）"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス（確認）", "b"); ?></dd>
                    <dt>電話番号<span>必須</span></dt>
                    <dd<?php print_error_class("電話番号", 1); ?>>
                        <input type="tel" inputmode="tel" name="電話番号" maxlength="4" value="<?php print_post_session("電話番号"); ?>"> - <input type="tel" inputmode="tel" name="電話番号2" maxlength="4" value="<?php print_post_session("電話番号2"); ?>"> - <input type="tel" inputmode="tel" name="電話番号3" maxlength="4" value="<?php print_post_session("電話番号3"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("電話番号", "b"); ?>
					</dd>
					<?php if($product_count>0): ?>
					<dt>お問い合わせの製品<br class="disp_pc">【複数を選択可】</dt>
                    <dd<?php print_error_class("製品", 1); ?>>
						<?php for($i=1;$i<=$max_product_count;$i++):
								if(!empty($product_names[$i])): ?>
                        <label><input type="checkbox" name="<?php echo $product_keys[$i]; ?>" value="<?php echo $product_keys[$i]; ?>" <?php echo ($product_keys[$i] == $product_values[$i])?'checked':''; ?>><?php echo $product_names[$i]; ?></label>
						<?php 
								endif;
							   endfor; ?>
					</dd>
					<?php endif;?>
                    <dt>お問い合わせ内容</dt>
                    <dd<?php print_error_class("お問い合わせ内容", 1); ?>><textarea name="お問い合わせ内容"><?php print_post_session("お問い合わせ内容"); ?></textarea><?php print_error_each_message("お問い合わせ内容", "b"); ?></dd>
                </dl>
            </div>
            <div class="attention">
                <h3>注意事項</h3>
                <p>
					受付後、自動返信メールが送信されます。<br>
					30分以上経っても自動返信メールが届かない場合は、受付されていない可能性がありますのでもう一度送信してください。 自動返信メールが迷惑メールフォルダに入っている可能性もありますので、お手数おかけしますが、ご確認の程よろしくお願いいたします。
                </p>
            </div>
            <div class="privacypolicy">
                <div class="privacypolicy_agree">
                    <label><input type="checkbox" id="check" onclick="checkValue(this)">スパムメール防止のため、こちらのボックスにチェックを入れてから送信してください。</label>
                </div>
            </div>
            <div class="confirmBtn"><input type="submit" id="submit_go" class="disabled" value="上記の内容を確認する" disabled="disabled"></div>
            <input type="hidden" name="token" value="<?php _h($_SESSION["token"]); ?>">
        </form>
    </div><!-- /contactCotainer -->
</section><!-- /inner -->


</main><!-- #main -->
<?php
get_footer();

// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["error"]);