<?php /* Template Name: Meeting */ ?>
<?php
get_header();
?>
<?php 
$post_id = '';
if(isset($_GET['id'])) $post_id = $_GET['id'];
if(empty($post_id)) wp_redirect(get_site_url());

$company_no = get_post_meta( $post_id, 'company_no', true );
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

$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$pdfcover = get_stylesheet_directory_uri()."/images/pdf-cover.jpg";
$videocover = get_stylesheet_directory_uri()."/images/video-cover.jpg";

if(empty($company_3dcg)) $company_3dcg = $noimage;

?>
<main id="primary" class="site-main">

<div class="hero-banner">
  <img src="<?php echo $company_3dcg; ?>"/>
  <div class="banner-caption"><?php echo $company_name; ?> 3DCG展示ホール</div>
  <div class="hero__scroll__area"><p>SCROLL</p></div>
</div>
<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
<p style="text-align:center">
    <a class="c-btn c-btn_primary" href="<?php echo get_site_url().'/company-edit/?id='.$post_id ?>">編集</a>
</p>
<?php } ?>
<div class="company-info meeting-info">
<?php if ($company_no == $yourlink_no) : ?>
    <div style="width: 300px; margin:auto">
        <h4 style="margin:20px auto 30px;">Zoom情報</h4>
        <p>●1月28日　（10時～20時）</p>
        <p>　ID:　963 2560 8476</p>
        <p>　パスコード:　906301</p>
        <a style="color:#4169e1" href="https://zoom.us/j/96325608476?pwd=c041azU4ZDZLTzJGMkpuTG9jdjNmZz09">https://zoom.us/j/96325608476?pwd=c041azU4ZDZLTzJGMkpuTG9jdjNmZz09</a>
        <p>&nbsp;</p>
        <p>●1月29日　（10時～17時30分）</p>
        <p>　ID:　985 4941 1442</p>
        <p>　パスコード:　952770</p>
        <a style="color:#4169e1" href="https://zoom.us/j/98549411442?pwd=bS9EZHJWc0d0SjdtUEUvR0pLQm5QQT09">https://zoom.us/j/98549411442?pwd=bS9EZHJWc0d0SjdtUEUvR0pLQm5QQT09</a>
    </div>
<?php else : ?>
    <div style="width: 200px; margin:auto">
        <h4 style="margin:20px auto 30px;">Zoom情報</h4>
        <p><strong>ID：</strong><?php echo $company_zoom_id; ?></p>
        <p><strong>パスワード	：</strong><?php echo $company_zoom_pass; ?></p>
    </div>
<?php endif; ?>
<?php if($company_name == $benetset_co_name): ?>
    <p style="text-align: center; margin-top: 20px;">
      お待たせしてしまう可能性があるため、
      なるべくお問い合わせフォームからご連絡ください。<br>
      折返しご連絡をさせていただきます。
    </p>
<?php endif; ?>
</div>
<div class="company-info meeting-desc">
    <h4>Zoomオンライン商談の流れ</h4>
    <p>
    ① Zoomアプリを起動する（事前にアプリのインストールをお願いします。）<br><br>
    ② ミーティングに参加するをクリック<br><br>
    ③ 『ミーティングIDまたはパーソナル…』と書かれているBOXに企業のミーティングIDを入れる<br><br>
    ④ 参加をクリック<br><br>
    ⑤ 『Zoom Meetingを開きますか？』という画面が上部に出てくるので『 Zoom Meetingを開く』をクリック<br><br>
    ⑥ 『ミーティングパスコードを入力』と出てくるので企業のパスワードを入力<br><br>
    ⑦ ミーティングに参加するをクリック<br><br>
    ⑧ ホストが許可するのをお待ちください、の画面になるのでそのまましばらくお待ちください。<br>
    ホスト（企業）が準備が整ったら、映像と音声が繋がります。
    </p>
</div>
<div class="company-info meeting-desc">
    <h4>注意点</h4>
    <p>
    ・企業が他の参加者と商談中の場合、映像と音声が繋がるのに時間がかかる場合があります。<br>
    　アクセスがあったことは通知されていますので、そのまましばらくお待ちいただくか少し時間をおいてから再度アクセスお願い致します。<br>
    　（映像と音声が繋がったあと、お名前等を企業へ直接お話しください。企業はどなたがアクセスしているか認識しておりません。）<br>
    <br>
    ・商談中に他の参加者のアクセスがあった場合、一時的に3者、4者が繋がるケースがありますがご了承お願い致します。<br>
    <br>
<?php if($company_name != $yourlink_name): ?>
    ・オンライン商談の受付時間は下記の通りです。<br>
    　1/28（木）10時～19時<br>
    　1/29（金）10時～17時<br>
    　これ以外の時間はアクセスいただいても企業につながりませんのでご注意ください。
<?php else: ?>
    ・株式会社YourLinkのオンライン商談の受付時間は下記の通りです。<br>
    　1/28（木）10時～20時<br>
    　1/29（金）10時～17時30分<br>
    　これ以外の時間はアクセスいただいても企業につながりませんのでご注意ください。
<?php endif; ?>
    </p>
</div>



</main><!-- #main -->

<?php
get_footer();
