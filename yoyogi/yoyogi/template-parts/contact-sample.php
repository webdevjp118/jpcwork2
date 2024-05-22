<?php /* Template Name: Contact Sample*/ ?>
<?php 
get_header(); 
?>

<?php
if(isset($_POST['contact-option'])) {
    $field1 = isset($_POST['field1']) ? $_POST['field1']: '';
    $field2 = isset($_POST['field2']) ? $_POST['field2']: '';
    $field3 = isset($_POST['field3']) ? $_POST['field3']: '';
    $field4 = isset($_POST['field4']) ? $_POST['field4']: '';
    $field5 = isset($_POST['field5']) ? $_POST['field5']: '';
    
    // 
    $to = $field1; //to the administrator

    $message = "
    お名前 : ".$field2."<br>
    メールアドレス : ".$field3."<br>
    電話番号 : ".$field4."<br>
    お問い合わせ内容 : <br>
    ".$field5."<br>
    ";

    $subject = 'お問い合わせがありました';
    //件名を設定（JISに変換したあと、base64エンコードをしてiso-2022-jpを指定する）
    $subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS","UTF-8"))."?=";

    $headers = "From: " . $field3 . "\r\n";
    $headers .= "Reply-To: " . $field3 . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $subject, $message, $headers);
    
    // 
    $to = $field3; //to the customer

    $message = "
    お名前 : ".$field2."<br>
    メールアドレス : ".$field3."<br>
    電話番号 : ".$field4."<br>
    お問い合わせ内容 : <br>
    ".$field5."<br>
    ";

    $subject = 'お問い合わせがありました';
    //件名を設定（JISに変換したあと、base64エンコードをしてiso-2022-jpを指定する）
    $subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS","UTF-8"))."?=";

    $headers = "From: " . $field1 . "\r\n";
    $headers .= "Reply-To: " . $field1 . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo '<script>alert("お問い合わせありがとうございました。\nメールアドレスを正しく入力された場合は、「お問い合わせ内容の控え」をメール送信しましたので、内容のご確認をお願い致します。\n＊しばらく経っても届かない場合はもう一度お問い合わせいただくかお電話をお願いします。"); location.href="'.home_url().'"</script>';
    } else {
        echo '<script>alert("送信失敗!"); location.href="'.home_url().'"</script>';
    }    
}

?>

<div class="container">
    <div class="breadcrumb_sec">
        <ul>
            <li>
                <a href="<?php echo get_site_url(); ?>">トップ </a>
            </li>
            <li>
                <a href="#">お問い合わせ</a>
            </li>
        </ul>
    </div>
</div>
<section class="contact-content">
    <div class="table-background-clip guide-background-clip">
        <img class="img img1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip05.png" />
        <img class="img img2" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip01.png" />
    </div>
    <div class="container">
        <div class="contact-wrapper">
                <div class="contact-bx">
                    <div class="head">
                        <h2>お問い合わせ</h2>
                        <p>CONTACT</p>
                    </div>
                    <div class="contact-tabs" id="contact-tabs">
                        <form action="" method="POST">
                            <ul>
                                <li>
                                    <input type="radio" name="field1" value="nagayo@n-ichi.com" checked />
                                    <a href="#contact-form1">長与校</a>
                                </li>
                                <li>
                                    <input type="radio" name="field1" value="matsu@n-ichi.com" />
                                    <a href="#contact-form2">松山校</a>
                                </li>
                                <li>
                                    <input type="radio" name="field1" value="houkago@n-ichi.com" />
                                    <a href="#contact-form3">浜の町校</a>
                                </li>
                                <li>
                                    <input type="radio" name="field1" value="hayama@n-ichi.com" />
                                    <a href="#contact-form4">葉山校</a>
                                </li>
                            </ul>
                            <div class="contact-form" id="contact-form1">
                                <div class="input-group">
                                    <label>お名前 <span>必 須</span></label>
                                    <input type="text" name="field2" required />
                                </div>
                                <div class="input-group">
                                    <label>メールアドレス <span>必 須</span></label>
                                    <input type="email" name="field3" required />
                                </div>
                                <p>携帯電話用メールアドレスの場合「@n-ichi.com」から送信されるメールを<br/>
                                    受信できるよう設定をお願いいたします。</p>
                                <div class="input-group">
                                    <label>電話番号</label>
                                    <input type="text" name="field4" />
                                </div>
                                <div class="input-group">
                                    <label>お問い合わせ内容 <span>必 須</span></label>
                                    <textarea name="field5" required></textarea>
                                </div>
                                <div class="reminder">
                                    <input type="checkbox" required/>
                                    <span></span>
                                    <label>上記の内容で送信する</label>
                                </div>
                                <div class="submit">
                                    <input type="submit" name="contact-option" value="送 信" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="after-school-sec contact-page">
    <div class="aft-scl-contact">
        <div class="aft-scl-contact-wrap">
            <div class="aft-scl-contact-row">
            <div class="col">
                    <div class="aft-scl-contact-bx one">
                        <h4>長与校</h4>
                        <p>西彼長与町斉藤郷49-3</p>
                        <div class="contact-flex js_button" data-href="tel:+0958014194">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-801-4194
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx two">
                        <h4>松山校</h4>
                        <p>長崎市岡町4-2-2F</p>
                        <div class="contact-flex js_button" data-href="tel:+0958947156">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-894-7156
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx three">
                        <h4>浜の町校</h4>
                        <p>長崎市万屋町6-13-4F</p>
                        <div class="contact-flex js_button" data-href="tel:+0958935033">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-893-5033
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx two">
                        <h4>葉山校</h4>
                        <p>長崎市滑石2-5-15</p>
                        <div class="contact-flex js_button" data-href="tel:">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-800-6307
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();