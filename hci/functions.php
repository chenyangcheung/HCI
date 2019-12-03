<?php
	add_theme_support( 'post-thumbnails' ); //激活文章和页面的缩略图功能。

	//获取并输入某个分类的子分类
	function post_is_in_descendant_category( $cats, $_post = null )
	{
	  foreach ( (array) $cats as $cat ) {
	    // get_term_children() accepts integer ID only
	    $descendants = get_term_children( (int) $cat, 'category');
	    if ( $descendants && in_category( $descendants, $_post ) )
	      return true;
	  }
	  return false;
	}

	function wt_get_category_count($input = '') { 
		global $wpdb; 
		if($input == '') { 
			$category = get_the_category(); 
			return $category[0]->category_count; 
		} 
		elseif(is_numeric($input)) { 
			$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input"; 
			return $wpdb->get_var($SQL); 
		} 
		else { 
			$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'"; 
			return $wpdb->get_var($SQL); 
		} 
	}

	function par_pagenavi($range = 9){
		global $paged, $wp_query;
		if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
		if($max_page > 1){
			if(!$paged){$paged = 1;}
			if($paged != 1) {
				echo '<li class="hci-pagination-item prev" id="prev">';
				previous_posts_link(' 上一页 ');
				echo '</li>';
			}

		    if($max_page > $range){
				if($paged < $range){
					for($i = 1; $i <= ($range + 1); $i++){
						echo '<li class="hci-pagination-item page ';
						if($i==$paged)echo " active";
						echo '"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				} elseif($paged >= ($max_page - ceil(($range/2)))) {
					for($i = $max_page - $range; $i <= $max_page; $i++){
						echo '<li class="hci-pagination-item page ';
						if($i==$paged)echo " active";
						echo '"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				} elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
					for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
						echo '<li class="hci-pagination-item page ';
						if($i==$paged)echo " active";
						echo '"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				}
			} else { 
				for($i = 1; $i <= $max_page; $i++){
					echo '<li class="hci-pagination-item page ';
					if($i==$paged)echo " active";
					echo '"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		    	}
			}
			if($paged != $max_page) {
				echo '<li class="hci-pagination-item next" id="next">';
				next_posts_link(' 下一页 ');
				echo '</li>';
			}
	    }
	}

	function get_schedule() {
		echo '            <div class="hci-nav-date">
                <a id="hciDateBtn">重要日期</a>
                <div class="hci-date-list" id="hciDateList">
                    <div class="hic-date-inner">
                        <ul>';
                            $schedule_list = array();
                            query_posts("showposts=100000&cat=10");
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    $id = null;
                                    $year = null;
                                    $month = null;
                                    $day = null;
                                    $week =null;
                                    $end_year = null;
                                    $end_month = null;
                                    $end_day = null;
                                    $start_time = null;
                                    $end_time = null;
                                    $place = null;
                                    $title = null;
                                    $content = null;
                                    $basetime = null;
                                    $time_str = null;
                                    $schedule_time = null;
                                    $interval = null;
                                    $interval_day = -1;                                   



                                    $id = get_the_ID();
                                    $year = get_post_meta(get_the_ID(), 'year', true);
                                    $month = get_post_meta(get_the_ID(), 'month', true);
                                    $day = get_post_meta(get_the_ID(), 'day', true);
                                    $week = get_post_meta(get_the_ID(), 'week', true);
                                    $end_year = get_post_meta(get_the_ID(), 'end_year', true);
                                    $end_month = get_post_meta(get_the_ID(), 'end_month', true);
                                    $end_day = get_post_meta(get_the_ID(), 'end_day', true);
                                    $start_time = get_post_meta(get_the_ID(), 'start_time', true);
                                    $end_time = get_post_meta(get_the_ID(), 'end_time', true);
                                    $place = get_post_meta(get_the_ID(), 'place', true);
                                    $title = get_the_title();
                                    $content = get_the_content();
                                    $basetime = new DateTime();
                                    $time_str = $year."-".$month."-".$day;
                                    $schedule_time = new DateTime($time_str);
                                    $interval = date_diff($basetime, $schedule_time);
                                    $interval_day = $interval->format('%r%a');
                                    if($interval_day == 0) {
                                        if($interval->format('%r')) {
                                            $interval_day = 0;
                                        } else {
                                            $interval_day = 1;
                                        }
                                    }

                                    $schedule = array(
                                        'id' => $id,
                                        'year' => $year,
                                        'month' => $month,
                                        'day' => $day,
                                        'week' => $week,
                                        'end_year' => $end_year,
                                        'end_month' => $end_month,
                                        'endday' => $end_day,
                                        'start_time' => $start_time,
                                        'end_time' => $end_time,
                                        'place' => $place,
                                        'title' => $title,
                                        'content' => $content,
                                        'time_str' => $time_str,
                                        'interval_day' => $interval_day
                                    );
                                    array_push($schedule_list, $schedule);
                                endwhile;

                                $sort = array(
                                    'direction' => 'SORT_ASC',
                                    'field' => 'interval_day',
                                );

                                $arrSort = array();
                                foreach ($schedule_list as $uniqid => $row) {
                                    # code...
                                    foreach ($row as $key => $value) {
                                        # code...
                                        $arrSort[$key][$uniqid] = $value;
                                    }
                                }

                                if($sort['direction']) {
                                    array_multisort($arrSort[$sort['field']], constant($sort['direction']), $schedule_list);
                                }


                                $count = 0;

                                for ($x=0; $x<=count($schedule_list); $x++) {
                                    if(($count<100000)&&$schedule_list[$x]['interval_day']&&($schedule_list[$x]['interval_day']>=0)) {
                                            echo '<li class="hci-date-item">
                                        <div class="hci-date-calendar">
                                            <div class="day">';
                                            echo $schedule_list[$x]['day'];
                                            echo '</div>
                                            <div class="month">';
                                            echo $schedule_list[$x]['month'];
                                            echo '月</div>
                                        </div>
                                        <div class="hci-date-detail">
                                            <h1 class="hci-date-title">
                                                <span class="schedule">';
                                            echo $schedule_list[$x]['title'];
                                            echo '</span>
                                                <span class="duration">';
                                            if($schedule_list[$x]['interval_day'] == 0){
                                                if($schedule_list[$x]['start_time']&&$schedule_list[$x]['end_time']) {
                                                    echo $schedule_list[$x]['start_time'];
                                                    echo '-';
                                                    echo $schedule_list[$x]['end_time'];  
                                                }else {
                                                    echo '0 天';
                                                }
                                                                                             
                                            }else{
                                                echo $schedule_list[$x]['interval_day'];
                                                echo '天';
                                            }
                                            echo '</span>
                                            </h1>
                                            <div class="hci-date-info">
                                                <p>';
                                            echo $schedule_list[$x]['year'];
                                            echo '年';
                                            echo $schedule_list[$x]['month'];
                                            echo '月';
                                            echo $schedule_list[$x]['day'];
                                            echo '日';
                                            echo '&nbsp&nbsp';
                                            echo $schedule_list[$x]['week'];
                                            echo '</p><p>';
                                            echo $schedule_list[$x]['place'];
                                            echo '</p>
                                            </div>
                                        </div>
                                    </li>';
                                            $count = $count +1;
                                    }
                                }

                            endif;
                            wp_reset_query();
                        echo '</ul>
                    </div>
                </div>
            </div>';
	}

	function get_headlink() {
		echo '            <div class="hci-nav-logo">
                <a href="';

                echo home_url();
                echo '"><img src="img/HCI%20Logo.png"></a>
            </div>
            <ul class="hci-nav-list">
                <li class="hci-nav-item">
                    <a href="/?cat=2">中心介绍</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=9">研究进展</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=4">学术活动</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=11">新闻动态</a>
                </li>
            </ul>';
	}

	function get_searchform() {
		echo '            <div class="hci-nav-search" id="hciSearch">
                <script type="text/javascript">
                    function search() {
                        var search_value = document.getElementById("search").value;
                    }
                </script>
                <form action="';
                echo home_url("/");
                echo '" method="get">
                    <input type="text" name="s" id="search" placeholder="请输入搜索内容" value="';
                    the_search_query(); 
                    echo '">
                    <button type="submit" title="搜索" id="hciSearchBtn"><i class="icon-search"></i></button>
                </form>
            </div>';
	}


function custom_wp_link_pages( $args = '' ) {
    $defaults = array(
        'before' => '<p id="post-pagination">' . __( 'Pages:' ), 
        'after' => '</p>',
        'text_before' => '',
        'text_after' => '',
        'next_or_number' => 'number', 
        'nextpagelink' => __( 'Next page' ),
        'previouspagelink' => __( 'Previous page' ),
        'pagelink' => '%',
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                $output .= ' ';
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '<li class="hci-pagination-item page">'._wp_link_page( $i );
                else
                    $output .= '<li class="hci-pagination-item page active">
                            <a href="#">';

                $output .= $text_before . $j . $text_after;
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '</a>
                        </li>';
                else
                    $output .= '</a>
                        </li>';
            }
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= ''._wp_link_page( $i );
                    $output .= $text_before . $previouspagelink . $text_after . '</a>
                        </li>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= ''._wp_link_page( $i );
                    $output .= $text_before . $nextpagelink . $text_after . '</a>
                        </li>';
                }
                $output .= $after;
            }
        }
    }

    if ( $echo )
        echo $output;

    return $output;
}

?>