<?php
if ( in_category('6') || post_is_in_descendant_category(6) ) {
	include(TEMPLATEPATH .'/single-2.php');
} elseif ( in_category('5') || post_is_in_descendant_category(5) ) {
	include(TEMPLATEPATH . '/single-3.php');
} elseif ( in_category('9') || post_is_in_descendant_category(9) ) {
	include(TEMPLATEPATH . '/single-4.php');
} elseif ( in_category('4') || post_is_in_descendant_category(4) ) {
	include(TEMPLATEPATH . '/single-5.php');
} elseif ( in_category('8') || post_is_in_descendant_category(8) ) {
	include(TEMPLATEPATH . '/single-6.php');
} elseif ( in_category('11') || post_is_in_descendant_category(11) ) {
	include(TEMPLATEPATH . '/single-11.php');
}
else{
	include(TEMPLATEPATH . '/single-other.php');
}//给其他分类的文章调用的。
?>