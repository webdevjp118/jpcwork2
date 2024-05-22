<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yoyogi
 */

get_header();
?>

<section class="future-sec">
    <div class="container">
        <div class="future-bx">
            <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/future-img.png" />
            </div>
            <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/future-icon.png" />
            </div>
            <div class="cont">
                <h3>未来の<span>エジソン</span>、集まれ♪</h3>
                <p>「よよぎ」は、可能な限り１対１指導を目指しており、個別対応の「学習支援」が得意な放課後等デイサービスです！</p>
				<p>「よよぎ」では、「発達障がい」を「発達特性」と考えます。</p>
                <div class="cont-flex">
                    <ul>
                        <li>エジソンやアインシュタインをはじめたくさんの歴史<br/>
                        上の偉人たちは「発達特性」がありました。</li>
                        <li> 「学習支援」「運動療育」など多彩なプログラムを<br/>
                        通じて、身体や脳、心の発達の支援を行います。</li>
                    </ul>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/future-img2.png" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="introduce-sec">
    <div class="intro-background-clip">
        <img class="img img1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip01.png" />
        <img class="img img2" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip03.png" />
        <img class="img img3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip01.png" />
        <img class="img img4" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip04.png" />
        <img class="img img5" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip02.png" />
        <img class="img img6" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip01.png" />
    </div>
    <div class="container">
        <div class="intro-head">
            <h2>よよぎの紹介</h2>
            <p>INTRODUCE</p>
        </div>
        <div class="intro-row">
            <div class="target-bx one">
                <ul>
                    <li><span>対象：</span> 発達に心配のある小学1年生から高校3年生までの児童</li>
                    <li><span>定員：</span> 10名/日</li>
                    <li><span>ご利用料金：</span> 下記表参照</li>
                </ul>
            </div>
            <div class="att-pin">
                <div class="line one"></div>
                <div class="line two"></div>
            </div>
            <div class="target-bx two">
                <div class="target-flex">
                    <div class="col-6">
                        <div class="target-inner-bx one">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">1回(全世帯共通)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>平日：約</td><td class="price">998円</td>
                                    </tr>
                                    <tr>
                                        <td>土曜：約</td><td class="price">1,139円</td>
                                    </tr>
                                    <tr>
                                        <td>長期休暇：約</td><td class="price">1,139円</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="target-inner-bx two">
                            <table>
                                <thead>
                                    <tr>
                                        <th>世帯所得</th>
                                        <th>月額上限</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>非課税世帯</td><td class="price">0円</td>
                                    </tr>
                                    <tr>
                                        <td>約 <span>890万円</span>まで</td><td class="price">4,600円</td>
                                    </tr>
                                    <tr>
                                        <td>約 <span>890万円</span>以上</td><td class="price">37,200円</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-list">
            <ul>
                <li> 法令の定める額(1割負担)</li>
                <li> 世帯収入により月額料金が定められております。</li>
                <li> 送迎料も含みます。</li>
                <li> 上限を超える料金のお支払いはございません。</li>
            </ul>
        </div>
        <div class="intro-business">
            <div class="cont">
                <h2>関連事業</h2>
                <ul>
                    <li>代々木個別指導塾</li>
                    <li>代ゼミサテライン予備校</li>
                    <li>さくら国際高等学校</li>
                </ul>
            </div>
            <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intro-business.jpg" />
            </div>
        </div>
        <div class="intro-time">
            <div class="intro-time-flex">
                <div class="intro-time-individual">
                    <div class="head">
                        <h2>選べる個別スタイル <span></span></h2>
                    </div>
                    <div class="cont">
                        <ul>
                            <li>
                                <div class="stamp">
                                    <h3>小学生なら</h3>
                                </div>
                                <div class="text">
                                    <span>運動（体操）＋学習</span><br/>
                                    併用型で！
                                </div>
                            </li>
                            <li>
                                <div class="stamp">
                                    <h3>中・高生なら</h3>
                                </div>
                                <div class="text">
                                    <span>学習特化</span><br/>
                                    型で！
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="intro-time-service">
                    <div class="head">
                        <h2>サービス提供時間</h2>
                    </div>
                    <div class="intro-service-bx">
                        <div class="img">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intro-service-img.png" />
                        </div>
                        <div class="cont">
                            <ul>
                                <li><span>平日：</span>14：00～18：00</li>
                                <li><span>土/長期休暇：</span>10：00～16：00</li>
                            </ul>
                            <p>＊時間外は、ご相談ください。<br>
                                ※日・祝は休みです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-classroom">
        <div class="head">
            <h2>教室情報・紹介</h2>
        </div>
        <div class="intro-classroom-wrap">
            <div class="classroom-row">
                <div class="col">
                    <div class="classroom-bx one">
                        <div class="cont">
                            <h3>長与校</h3>
                            <p>西彼長与町斉藤郷49-3</p>
                            <div class="contact-flex">
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    095-801-4194
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3352.47782317605!2d129.86723501518338!3d32.83259808095511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x356aadd3ced3c4b9%3A0xc9f728ca88f8fb4b!2z5pS-6Kqy5b6M562J44OH44Kk44K144O844OT44K544KI44KI44GOIOmVt-S4juagoQ!5e0!3m2!1sja!2sjp!4v1625122881147!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="classroom-bx two">
                        <div class="cont">
                            <h3>松山校</h3>
                            <p>長崎市岡町4-2-2F</p>
                            <div class="contact-flex">
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    095-894-7156
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.5643724681727!2d129.85998471555538!3d32.77729178097188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x356aacd9e39348f5%3A0x19cdd4ba1b961514!2z44CSODUyLTgxMTUg6ZW35bSO55yM6ZW35bSO5biC5bKh55S677yU4oiS77ySIDJG!5e0!3m2!1sja!2sjp!4v1625123074777!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="classroom-bx three">
                        <div class="cont">
                            <h3>浜の町校</h3>
                            <p>長崎市万屋町6-13-4F</p>
                            <div class="contact-flex">
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    095-893-5033
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3355.7805119826057!2d129.8779129155548!3d32.74501838098166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35155340ec04cae1%3A0xd9e243f0936d293f!2z44CSODUwLTA4NTIg6ZW35bSO55yM6ZW35bSO5biC5LiH5bGL55S677yW4oiS77yR77yTIDRG!5e0!3m2!1sja!2sjp!4v1625123134048!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="classroom-bx two">
                        <div class="cont">
                            <h3>葉山校</h3>
                            <p>長崎市滑石2-5-15</p>
                            <div class="contact-flex">
                                <div class="contact-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-text">
                                    095-800-6307
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d996.9873896101053!2d129.8447705806214!3d32.80677382032259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x356aad0ed7ad7c15%3A0x83c5d1af9bbe5449!2z5pel5pys44CB44CSODUyLTgwNjEg6ZW35bSO55yM6ZW35bSO5biC5ruR55-z77yS5LiB55uu77yV4oiS77yR77yV!5e0!3m2!1sja!2s!4v1638423132452!5m2!1sja!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="admin-sec">
    <img class="before-img before-after-img cpc6" src="<?php echo get_stylesheet_directory_uri(); ?>/images/admin-before-img.png" />
    <img class="after-img before-after-img cpc6" src="<?php echo get_stylesheet_directory_uri(); ?>/images/admin-after-img.png" />
    <div class="container">
        <div class="admin-bx">
            <div class="admin-flex">
                <div class="admin-profile">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/admin-pic.png" />
                    </div>
                    <div class="cont">
                        <h4>立岩　直樹</h4>
                        <p>（管理者/認定心理士）</p>
                    </div>
                </div>
                <div class="admin-dtl">
                    <h3>管理者紹介</h3>
                    <h4>ADMIN</h4>
                    <p>「よよぎ」は、可能な限り１対１指導を目指しており、個別対応の「学習支援」が得意な放課後等デイサービスです。<br/>
                        エジソンやアインシュタインをはじめたくさんの歴史上の偉人たちは「発達特性」があったそうです。<br/>
                        「学習支援」、「運動（体操）」などを多彩なプログラムを通じて、身体や脳、心の発達を支援します。<br/>
 「ダンス教室」や「プログラミング教室」、「理科実験」「体操教室」「ＳＳＴ」「言語訓練」「算数ラボ」「論理エンジン」「美術あそび」「制作」「ボクササイズ」「野外活動」「発達診断レポート」などなど、多彩なプログラムをご用意しています！</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="after-school-sec">
    <div class="container">
        <div class="aft-scl-service">
            <div class="head">
                <div class="head-flex">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aft-scl-head.png" />
                    </div>
                    <h3>放課後等デイサービスとは</h3>
                </div>
            </div>
            <div class="cont">
                <p>放課後等デイサービスとは、発達に心配のある就学児童（小学生・中学生・高校生）が学校の授業終了後や長期休暇中に通うことのできる施設です。<br/>
                    放課後等デイサービスでは、生活力向上のための様々なプログラムが行われています。</p>
                <p>当校「よよぎ」では「学習特化型」や「学習＋運動型」などお選びいただけます。<br/>
                    トランポリン、楽器の演奏、パソコン教室、社会科見学、造形など習い事に近い活動を行っている施設もあれば、<br/>
                    専門的な療育を受けることができる施設もあります。<br/>
                    今まで不足していた障害児自立支援施設を増やすために、大幅な規制緩和がなされました。<br/>
                    そのため住んでいる地域で、乳幼児の頃から高校を卒業するまで一貫したサービスを<br/>
                    受けられるようになりました。<br/>
                    それとともに、現在多くの放課後等デイサービスが<br/>
                    誕生し、保護者が複数の施設を選択したり、<br/>
                    施設を比べながら選べるようにもなりました。</p>
            </div>
        </div>
    </div>
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
