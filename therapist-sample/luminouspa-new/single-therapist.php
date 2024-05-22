<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package luminouspa-new
 */

get_header();
?>

	<main id="primary" class="site-main">

<?php
while ( have_posts() ) :
	the_post();
	$post_id = get_the_ID();
	$post_name = get_post_meta( $post_id, 'name', true );		
	$post_age = get_post_meta( $post_id, 'age', true );		
	$post_start_date = get_post_meta( $post_id, 'start_date', true );		
	$post_comment = get_post_meta( $post_id, 'comment', true );		
	$post_photo = get_post_field('therapist_img1', $post_id);
	if(empty($post_photo)) $post_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
	$twitter_post = get_post_meta( $post_id, 'twitter_post', true );
	$twitter_post = str_replace('twitterpostid=','', $twitter_post);
	$twitter_post = base64_decode( $twitter_post );	
	$twitter_post = str_replace('\"', '', $twitter_post);
	
	$post_price = get_post_meta( $post_id, 'price', true );		
	if(!empty($post_price)) $post_price = '+'.$post_price.'yen';
	else '-';

	$dateTime = new DateTime();
	$schedule_list = [];
	for($i = 0; $i <= 7; $i++) {
		$baseDateTime = $dateTime->format('Y-m-d H:i:s');
		$workDate = get_date_from_gmt($baseDateTime, 'Ymd');
		$open_hh = get_post_meta($post_id, $workDate.'open_hh', true);
		$open_mi = get_post_meta($post_id, $workDate.'open_mi', true);
		$close_hh = get_post_meta($post_id, $workDate.'close_hh', true);
		$close_mi = get_post_meta($post_id, $workDate.'close_mi', true);
		if($i == 0) {
			if(!empty($open_hh) && !empty($open_mi) && !empty($close_hh) && !empty($close_mi)) {
				$worktime = $open_hh.'：'.$open_mi.' - '.$close_hh.'：'.$close_mi;
			}
			else {
				$worktime = "-";
			}
			
			$schedule = array('date' => '明日', 'worktime'=>$worktime);
			array_push($schedule_list, $schedule);
		}
		else {
			$month = get_date_from_gmt($baseDateTime, 'm') + 0;
			$day = get_date_from_gmt($baseDateTime, 'd') + 0;
			$datelabel = $month.'/'.$day;
			if(!empty($open_hh) && !empty($open_mi) && !empty($close_hh) && !empty($close_mi)) {
				$worktime = $open_hh.'：'.$open_mi.'～'.$close_hh.'：'.$close_mi;
			}
			else {
				$worktime = "-";
			}
			$schedule = array('date' => $datelabel, 'worktime'=>$worktime);
			array_push($schedule_list, $schedule);
		}
		$dateTime->modify('1 day');
	}
?>
<?php
endwhile; // End of the loop.
?>


<section class="therapist_detail_section">
	<div class="medium_custom_container">
		<div class="heading_text">
			<h5><?php echo $post_name; ?><span>（<?php echo $post_age; ?>）</span></h5>
		</div>
		<div class="therapist_detail_sec">
			<div class="custom_row">
				<div class="therapist_detail_image">
					<div class="therapist_detail_image_inner">
						<img src="<?php echo $post_photo; ?>">
					</div>
				</div>
				<div class="therapist_detail_text">
					<div class="therapist_detail_text_btns">
						<span>オススメ</span>
						<span><?php echo $schedule_list[0]['date'].' '.$schedule_list[0]['worktime']; ?></span>
					</div>
					<div class="therapist_detail_text_inner">
						<h4><?php echo $post_name; ?><span>（<?php echo $post_age; ?>）</span></h4>
						<div class="therapist_detail_text_inner_text therapist_detail_text_date">
							<h6>入店日</h6>
							<p><?php echo $post_start_date; ?></p>
						</div>
						<div class="therapist_detail_text_inner_text therapist_detail_text_hobby">
							<h6>趣味</h6>
							<p>映画・ドラマ鑑賞、人間観察、仕事</p>
						</div>
						<div class="therapist_detail_text_inner_text therapist_detail_text_comments">
							<h6>お店からのコメント</h6>
							<p><?php echo $post_comment; ?></p>
						</div>
						<div class="therapist_detail_text_inner_text therapist_detail_text_material">
							<h6>指名料</h6>
							<p class="ls-20"><?php echo $post_price; ?></p>
						</div>
						<div class="therapist_detail_text_inner_text therapist_detail_text_scheduled">
							<h6>出勤予定</h6>
							<div class="therapist_detail_text_scheduled_table">
								<table>
<?php for($i=1;$i<=7;$i++): ?>
									<tr>
										<td class="<?php echo ($i % 2)?'table_bg_white':''; ?>"><?php echo $schedule_list[$i]['date']; ?></td>
										<td class="<?php echo ($i % 2)?'':'table_bg_white'; ?>"><?php echo $schedule_list[$i]['worktime']; ?></td>
									</tr>
<?php endfor; ?>
								</table>
							</div>
						</div>
						<div class="twitter_box">
							<div class="twitter_box_inner">
								<?php echo $twitter_post; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



</main><!-- #main -->

<?php
get_footer();
