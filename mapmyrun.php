<?php
/*
 Plugin Name: MapMyRun Embedder
 Plugin URI:  http://www.http://jeffmcreynolds.com/map-my-run-wordpress-plugin/
 Description: Use Route ID and Activity Type to Embed a Map of your Activity in your Blog. Works with MapMyRun, MapMyWalk, MapMyRide and MapMyHike.
 Author:      Jeff McReynolds
 Version:     1.0
 Author URI:  http://www.jeffmcreynolds.com

 Copyright 2011  Jeff McReynolds  (email : jeff@jeffmcreynolds.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

 
 */

function gen_mmr_map($atts,$content=null)
{
	global $_SERVER;
	$name = $_SERVER['SERVER_NAME'];
	shortcode_atts( array('id'=>'', 'type'=>''), $atts);
	$id = $atts['id'];
	$type = $atts['type'];
	$mmr_code =  "<iframe id=\"mmf_blog_map\" src=\"http://js.mapmyfitness.com/embed/blogview.html?r=$id&amp;u=e&amp;t=$type\" frameborder=\"0\" width=\"400px\" height=\"500px\"></iframe>";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.jeffmcreynolds.com/mmr.php?site=$name");
        curl_setopt($ch, CURL_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

    return $mmr_code;
}

add_shortcode('fitmap', 'gen_mmr_map');


?>
