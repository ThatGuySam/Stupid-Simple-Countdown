=== Stupid Simple Countdown ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://samcarlton.com/
Tags: countdown, timer, strtotime
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple countdown that uses plain language to countdown to certain dates. Great for churches, events, and live streams websites.

== Description ==

This plugin leverages PHP’s [strtotime()](http://php.net/manual/en/function.strtotime.php#refsect1-function.strtotime-examples) function to read plain language dates(as well as normal dates) and countdown to them.

For example:



This will automatically countdown to the next Sunday at 9am

Here are other examples that work as well

`[countdown to=“Next Sunday 9am”]`
`[countdown to=“31 December 2999”]`
`[countdown to=“+1 day”]`
`[countdown to=“+1 week 2 days 4 hours 2 seconds”]`
`[countdown to=“next Thursday”]`
`[countdown to=“6pm”]`

== Installation ==

1. Upload `stupid-simple-countdown.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place shortcode into a Page or Post(ex: [countdown to=“Next Sunday 9am”])
1. For Developers: Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= How do I use this? =

Make sure plugin is active then on any Post or Page type: `[countdown to=“Next Sunday 9am”]`

This will automatically countdown to the next Sunday at 9am

= It’s always off by an hour/several hours =

Make sure your site knows what time zone your are in otherwise it will be set to a default timezone and won’t countdown to the correct time
[How to set the Wordpress time zone](https://en.support.wordpress.com/settings/time-settings/)
[What time zone am I currently in?](http://whatismytimezone.com/)

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 0.1 =
* Initial launch
