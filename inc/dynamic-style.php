<?php
/**
 * Dynamic style for theme
 *
 * @package Godhuli
 */
function aari_theme_dynamic_style() {

    $aari_style = '';

    /**********************/
    // Scheme Color
    /**********************/

    $aari_focus_color = get_theme_mod( 'display_focus_color_s', false );
    if ( $aari_focus_color ) {
        $aari_style .= "
		button:active,
button:focus,
input[type='button']:active,
input[type='button']:focus,
input[type='reset']:active,
input[type='reset']:focus,
input[type='submit']:active,
input[type='submit']:focus {
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

input[type='text'],
input[type='email'],
input[type='url'],
input[type='password'],
input[type='search'],
input[type='number'],
input[type='tel'],
input[type='range'],
input[type='date'],
input[type='month'],
input[type='week'],
input[type='time'],
input[type='datetime'],
input[type='datetime-local'],
input[type='color'],
textarea {
	color: #666;
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 3px;
}

input[type='text']:focus,
input[type='email']:focus,
input[type='url']:focus,
input[type='password']:focus,
input[type='search']:focus,
input[type='number']:focus,
input[type='tel']:focus,
input[type='range']:focus,
input[type='date']:focus,
input[type='month']:focus,
input[type='week']:focus,
input[type='time']:focus,
input[type='datetime']:focus,
input[type='datetime-local']:focus,
input[type='color']:focus,
textarea:focus {
	color: #111;
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

.screen-reader-text:focus {
	background-color: #fd4145;
	border-radius: 3px;
	box-shadow: 0px 1px 3px 0px rgba(106, 106, 106, 0.6);
	clip: auto !important;
	clip-path: none;
	color: #fff;
	display: block;
	font-size: 14px;
	font-size: 0.875rem;
	font-weight: 400;
	height: auto;
	right: 20px;
	line-height: normal;
	padding: 10px 15px 10px;
	text-decoration: none;
	top: 20px;
	width: auto;
	z-index: 100000;
	border: 1px solid #fd4145;
}


/* Do not show the outline on the skip link target. */

#primary[tabindex='-1']:focus {
	outline: 0;
}

.navbar-brand:focus {
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

.header-overlay .navbar a.navbar-brand:focus>img {
	border: 1px dashed #fd4145;
	box-shadow: 3px 3px 5px #626161;
}

.entry-content a.more-link:focus {
	color: #fff;
	background-color: #fd4145;
}

.post_navigation_area a:focus {
	color: #fd4145;
}

.entry-content a:focus {
	content: '';
	background: rgba(254, 166, 168, 0.16);
	-webkit-transition: height 250ms;
	transition: height 250ms;
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

a:focus {
	color: #fd4145;
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

.header-controller .icon:focus span:nth-child(2),
#topSidebar .icon:focus span:nth-child(2) {
	width: 33px;
}

.search-wrap .search-inner #search-close:focus {
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

#content_full #sidebar .widget_area .search-form .search-submit:focus {
	color: #fff;
	opacity: 1;
	width: 80px;
	background-color: #fd4145 !important;
}

.main_p .comment_sec .comment-respond .comment-form .form-comment input:focus,
.main_p .comment_sec .comment-respond .comment-form .comment-form-comment textarea:focus {
	border: 1px solid #fd4145;
}

.main_p .comment_sec .comment-respond .comment-form .form-submit input:focus {
	-webkit-box-shadow: 2px 2px 2px #6c6c6c;
	background-color: #000;
	border: 1px dashed #fd4145;
	box-shadow: 2px 2px 2px #6c6c6c;
}

video:focus,
audio:focus,
iframe:focus {
	-webkit-box-shadow: 2px 2px 2px #6c6c6c !important;
	border: 1px dashed #fd4145 !important;
	box-shadow: 2px 2px 2px #6c6c6c;
}

#content_full .latest-posts .post .post_banner a:focus img {
	border: 1px dashed #fd4145;
	margin: 0px auto;
	box-shadow: 2px 2px 2px #6c6c6c;
	display: block;
}

#content_full #sidebar .widget_area .search-form label input.search-field:focus {
	border: 1px solid #fd4145;
}

.navbar-brand:focus {
	border: 1px dashed;
}

.header-overlay .navbar a.navbar-brand:focus>img {
	border: 1px dashed;
}

.entry-content a:focus {
	border: 1px dashed;
}

a:focus {
	border: 1px dashed;
}

#content_full .latest-posts .post .post_banner a:focus img {
	border: 1px dashed;
}

#content_full .latest-posts .sticky .post_body {
	border: 1px solid;
}

.main_p .comment_sec .comment-respond .comment-form .form-submit input:focus {
	border: 1px dashed;
}

video:focus,
audio:focus,
iframe:focus {
	border: 1px dashed;
}

button:active,
button:focus,
input[type='button']:active,
input[type='button']:focus,
input[type='reset']:active,
input[type='reset']:focus,
input[type='submit']:active,
input[type='submit']:focus {
	border: 1px dashed;
}

input[type='text']:focus,
input[type='email']:focus,
input[type='url']:focus,
input[type='password']:focus,
input[type='search']:focus,
input[type='number']:focus,
input[type='tel']:focus,
input[type='range']:focus,
input[type='date']:focus,
input[type='month']:focus,
input[type='week']:focus,
input[type='time']:focus,
input[type='datetime']:focus,
input[type='datetime-local']:focus,
input[type='color']:focus,
textarea:focus {
	border: 1px dashed;
}

.screen-reader-text:focus {
	border: 1px solid;
}

#content_full #sidebar .widget_area .search-form label input.search-field:focus {
	border: 1px solid;
}

.main_p .comment_sec .comment-respond .comment-form .form-comment input:focus,
.main_p .comment_sec .comment-respond .comment-form .comment-form-comment textarea:focus {
	border: 1px solid;
}

.js .nav-collapse .dropdown-toggle:hover,
.js .nav-collapse .dropdown-toggle:focus,
.js .nav-collapse .dropdown-toggle:active {
	border: 1px solid;
}

		";
    }

    $aari_theme_color = get_theme_mod( 'aari_theme_color' );

    $aari_style .= "::-moz-selection {
				background: {$aari_theme_color};
			}
			::selection {
				background: {$aari_theme_color};
			}
			.entry-content a {
				color: {$aari_theme_color};
			}
			.entry-content a.more-link {
				color: {$aari_theme_color};
				border: 1px solid {$aari_theme_color};

			}
			.entry-content a.more-link:hover {
				background-color: {$aari_theme_color};
			}
			.entry-content a.more-link:focus {
				background-color: {$aari_theme_color};
			}
			a:hover{
				color: {$aari_theme_color};
			}
			.post_navigation_area a:focus {
				color: {$aari_theme_color};
			}
			.entry-content a:focus {
				border-color: {$aari_theme_color};
			}
			a:focus {
				color: {$aari_theme_color};
				border-color: {$aari_theme_color};
			}
			.site_header_image .post-subtitle-container .post-author a:hover , .site_header_image .post-subtitle-container .post-author a:focus {
				color: {$aari_theme_color};
			}
			#content_full .latest-posts .post .post_banner a:focus img {
				border-color:{$aari_theme_color};
			}
			#content_full .latest-posts .sticky  .post_body {
				border: {$aari_theme_color};
			}
			#content_full .latest-posts .post .post_body .post_meta a:hover, #content_full .latest-posts .post .post_body .post_meta a:focus {
				color: {$aari_theme_color} !important;
			}
			#content_full .latest-posts .post .post_body .post_header h3:hover, #content_full .latest-posts .post .post_body .post_header h3:focus {
				color: {$aari_theme_color};
			}
			#content_full .latest-posts .post .post_body .post_bottom_meta a:hover , #content_full .latest-posts .post .post_body .post_bottom_meta a:focus{
				color: {$aari_theme_color};
			}
			#content_full .latest-posts .subscr .part-f .in-mail input {
				border-bottom: 2px solid {$aari_theme_color};
			}
			#content_full .category-content .header-description .avatar-part img {
				border: 2px solid {$aari_theme_color};
			}
			#content_full .category-content .search-opps .search_result_form .search_form .search-submit {
				background-color: {$aari_theme_color};
			}
			.sidebar a:hover, .sidebar a:focus  {
				color: {$aari_theme_color} !important;
			}
			#content_full #sidebar .widget_area .search-form label input.search-field:focus {
				border-color: {$aari_theme_color};
			}
			#content_full #sidebar .widget_area .search-form .search-submit:focus {
				background-color: {$aari_theme_color} !important;
			}

			#content_full #sidebar .widget_recent_comments ul li:after, #content_full #sidebar .widget_archive ul li:after, #content_full #sidebar .widget_meta ul li:after, #content_full #sidebar .widget_pages ul li:after {
				background-color: {$aari_theme_color};
			}

			#content_full #sidebar .widget_recent_comments ul abbr, #content_full #sidebar .widget_archive ul abbr, #content_full #sidebar .widget_meta ul abbr, #content_full #sidebar .widget_pages ul abbr {
				border-bottom: 1px dotted {$aari_theme_color};
			}

			#content_full #sidebar .calendar_wrap table tr td#today {
				background-color: {$aari_theme_color};
			}
			#content_full .dark-sidebar .recent_posts .post_info h5:hover a, #content_full .dark-sidebar .recent_posts .post_info h5:focus a {
				color: {$aari_theme_color};
			}
			#content_full .dark-sidebar .instagram_feed .instagram_pics li a .instagram-overlay .instagram-meta div span:hover i, #content_full .dark-sidebar .instagram_feed .instagram_pics li a .instagram-overlay .instagram-meta div span:focus i {
				color: {$aari_theme_color};
			}
			#content_full .light-sidebar .recent_posts .post_info h5:hover a, #content_full .light-sidebar .recent_posts .post_info h5:focus a {
				color: {$aari_theme_color};
			}
			#content_full .light-sidebar .instagram_feed .instagram_pics li a .instagram-overlay .instagram-meta div span:hover i, #content_full .light-sidebar .instagram_feed .instagram_pics li a .instagram-overlay .instagram-meta div span:focus i {
				color: {$aari_theme_color};
			}
			#content_full .ogato-pagination .pagination .page-numbers.current {
				background-color: {$aari_theme_color};
			}

			#content_full .ogato-pagination .pagination .page-numbers:hover, #content_full .ogato-pagination .pagination .page-numbers:focus {
				background-color: {$aari_theme_color};
			}
			.site_header_image .post-subtitle-container .post-date a:hover, .site_header_image .post-subtitle-container .post-date a:focus {
				color: {$aari_theme_color};
			}
			.r-s-overlay .r-s-close i:hover, .r-s-overlay .r-s-close i:focus {
				color: {$aari_theme_color};
			}
			.main_p .entry_header_small .tagcloud a:hover, .main_p .entry_header_small .tagcloud a:focus {
				color: {$aari_theme_color};
			}
			.main_p .entry_header_small .post_bottom_meta .post_meta li span:after {
				background: {$aari_theme_color};
			}
			.main_p .entry_header_small .post_bottom_meta .post_meta li span.author {
				color: {$aari_theme_color};
			}
			.main_p .comment_sec .title:after {
				background: {$aari_theme_color};
			}
			.main_p .comment_sec .blog_comments .blog_comment_user .commenter_div .comment_block .comntr_time span {
				color: {$aari_theme_color};
			}
			.main_p .comment_sec .blog_comments .blog_comment_user .commenter_div .comment_block .comntr_time span:before {
				background: {$aari_theme_color};
			}
			.main_p .comment_sec .blog_comments .blog_comment_user .commenter_div .comment_block .reply a:hover, .main_p .comment_sec .blog_comments .blog_comment_user .commenter_div .comment_block .reply a:focus {
				background-color: {$aari_theme_color};
			}
			.main_p .comment_sec .comment-respond .comment-form .form-comment input:focus, .main_p .comment_sec .comment-respond .comment-form .comment-form-comment textarea:focus {
				border-color: {$aari_theme_color};
			}
			.main_p .comment_sec .comment-respond .comment-form .form-submit input {
				background-color: {$aari_theme_color};
			}
			.main_p .comment_sec .comment-respond .comment-form .form-submit input:focus  {
				border-color: {$aari_theme_color};
			}
			video:focus, audio:focus, iframe:focus  {
				border-color: {$aari_theme_color} !important;
			}
			#comments .blog_comments .pingback a {
				color:{$aari_theme_color};
			}
			.main_p .related_posts h4.title span::after {
				background-color: {$aari_theme_color};
			}
			.main_p .related_posts .related_posts_item .post_card_body .post_card_meta .posted_on:before {
				background: {$aari_theme_color};
			}
			.contact .contact-form button {
				background-color: {$aari_theme_color};
			}
			#content_full .not-found .search-form input[type='submit'] {
				background: {$aari_theme_color};
			}
			.widget_tag_cloud .tagcloud a:hover, .widget_tag_cloud .tagcloud a:focus {
				background-color: {$aari_theme_color};
			}
			.nav-toggle:focus {
			    border: 2px solid {$aari_theme_color};
			}
			.nav-collapse a:hover, .nav-collapse a:focus {
			    color: {$aari_theme_color};
			}
			.search_trigger a:hover, .search_trigger a:focus {
			    color: {$aari_theme_color};
			}
			.js .nav-collapse .dropdown-toggle:hover, .js .nav-collapse .dropdown-toggle:focus, .js .nav-collapse .dropdown-toggle:active {
			        background-color: {$aari_theme_color};
			        border-color: {$aari_theme_color};
			}
			.nav-overlay .search_trigger a:hover,.nav-overlay .search_trigger a:focus  {
			        color: {$aari_theme_color};
			}
			.nav-overlay .nav-collapse a:hover, .nav-overlay .nav-collapse a:focus {
			        color: {$aari_theme_color};
			}
			.nav-overlay .nav-collapse ul li.dropdown ul li > a:focus {
			        color: {$aari_theme_color};
			}
			.nav-collapse ul li.dropdown ul li.active > a {
			        color: {$aari_theme_color};
			}
			.nav-collapse ul li.dropdown ul li > a:hover {
			        color: {$aari_theme_color};
			}
			 .nav-collapse ul li.dropdown ul li > a:focus {
			        color: {$aari_theme_color};
			}
			 .dropdown-item.active, .dropdown-item:active {
			        color:{$aari_theme_color} !important;
			}
			a {
				color: {$aari_theme_color};
			}
			.format-quote blockquote {
				border-left: 2px solid {$aari_theme_color};
			}
			button:active, button:focus, input[type='button']:active, input[type='button']:focus, input[type='reset']:active, input[type='reset']:focus, input[type='submit']:active, input[type='submit']:focus {
				border-color: {$aari_theme_color};
			}
			input[type='text']:focus, input[type='email']:focus, input[type='url']:focus, input[type='password']:focus, input[type='search']:focus, input[type='number']:focus, input[type='tel']:focus, input[type='range']:focus, input[type='date']:focus, input[type='month']:focus, input[type='week']:focus, input[type='time']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='color']:focus, textarea:focus {
				border-color:{$aari_theme_color};
			}
			.screen-reader-text:focus {
				background-color:{$aari_theme_color};
				border-color: {$aari_theme_color};
			}
			.navbar-brand:focus {
				border-color: {$aari_theme_color};
			}
			.header-overlay .navbar a.navbar-brand:focus > img {
				border-color: {$aari_theme_color};
			}
			.wp-block-button__link {
                background-color: {$aari_theme_color};
            }
            .wp-block-file .wp-block-file__button {
                background: {$aari_theme_color};
            }
			";

    return $aari_style;

}