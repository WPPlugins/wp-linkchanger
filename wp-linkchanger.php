<?php
/*
Plugin Name: WP-LinkChanger
Plugin URI: http://blogger.hvbx.de/wp-linkchanger
Description: This plugin will change all of your affiliate links into good-looking internal links.
Version: 0.121
Author: Heiko Vogelgesang
Author URI: http://blogger.hvbx.de
Update Server: http://blogger.hvbx.de/wp-content/dl-wpplugin/
Min WP Version: 2.5
Max WP Version: 2.6
*/

/*  Copyright 2008  H.Vogelgesang  (email : blogger@hvbx.de)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*** Ab hier nichts mehr ändern! -- do not change the code below ***/ 

function linktauscher($content) {

	// no used yet ... functionality will follow in the next version
	$exitfilename = "exit.php"; // name of your exit file.
	
	/* get plugin url */
	$blogurl = get_option('siteurl') .'/'. PLUGINDIR .'/'. plugin_basename( dirname(__FILE__) ) .'/'.$exitfilename.'';
	
	/* zanox links ersetzen */ /* class="afflink" noch hinzufügen */
	$content = preg_replace('/"http:\/\/ad.zanox.com\/ppc\/\?([CSIDET0-9&;=]*)"/ie',"'\"$blogurl?mm=zx&amp;id='.urlencode('\\1').'\" rel=\"nofollow\"'",$content);
	$content = preg_replace('/"http:\/\/www.zanox.affiliate.de\/ppc\/\?([CSIDET0-9&;=]*)"/ie',"'\"$blogurl?mm=zx&amp;id='.urlencode('\\1').'\" rel=\"nofollow\"'",$content);

	/* affilinet links ersetzen */ /* class="afflink" noch hinzufügen */
	$content = preg_replace('/"http:\/\/partners.webmasterplan.com\/click.asp\?ref=([a-z0-9&;=]*)"/ie',"'\"$blogurl?mm=an&amp;id='.urlencode('\\1').'\" rel=\"nofollow\"'",$content);

	/* tradedoubler links ersetzen */ /* class="afflink" noch hinzufügen */
	$content = preg_replace('/"http:\/\/clkde.tradedoubler.com\/click\?p=([a-z0-9&;=]*)"/ie',"'\"$blogurl?mm=td&amp;id='.urlencode('\\1').'\" rel=\"nofollow\"'",$content);

	/* amazon links ersetzen */ /* class="afflink" noch hinzufügen */
	//$content = preg_replace('/"http:\/\/www.amazon.de\/([a-z0-9&;=]*)"/ie',"'\"$blogurl?mm=am&amp;id='.urlencode('\\1').'\" rel=\"nofollow\"'",$content);

	return $content;
}

add_filter('the_content','linktauscher');
?>