<?php /* Template Name: Contact*/ ?>
<?php get_header();?>

<!-- contact_form_section -->
<section class="contact_form_section">
    <div class="medium_custom_container">
        <div class="heading_text">
            <h5>CONTACT</h5>
            <p>ご予約＆お問い合わせ</p>
        </div>
        <div class="contact_form_sec">
            <form>
                <div class="custom_row">
                    <div class="custom_col_6">
                        <div class="contact_form_field">
                            <label><span>*</span>お名前</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="custom_col_6">
                        <div class="contact_form_field">
                            <label><span>*</span>ふりがな</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="custom_col_6">
                        <div class="contact_form_field">
                            <label><span>*</span>お電話番号</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="custom_col_6">
                        <div class="contact_form_field">
                            <label><span>*</span>メールアドレス</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="custom_col_12">
                        <div class="contact_form_field">
                            <label><span>*</span>希望セラピスト</label>
                            <input type="text" placeholder="- - -">
                        </div>
                    </div>
                    <div class="custom_col_12">
                        <div class="contact_form_field">
                            <label><span>*</span>希望コース</label>
                            <input type="text" placeholder="- - -">
                        </div>
                    </div>
                    <div class="custom_col_12">
                        <div class="contact_form_field check_box_field">
                            <label><span>*</span>希望コース時間</label>
                            <div class="custom_checkbox reminder_ckeck_box">
                                <input type="checkbox" id="check_box">
                                <label for="check_box">90分</label>
                            </div>
                            <div class="custom_checkbox reminder_ckeck_box">
                                <input type="checkbox" id="check_box1">
                                <label for="check_box1">120分</label>
                            </div>
                            <div class="custom_checkbox reminder_ckeck_box">
                                <input type="checkbox" id="check_box2">
                                <label for="check_box2">150分</label>
                            </div>
                            <div class="custom_checkbox reminder_ckeck_box">
                                <input type="checkbox" id="check_box3">
                                <label for="check_box3">180分</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom_col_12">
                        <div class="contact_form_field contact_form_field_date">
                            <label><span>*</span>希望日時</label>
                            <input type="text" id="datepicker" placeholder="yyyy-mm-dd      - - -">
                            
                        </div>
                    </div>
                    <div class="custom_col_12">
                        <div class="contact_form_field">
                            <label><span>*</span>その他</label>
                            <textarea></textarea>
                        </div>
                    </div>
                </div>
                <button>この内容で送信する</button>
            </form>
        </div>
    </div>
</section>

</main><!-- #main -->

<?php
get_footer();