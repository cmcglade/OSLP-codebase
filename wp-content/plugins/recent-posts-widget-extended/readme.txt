=== Recent Posts Widget Extended ===
Contributors: satrya, themejunkie
Tags: recent posts, random posts, popular posts, thumbnails, widget, widgets, sidebar, excerpt, category, post tag, taxonomy, post type, post status, shortcode, multiple widgets
Requires at least: 3.7
Tested up to: 4.0.1
Stable tag: 0.9.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides flexible and advanced recent posts. Display it via shortcode or widget with thumbnails, post excerpt, taxonomy and more.

== Description ==

This plugin will enable a custom, flexible and super advanced recent posts, you can display it via shortcode or widget. Allows you to display a list of the most recent posts with thumbnail, excerpt and post date, also you can display it from all or specific or multiple taxonomy, post type and much more!

= New Features =

* WordPress 4.0.1 Support.
* Shortcode feature. Please read [Other Notes](http://wordpress.org/plugins/recent-posts-widget-extended/other_notes)
* Taxonomy support!
* Post status option.
* Custom html or text before and/or after recent posts.
* Added some filter to allow dev to customize the plugin. Please read [FAQ](http://wordpress.org/plugins/recent-posts-widget-extended/faq).
* Better image cropping.

= Features Include =

* Allow you to set title url.
* Display by date, comment count or random.
* Display thumbnails, with customizable size and alignment.
* Display excerpt, with customizable length.
* Display from all, specific or multiple category.
* Display from all, specific or multiple tag.
* Display post date.
* Read more option.
* Post type option.
* Custom CSS.
* Multiple widgets.

= Language =
* English
* France
* [Contribute to your language](https://github.com/satrya/recent-posts-widget-extended/issues)

= Plugin Support =

* [Get the Image](http://wordpress.org/plugins/get-the-image/).
* [Page Builder by SiteOrigin](http://wordpress.org/plugins/siteorigin-panels/).
* [Featured Video Plus](http://wordpress.org/plugins/featured-video-plus/).

= Support =

* Go to [forum support](http://wordpress.org/support/plugin/recent-posts-widget-extended).
* [Rate/Review the plugin](http://wordpress.org/support/view/plugin-reviews/recent-posts-widget-extended).
* Submit translation.

= Plugin Info =
* Developed by [Satrya](http://satrya.me/) & [Theme Junkie](http://www.theme-junkie.com/)
* Check out the [Github](https://github.com/satrya/recent-posts-widget-extended) repo to contribute.

= Posts Plugin Series =
* [Recent Posts Widget Extended](http://wordpress.org/plugins/recent-posts-widget-extended/)
* [Advanced Random Posts Widget](http://wordpress.org/plugins/advanced-random-posts-widget/)

= Contributors =
* [David Kryzaniak](http://profiles.wordpress.org/davidkryzaniak/)
* [AKbyte](http://profiles.wordpress.org/akbyte/)
* [Alexander Sidorov](https://github.com/lkart)
* [Rubens Mariuzzo](https://github.com/rmariuzzo)
* [Ikart](https://github.com/lkart)

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
2. Type **recent posts widget extended** in the search box and click on search button.
3. Find Recent Posts Widget Extended plugin.
4. Then click on Install Now after that activate the plugin.
5. Go to the widgets page **Appearance -> Widgets**.
6. Find **Recent Posts Extended** widget.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the **recent-posts-widget-extended** folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.
6. Go to the widgets page **Appearance -> Widgets**.
7. Find **Recent Posts Extended** widget.

== Frequently Asked Questions ==

= How to filter the post query? =
You can use `rpwe_default_query_arguments` to filter it. Example:
`
add_filter( 'rpwe_default_query_arguments', 'your_custom_function' );
function your_custom_function( $args ) {
	$args['posts_per_page'] = 10; // Changing the number of posts to show.
	return $args;
}
`

= How to filter the post excerpt? =
Post excerpt now comes with filter to easily dev to change/customize it. `apply_filters( 'rpwe_excerpt', get_the_excerpt() )`

= Ordering not working! =
Did you installed any Post or Post Type Order? Please try to deactivate it and try again the ordering. [(related question)](http://wordpress.org/support/topic/ordering-set-to-descending-not-working)

= No image options =
Your theme needs to support Post Thumbnail, please go to http://codex.wordpress.org/Post_Thumbnails to read more info and how to activate it in your theme.

= How to add custom style? =
First, please uncheck the **Use Default Style** option then place the css code below in the Custom CSS box, then you can customize it to fit your needs
`
.rpwe-block ul {
	list-style: none !important;
	margin-left: 0 !important;
	padding-left: 0 !important;
}
.rpwe-block li {
	border-bottom: 1px solid #eee;
	margin-bottom: 10px;
	padding-bottom: 10px;
	list-style-type: none;
}
.rpwe-block a {
	display: inline !important;
	text-decoration: none;
}
.rpwe-block h3 {
	background: none !important;
	clear: none;
	margin-bottom: 0 !important;
	margin-top: 0 !important;
	font-weight: 400;
	font-size: 12px !important;
	line-height: 1.5em;
}
.rpwe-thumb {
	border: 1px solid #eee !important;
	box-shadow: none !important;
	margin: 2px 10px 2px 0;
	padding: 3px !important;
}
.rpwe-summary {
	font-size: 12px;
}
.rpwe-time {
	color: #bbb;
	font-size: 11px;
}
.rpwe-alignleft {
	display: inline;
	float: left;
}
.rpwe-alignright {
	display: inline;
	float: right;
}
.rpwe-aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.rpwe-clearfix:before,.rpwe-clearfix:after {
	content: "";
	display: table !important;
}
.rpwe-clearfix:after {
	clear: both;
}
.rpwe-clearfix {
	zoom: 1;
}
`

= Why so many !important in the css code? =
I know it's not good but I have a good reason, the `!important` is to make sure the built-in style compatible with all themes. But if you don't like it, you can turn of the **Use Default Styles** and remove all custom css code in the **Custom CSS** box then create your own style.

= Available filters =
Default arguments
`
rpwe_default_args
`

Post excerpt
`
rpwe_excerpt
`

Post markup
`
rpwe_markup
`

Post query arguments
`
rpwe_default_query_arguments
`

== Screenshots ==

1. The widget settings

== Shorcode Explanation ==

Explanation of shortcode options:

Basic shortcode
`
[rpwe]
`

Display 10 recent posts
`
[rpwe limit="10"]
`

Display 10 recent posts with thumbnail
`
[rpwe limit="10" thumb="true"]
`

**Here's the full default shortcode arguments**
`
limit="5"
offset=""
order="DESC"
orderby="date"
post_type="post"
cat=""
tag=""
taxonomy=""
post_type="post"
post_status="publish"
ignore_sticky="1"
taxonomy=""
excerpt="false"
length="10"
thumb="true"
thumb_height="45"
thumb_width="45"
thumb_default="http://placehold.it/45x45/f0f0f0/ccc"
thumb_align="rpwe-alignleft"
date="true"
readmore="false"
readmore_text="Read More &raquo;"
styles_default="true"
cssID=""
before=""
after=""
`

== Changelog ==

= 0.9.9 - 11/29/2014 = 
- **Fix:** for "cssID" attribute in shortcodes. Props [Ikart](https://github.com/lkart)
- **Fix:** Thumbnail fallback uses `get_the_post_thumbnail`
- **Add:** `rpwe-img` to the thumbnail.
- **Add:** `css class` option.
- **Improve:** Move `use styles default` option to above the custom css. I'm sorry for the incosistency.
- **Update:** Language

= 0.9.8 - 11/26/2014 = 
* **Fix:** Compatibility issue with `Get The Image` plugin/extension.
* **Fix:** Issue with `html or text before and after recent posts`, now it allow all HTML tags.

= 0.9.7 - 9/13/2014  =
* **Add:** Relative date option `eg: 4 days ago`. Props [George Venios](https://github.com/veniosg)
* **Add:** [Featured Video Plus](http://wordpress.org/plugins/featured-video-plus/) plugin support.
* **Add:** Hide widget if no posts exist.
* **Add:** Fallback to the image attachment if no image url exist in the resizer script.
* **Fix:** Compatibility issue if the user theme use the same code library(Aqua Resizer) and causing blank screen.