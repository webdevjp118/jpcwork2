<?php

function remove_menus (){
    unset($menu[25]; // 댓글
    unset($menu[70]; // 프로필
    unset($menu[75]; // 툴
}
// add_action('admin_menu','remove_menus');

//======================================================================================================================================================
// 맞춤헤더이미지 설치
//======================================================================================================================================================
$custom_header_defaults=array('default-image'=>get_bloginfo('template_url').'/images/headers/logo.png'
    ,'header-text'=>false
    , // 헤더 화상상에 텍스트를 씌우다
);

add_theme_support('custom-header', $custom_header_defaults);//커스텀 헤더 기능 활성화하기
//페이지네이션
function pagination ($pages='',$range=2) {
    $showitems=($range*2)+1;//보낼 쪽수(5쪽 표시)
    global $paged;//현재 페이지 값
    if(empty ($paged )) {
        $paged=1;//기본 페이지
    }
    if ($pages == ''){
        global$wp_query;
        $pages=$wp_query->max_num_pages;//전체 페이지 개수 가져오기
        if(!$pages){//전체 페이지 수가 비어 있는 경우에는 1로 한다.
            $pages=1;
        }
    }

    if(1 != $pages){//전체 페이지가 1이 아닐 경우 페이지 네이션을 표시한다.
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";

        //Prev: 현재 페이지 값이 1보다 클 경우 표시
        if ($paged>1){
            echo "<li class=\"prev\"><a href ='".get_pagenum_link ($paged-1). "'>Prev</a></li>\n";
        }
        for ($i=1;$i<=$pages;$i++){
            if(1 !=$pages &&(! ($i>=$paged +$range+1 ||$i<=$paged-$range-1)||$pages<=$showitems )) {
                //삼항 연산자에서의 조건 분기
                echo ($paged ==$i)? "<li class=\"active\">".$i."</li>\n":"<li><a href ='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }

        //Next: 총 페이지 수보다 현재 페이지 값이 작은 경우 표시
        if ($paged<$pages){
            echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged+1)."\">Next</a></li>\n";
        }
        echo "</ul>\n";
        echo "</div>\n";
    }
}

//======================================================================================================================================================
// 게시물의 첫 번째 이미지를 얻다
//======================================================================================================================================================
function getPostImage($mypost){
    if(empty($mypost)){
        return (null);
    }
    if(ereg('<img([]+)([^>]*)src\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content,$img_array)) {
        //img태그로 직접 화상에 접속한 것이 있음
        $dummy=ereg('<img([]+)([^>]*)alt\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content ,$alt_array);
        $resultArray["url"]=$img_array[3];
        $resultArray["alt"]=$alt_array[3];
    } else {
        // 직접 img 태그로 접속되지 않았을 경우 결합된 이미지 가져오기
        $files=get_children(array('post_parent'= >$mypost->ID ,'post_type'= >'attachment','post_mime_type'= >'image'));
        if(is_array($files) && count($files) != 0){
            $files=array_reverse($files);
            $file=array_shift($files);
            $resultArray["url"]=wp_get_attachment_url ($file->ID);
            $resultArray["alt"]=$file->post_title;
        } else {
            return(null);
        }
    }
    return ($resultArray);
}
    
//======================================================================================================================================================
// 커스텀 필드 설정
//======================================================================================================================================================

//======================================================================================================================================================
// 투고 페이지 등에 투고 페이지를 추가하기 위한 액션 후크
//======================================================================================================================================================
add_action ('admin_menu','add_custom_inputbox');

//======================================================================================================================================================
// 추가한 표시 항목의 데이터 갱신 및 저장을 위한 액션 후크
//======================================================================================================================================================
add_action ('save_post','save_custom_postdata');

//======================================================================================================================================================
// 입력 항목이 어떤 투고 유형의 페이지에 표시되는지 설정
//======================================================================================================================================================
function add_custom_inputbox (){
    // 첫 번째 인수:편집 화면 html에 삽입되는 id 속성 이름
    // 두번째 인수: 관리화면에 표시되는 커스텀 필드명
    // 제삼 인수: 메타 박스 안에 출력되는 함수 이름
    // 제4인수: 관리화면에 표시할 커스텀필드의 위치(post라면 투고, page라면 고정페이지, 커스텀투고 유형도 지정할 수 있음)
    // 제5인수: 배치되는 순서
    add_meta_box ('about_id','ABOUT','custom_area 5','page','normal');
    add_meta_box ('system_price_id','料金 システム','custom_area 4','page','normal');
    add_meta_box ('access_id','アクセス','custom_area 2','page','normal');
    add_meta_box ('top_baner_id','トップ バナー','custom_area 3','page','normal');
    add_meta_box ('product_id','キャスト 情報','custom_area','product','normal');
    add_meta_box ('sns_id','SNS','custom_area 6','page','normal');
    add_meta_box ('copyright_id','copyright','custom_area 7','page','normal');
    add_meta_box( 'img_auth_id', '나이인증페이지', 'custom_area8', 'page', 'normal');
    add_meta_box( 'work_schedule_id', '출근 스케줄', 'custom_area9', 'product', 'normal');
}

//======================================================================================================================================================
// 관리화면에 표시할 화면 설정
//======================================================================================================================================================
function custom_area (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'名前 :<input type=" text " name=" name " value="'. get_post_meta ($post->ID ,'name', true).'" ><br>';
    echo'年齢 :<input type=" text " name=" age " value="'. get_post_meta ($post->ID ,'age', true).'" ><br>';
    echo'指名 料 :<input type=" text " name=" price " value="'. get_post_meta ($post->ID ,'price', true).'" ><br>';
    echo'血液 型 :<input type=" text " name=" blood " value="'. get_post_meta ($post->ID ,'blood', true).'">型<br>';
    echo'身長 :<input type=" text " name=" height " value="'. get_post_meta ($post->ID ,'height', true).'">cm<br>';
    echo'趣味 :<input type=" text " name=" hobby " value="'. get_post_meta ($post->ID ,'hobby', true).'" ><br>';
    echo'好き な タイプ :<input type=" text " name=" like " value="'. get_post_meta ($post->ID ,'like', true).'" ><br>';
    echo'Twitter :<input type=" text " name=" twitter " value="'. get_post_meta ($post->ID ,'twitter', true).'" ><br>';
    echo'コメント :<textarea cols=" 70 " rows=" 5 " name=" comment " >'. get_post_meta ($post->ID ,'comment', true).'< / textarea ><br>';
    for ($i=1;$i<=5;$i++){
        echo'画像'.$i.':<input type=" text " name=" product_img'.$i.'" value="'. get_post_meta ($post->ID ,'product_img'.$i , true).'" >';
        echo'<input type=" checkbox " name=" product_img_chk'.$i.'"';
        if ('on'== get_post_meta ($post->ID ,'product_img_chk'.$i , true )) {
            echo'checked=" checked "';
        }
        echo'><br>';
    }
}
    
function custom_area2(){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'店舗 名 :<input type=" text " name=" shop_name " value="'. get_post_meta ($post->ID ,'shop_name', true).'" ><br>';
    echo'アクセス :<textarea cols=" 70 " rows=" 10 " name=" access " >'. get_post_meta ($post->ID ,'access', true).'< / textarea ><br>';
    echo'영업 개시 시각:<input type="text"size="2"maxlength="2"pattern="([0-2][0-9]| 30)"title="필수. 반각 숫자. 입력 범위(00~30)"name="shop_open_hh"value="'. get_post_meta($post->ID,'shop_open_hh', true)'">:<input type="text"size="2"maxlength="2"pattern="([0-5][0-9])"title="필수. 반각 숫자. 입력 범위(00~59)"name="shop_open_mi"value="'. get_post_meta($post->ID,'shop_open_mi', true)'"><br>';
    echo'영업 종료 시각:<input type="text"size="2"maxlength="2"pattern="([0-3][0-9])"title="반각 숫자. 입력 범위(00~39)"name="shop_close_hh"value="'. get_post_meta($post->ID,'shop_close_hh', true)'">:<input type="text"size="2"maxlength="2"pattern="([0-5][0-9])"title="반각 숫자. 입력 범위(00~59)"name="shop_close_mi"value="'. get_post_meta($post->ID,'shop_close_mi', true)'"><br>';
    echo'電話 :<input type=" text " name=" tel " value="'. get_post_meta ($post->ID ,'tel', true).'" ><span style=" color:# aaa; ">例:03-1234-5678</ span ><br>';
    echo'WEB 予約 URL :<input type=" text " name=" web_reservation " value="'. get_post_meta ($post->ID ,'web_reservation', true).'" ><br>';
    echo'地図 :<textarea cols=" 70 " rows=" 5 " name=" map " >'. get_post_meta ($post->ID ,'map', true).'< / textarea ><br>';
    echo '<span style="color: #aa;"> Google 맵 등에서 그대로 붙여넣기 가능합니다 </span><br>';
    echo'ロゴ URL :<input type=" text " name=" link_logo " value="'. get_post_meta ($post->ID ,'link_logo', true).'" ><br>';
}
    
function custom_area3 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    for ($i=1;$i <=5;$i++){
        echo'画像'.$i.':<input type=" text " name=" top_baner'.$i.'" value="'. get_post_meta ($post->ID ,'top_baner'.$i , true).'" ><br><br>';
    }
}
    
function custom_area4 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'< textarea cols=" 100 " rows=" 15 " name=" system_price " >'. get_post_meta ($post->ID ,'system_price', true).'< / textarea ><br>';
}
    
function custom_area5 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'< textarea cols=" 100 " rows=" 15 " name=" about_comment " >'. get_post_meta ($post->ID ,'about_comment', true).'< / textarea ><br>';
}
    
function custom_area6 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'Facebook URL :<input type=" text " name=" sns_fb " value="'. get_post_meta ($post->ID ,'sns_fb', true).'" ><br>';
    echo'Twitter URL :<input type=" text " name=" sns_tw " value="'. get_post_meta ($post->ID ,'sns_tw', true).'" ><br>';
    echo'Instagram URL :<input type=" text " name=" sns_isg " value="'. get_post_meta ($post->ID ,'sns_isg', true).'" ><br>';
}
function custom_area7 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'copyright :<input type=" text " name=" copyright " value="'. get_post_meta ($post->ID ,'copyright', true).'" ><br>';
}
function custom_area8 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    echo'背景 画像 URL :<input type=" text " name=" img_auth " value="'. get_post_meta ($post->ID ,'img_auth', true).'" ><br>';
    echo'ENTER ボタン リンク 先 :<input type=" text " name=" link_auth_enter " value="'. get_post_meta ($post->ID ,'link_auth_enter', true).'" ><br>';
    echo'EXIT ボタン リンク 先 :<input type=" text " name=" link_auth_exit " value="'. get_post_meta ($post->ID ,'link_auth_exit', true).'" ><br>';
}

function custom_area9 (){
    //이것이 없으면 입력란이 갱신되지 않는다!
    global$post;
    $weekjp=array('일', '월', '화', '수', '목', '금', '토');
    $dateTime=getTodayYYYYMMDD ();
    echo'※24시 이후의 시간을 입력하고 싶은 경우는, 「26:00」라는 형식으로 입력해 주세요.<br>';
    echo'※점포 개점시간·폐점시간을 입력하신 당일 출퇴근 입력은 불가능하오니 주의해 주십시오.<br>';
    for ($i=0;$i<31;$i++){
        $baseDateTime =$dateTime-> format ('Y-m-d H:i:s');
        $workDateFormat=get_date_from_gmt ($baseDateTime ,'Y / m / d').'（'.$weekjp[get_date_from_gmt ($baseDateTime ,'w')].'）';
        $workDate=get_date_from_gmt ($baseDateTime ,'Ymd');
        echo $workDateFormat.':';
        echo'<input type="text"size="2"maxlength="2"pattern="([0-2][0-9]| 30)"title="반각 숫자. 입력 범위(00~30)"name="'.$workDate.'open_hh"value="'. get_post_meta($post->ID,$workDate.'open_hh', true)'">:<input type="text"size="2"maxlength="2"pattern="([0-5][0-9])"title="반각 숫자. 입력 범위(00~59)"name="'.$workDate.'open_mi"value="'. get_post_meta($post->ID,$workDate.'open_mi', true).'">';
        echo'~';
        echo'<input type="text"size="2"maxlength="2"pattern="([0-3][0-9])"title="반각 숫자. 입력 범위(00~39)"name="'.$workDate.'close_hh"value="'. get_post_meta($post->ID,$workDate.'close_hh', true)'">:<input type="text"size="2"maxlength="2"pattern="([0-5][0-9])"title="반각 숫자. 입력 범위(00~59)"name="'.$workDate.'close_mi"value="'. get_post_meta($post->ID,$workDate.'close_mi', true).'" ><br>';
        $dateTime-> modify ('1 day');
    }
}

// 오늘의 취득
function getTodayYYYYMMDD (){
    $get_page_id=get_page_by_path("home");
    $get_page_id =$get_page_id->ID;
    $shopCloseHHMI=get_post_meta ($get_page_id ,'shop_close_hh', true). get_post_meta ($get_page_id ,'shop_close_mi', true);

    $d=new DateTime();
    $dateTime=clone$d;
    $baseDateTime =$dateTime-> format ('Y-m-d H:i:s');
    $now=( get_date_from_gmt ($baseDateTime ,'H')+24). get_date_from_gmt ($baseDateTime ,'i');
    if(intval ($now)<=intval ($shopCloseHHMI )) {
        $dateTime=clone$d;
        $dateTime-> modify ('- 1 day');
        $baseDateTime =$dateTime-> format ('Y-m-d H:i:s');
    }
    return$dateTime;
}

        
//======================================================================================================================================================
// 데이터 저장 설정
//======================================================================================================================================================
// 저장 메서드
function doSave ($post_id ,$data_name){
    $data='';
    if(isset ($_POST[$data_name])) {
        $data =$_POST[$data_name];
    } else {
        $data='';
    }
    //-1이 되면 항목이 바뀐 것이 되므로 항목을 갱신한다.
    if ($data !=get_post_meta ($post_id ,$data_name , true )) {
        update_post_meta ($post_id ,$data_name ,$data);
    } elseif ($data == ""){
        delete_post_meta ($post_id ,$data_name , get_post_meta ($post_id ,$data_name , true ));
    }
}

function save_custom_postdata ($post_id){
    /* 캐스트  -------------------------*/
    doSave ($post_id ,'name');
    doSave ($post_id ,'age');
    doSave ($post_id ,'blood');
    doSave ($post_id ,'hobby');
    doSave ($post_id ,'skill');
    doSave ($post_id ,'like');
    doSave ($post_id ,'comment');
    doSave ($post_id ,'img_auth');
    doSave ($post_id ,'price');
    doSave ($post_id ,'link_auth_enter');
    doSave ($post_id ,'link_auth_exit');
    doSave ($post_id ,'link_logo');
    $product_img=array ();
    $product_img_chk=array ();
    for ($i=1;$i <=5;$i++){
        // 캐스트이미지
        if(isset ($_POST['product_img'.$i])) {
            $product_img[$i]=$_POST['product_img'.$i];
        } else {
            $product_img[$i]='';
        }
        if ($product_img[$i]!=get_post_meta ($post_id ,'product_img'.$i , true )) {
            update_post_meta ($post_id ,'product_img'.$i ,$product_img[$i]);
        } elseif ($product_img[$i]== ''){
            delete_post_meta ($post_id ,'product_img'.$i , get_post_meta ($post_id ,'product_img'.$i , true ));
        }

        // 체크박스
        if(isset ($_POST['product_img_chk'.$i])) {
            $product_img_chk[$i]=$_POST['product_img_chk'.$i];
        } else {
            $product_img_chk[$i]='';
        }
        if ($product_img_chk[$i]!=get_post_meta ($post_id ,'product_img_chk'.$i , true )) {
            update_post_meta ($post_id ,'product_img_chk'.$i ,$product_img_chk[$i]);
        } elseif ($product_img_chk[$i]== ''){
            delete_post_meta ($post_id ,'product_img_chk'.$i , get_post_meta ($post_id ,'product_img_chk'.$i , true ));
        }
    }

    /* ABOUT-------------------------*/
    doSave ($post_id ,'about_comment');
    /* 요금 체계-------------------------*/
    doSave ($post_id ,'system_price');
    /* 찾아오기-------------------------*/
    doSave ($post_id ,'shop_name');
    doSave ($post_id ,'access');
    doSave ($post_id ,'shop_open_hh');
    doSave ($post_id ,'shop_open_mi');
    doSave ($post_id ,'shop_close_hh');
    doSave ($post_id ,'shop_close_mi');
    doSave ($post_id ,'tel');
    doSave ($post_id ,'web_reservation');
    doSave ($post_id ,'map');

    /* 탑 배너-------------------------*/
    $top_baner_img=array ();
    for ($i=1;$i <=5;$i++){
        if(isset ($_POST['top_baner'.$i])) {
            $top_baner_img[$i]=$_POST['top_baner'.$i];
        } else {
            $top_baner_img[$i]='';
        }
        if ($top_baner_img[$i]!=get_post_meta ($post_id ,'top_baner'.$i , true )) {
            update_post_meta ($post_id ,'top_baner'.$i ,$top_baner_img[$i]);
        } elseif ($top_baner_img[$i]== ''){
            delete_post_meta ($post_id ,'top_baner'.$i , get_post_meta ($post_id ,'top_baner'.$i , true ));
        }
    }
    /* SNS-------------------------*/
    doSave ($post_id ,'sns_fb');
    doSave ($post_id ,'sns_tw');
    doSave ($post_id ,'sns_isg');

    /* copyright-------------------------*/
    doSave ($post_id ,'copyright');

    /* 출근 스케줄-------------------------*/
    doSave ($post_id ,'shop_name');
    doSave ($post_id ,'access');
    doSave ($post_id ,'open_hh');
    doSave ($post_id ,'open_mi');
    doSave ($post_id ,'close_hh');
    doSave ($post_id ,'close_mi');
    doSave ($post_id ,'tel');
    doSave ($post_id ,'web_reservation');
    doSave ($post_id ,'map');

    for ($i=1;$i <=5;$i++){
        // 캐스트이미지
        if(isset ($_POST['product_img'.$i])) {
            $product_img[$i]=$_POST['product_img'.$i];
        } else {
            $product_img[$i]='';
        }
        if ($product_img[$i]!=get_post_meta ($post_id ,'product_img'.$i , true )) {
            update_post_meta ($post_id ,'product_img'.$i ,$product_img[$i]);
        } elseif ($product_img[$i]== ''){
            delete_post_meta ($post_id ,'product_img'.$i , get_post_meta ($post_id ,'product_img'.$i , true ));
        }
    }

    $dateTime=new DateTime ();
    for ($i=0;$i<31;$i++){
        $baseDateTime =$dateTime-> format ('Y-m-d H:i:s');
        $workDate=get_date_from_gmt ($baseDateTime ,'Ymd');
        doSave ($post_id ,$workDate.'open_hh');
        doSave ($post_id ,$workDate.'open_mi');
        doSave ($post_id ,$workDate.'close_hh');
        doSave ($post_id ,$workDate.'close_mi');
        $dateTime-> modify ('1 day');
    }
}

//======================================================================================================================================================
// 맞춤투고 유형 설정
//======================================================================================================================================================
add_action ('init','register_post_type_and_taxonomy');
function register_post_type_and_taxonomy (){
    register_post_type (
        'product'//커스텀 투고 유형명
        ,array (
            'labels'=> array (
                        'name'=>'캐스트'//대시보드에 표시되는 이름
                        ,'add_new_item'=>'캐스트 신규추가'// 신규추가 화면에 뜨는 이름
                        ,'edit_item'=>'캐스트 편집'// 편집 화면에 표시되는 이름
                        ,
                    )
            ,'public'=>true // 대시보드에 표시 여부
            ,'hierarchical'=>true // 계층형으로 할지 여부
            ,'has_archive'=>true // 아카이브(일람표시기능)를 갖는지 여부
            ,'supports'=>array( // 커스텀 게시 페이지에 표시되는 항목
                            'custom-fields'// 커스텀필드
                        )
            ,'menu_position'=>5 // 대시보드에서 게시물 하단에 표시
            ,'rewrite'=>array('with_front'=> false) // 퍼머링크 편집(product 앞계층 URL 지우고 보기)
        )
    ;

    register_post_type (
        'campaign'// 커스텀 투고 유형명
        ,array (
            'labels'=> array (
                        'name'=>'캠페인'//대시보드에 표시될 이름
                        ,'add_new_item'=>'캠페인 신규추가'// 신규추가 화면에 뜨는
                        ,'edit_item'=>'캠페인 편집'// 편집화면에 표시되는 이름
                        ,
                    )
            ,'public'=>true // 대시보드에 표시 여부
            ,'hierarchical'=>true // 계층형으로 할지 여부
            ,'has_archive'=>true // 아카이브(일람표시기능)를 갖는지 여부
            ,'supports'=>array( // 커스텀 게시 페이지에 표시되는 항목
                        )
            ,'menu_position'=>5 // 대시보드에서 게시물 하단에 표시
            ,'rewrite'=>array('with_front'=> false) // 펌링크 편집(campaign 앞 계층 URL 지우고 보기)
        )
    );
}

//======================================================================================================================================================
// 목록화면에 맞춤택소노미 추가
//======================================================================================================================================================
/* product */
function manage_product_columns ($columns){
    unset ($columns['title']);
    $date_escape =$columns['date'];
    unset ($columns['date']);
    $columns['name']='이름';
    $columns['age']='나이';
    $columns['image']='이미지';
    $columns['date'] =$date_escape;
    return$columns;
}

function add_product_column ($column_name ,$post_id){
    $column_val='';

    switch ($column_name){
        case'name':
            $name=get_post_meta ($post_id ,'name', true);
            if(isset($name) && $name){
            echo edit_post_link ($name , '', '');
            } else {
                echo edit_post_link(__('None') , '', '');
            }
            break;
        case'age':
            $age=get_post_meta ($post_id ,'age', true);
            if(isset ($age)&&$age){
                echo $age;
            } else {
                echo __('None');
            }
            break;
        case'image':
            // 이미지1만 표시
            $product_img=get_post_meta ($post_id ,'product_img1', true);
            if(isset($product_img) && $product_img){
?>
<div>
    <img class="img-responsive" alt="" src="<?php echo $product_img; ?>" width=" 80px " height=" auto " >
</div>
<?php
            } else {
                echo __('None');
            }
            break;
        default :
    }
}

add_filter ('manage_edit-product_columns','manage_product_columns');
add_action ('manage_product_posts_custom_column','add_product_column', 10 , 2);


//======================================================================================================================================================
// 맞춤메뉴 추가
//======================================================================================================================================================
register_nav_menu('mainmenu', '메인 메뉴');
register_nav_menu('footermenu', '풋타메뉴');

//======================================================================================================================================================
// 위젯 추가
//======================================================================================================================================================
//위젯 영역 정의
function arphabet_widgets_init (){
    register_sidebar(array (
        'name'=> '사이드바'
        ,'id'= >'my_sidebar '
        ,'before_widget'= >'<div>'
        ,'after_widget'= >'</div>'
        ,'before_title'= >'<h2 class=" widget-title ">'
        ,'after_title'= >'</h2>'
    ));
    register_sidebar(array (
        'name'=> '캠페인용 사이드바'
        ,'id'= >'campaign_widget '
        ,'before_widget'= >'<div>'
        ,'after_widget'= >'</div>'
        ,'before_title'= >'<h2 class=" widget-title ">'
        ,'after_title'= >'</h2>'
    ));
    register_sidebar(array (
        'name'=> '랭킹'
        ,'id'= >'ranking_widget '
        ,'before_widget'= >'<div>'
        ,'after_widget'= >'</div>'
        ,'before_title'= >'<h2 class=" widget-title ">'
        ,'after_title'= >'</h2>'
    ));
}
add_action ('widgets_init','arphabet_widgets_init');

//위젯 만들기
class RankingWidgetItem extends WP_Widget {
    function RankingWidgetItem (){
        parent::WP_Widget(false, $name='캐스트 랭킹');
    }
    function widget ($args ,$instance){
        extract ($args);
        $rank=apply_filters ('widget_rank',$instance['rank']);
        $name=apply_filters ('widget_title',$instance['name']);
        $img=apply_filters ('widget_img',$instance['img']);
        $link=apply_filters ('widget_link',$instance['link']);
?>
<?php   if(!empty($name)){ ?>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" >
            <div class="panel panel-naked panel-ranking panel-ranking-no<?php echo $rank ?>" >
                <div class="panel-body" >
                    <div class="panel-head" >
                        <h3><span class=" lsf-icon crown no<?php echo $rank ?>" ></span>NO.<?php echo $rank ?></h3>
                    </div>
                    <a href="<?php echo $link; ?>" >
                        <img class="img-responsive" alt="" src="<?php echo $img; ?>" >
                        <div>
                            <p class=" innrTxt " ><?php echo $name; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
<?php
        }
    }

    function update ($new_instance ,$old_instance){
        $instance =$old_instance;
        $instance['rank']=strip_tags ($new_instance['rank']); // サニ タイズ
        $instance['name']=strip_tags ($new_instance['name']); // サニ タイズ
        $instance['img']=trim ($new_instance['img']); // サニ タイズ
        $instance['link']=strip_tags ($new_instance['link']); // サニ タイズ
        return$instance;
    }

    function form ($instance){
        $rank=esc_attr ($instance['rank']);
        $name=esc_attr ($instance['name']);
        $img=esc_attr ($instance['img']);
        $link=esc_attr ($instance['link']);
    ?>
    <p>
        <label for="<?php echo $this->get_field_id ('rank'); ?>" >
            <?php echo '순위:'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id ('rank'); ?>" name="<?php echo $this->get_field_name ('rank'); ?>" type=" text " value="<?php echo $rank; ?>" />
            <br>반각숫자로 입력해주세요 </span>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id ('name'); ?>" >
            <?php echo '이름: '; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id ('name'); ?>" name="<?php echo $this->get_field_name ('name'); ?>" type=" text " value="<?php echo $name; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id ('img'); ?>" >
            <?php echo '이미지 URL:'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id ('img'); ?>" name="<?php echo $this->get_field_name ('img'); ?>" type=" text " value="<?php echo $img; ?>" />
    <p> 
        ※미디어 라이브러리에서 업로드한 이미지를 선택하면 오른쪽에 <URL>이 나오므로, 그것을 카피&페이스트 해 주세요 </p>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id ('link'); ?>" >
            <?php echo '링크 URL: '; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id ('link'); ?>" name="<?php echo $this->get_field_name ('link'); ?>" type=" text " value="<?php echo $link; ?>" />
    </p>
<?php
    }
}
add_action ('widgets_init', create_function('','return register_widget("RankingWidgetItem");'));

function outschedule($day) {//DB에서 해당 날짜 데이터 가져오기
    global$wpdb;
    $table_name =$wpdb-> prefix.'krc_schedules';
    $schedules =$wpdb-> get_var (
    $wpdb-> prepare(" SELECT work FROM$table_name WHERE day=%s AND status=%d " ,$day ,0 ));
    $works=unserialize ($schedules);
    return $works; // 배열로 돌려주기
}

function todaysCastHtml ($day=''){ // 本日 の 出勤
    $time9=9-27;//6시에 다음날 스케줄로 전환되는 사양
    $day =$day!=''?$day:date("Y-m-d " , strtotime("+" .$time 9."hour" ));
    $works=outschedule ($day);
    addSchedules ($works);
}
function addSchedules ($works){
    
    $schedule ='schedule';
    
    if(!$works){
        //예정이 없는 경우
        echo'<br>';
    } else if ($works !='rest') {
        echo'<div class="clearfix">';
    
        $works_array=array ();
        foreach ($works as$id=>$val){
            $works_array[$val["s_order"]]=array (
                                            'id'= >$id ,
                                            'time'= >$val
                                        );
        }
        ksort ($works_array);
        foreach ($works_array as $id=>$work){
            $args=array (
                    'post_type'= >'cast',
                    'post __ in'=>array ($work['id']),
                    'orderby'= >'post __ in '
                );
                //$test =
            query_posts ($args);
            // printR ($test);
            while(have_posts ()):
                the_post ();
                set_query_var ('schedule',$work['time']);
                get_template_part( 'content', 'castlist');//content-castlist.php는 준비해두세요.
            endwhile;
            wp_reset_query ();
        }
        echo'</div>';
    } else {
        //휴무
        echo'<br>';
    }
}

