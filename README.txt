=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://mint.rs
Tags: api, wordpress
Requires at least: 4.1
Tested up to: 5.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple example plugin made for WordPress Meetup.

== Installation ==

Download or clone the plugin and put it in ``plugins`` folder.
Go to ``includes`` and run the ``composer dump-autoload`` to generate autoloader file. 
Please make sure that your Permalink Settings are properly set or WordPress API is not going to work.

== Usage ==

You can access API using ``/wp-json/wpapi/v1`` path. 

== Changelog ==

= 1.0 =
* Initial version

== More Information ==

Here's a link to [WordPress API documentation](https://developer.wordpress.org/rest-api/)
