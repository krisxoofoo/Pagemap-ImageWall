<?php
/*
	Pagemap ImageWall Web Gallery
	Copyright by Pagemap Premium Portfolios. All Rights reserved.
	Version modified by kris - https://xoofoo.org
*/
/* add little cache - credits: Rafael Paulino - http://www.phpclasses.org/package/5595-PHP-Cache-the-output-of-pages-into-files.html */
class cache {
	public $cache_file_name;
	public $age;
	public function __construct(){
		$this->cache_start();
		register_shutdown_function(array($this, "cache_end"), "inside");
	}
	public function __descruct(){
		$this->cache_end();
	}
	public function cache_start(){
		global $cache_file_name, $age;
		$cache_file_name = 	$_SERVER["DOCUMENT_ROOT"].$_SERVER['REQUEST_URI'] . '_cache';
		if (empty($age)){
			$age = 600;
		}
		if(file_exists($cache_file_name)){
			if (filemtime($cache_file_name) + $age > time()) {
				readfile($cache_file_name);
				unset($cache_file_name);
				exit;
			}
		}
		ob_start();
	}
	public function cache_end()
	{
		global $cache_file_name;
		if (empty($cache_file_name)){
			return;
		}
		$str = ob_get_clean();
		echo $str;
		fwrite(fopen($cache_file_name . '_tmp', "w"), $str);
		rename($cache_file_name . '_tmp',$cache_file_name);
	}
}
$cache = new cache();
// SCRIPT
error_reporting(0);
umask(0000);
if(p_getMemoryLimit() < 5242880)
	ini_set('memory_limit', 33554432);
// SETTINGS
global $set; if(empty($set)) $set = array();
$set['script version'] = '1.2'; // Initial Build 2010-08-24 - Modified by XooFoo 2013-05-06
$set['script name'] = empty($set['script name']) ? $_SERVER['SCRIPT_NAME'] : $set['script name'];
$set['script dir'] = empty($set['script dir']) ? './' : $set['script dir'];
$set['cache dir'] = 'cache/';
$set['config file'] = $set['script dir'] . 'config.ini';
$set['fallback image size'] = 800;
$set['color names'] = array('aliceblue' => '#f0f8ff', 'antiquewhite' => '#faebd7', 'aqua' => '#00ffff', 'aquamarine' => '#7fffd4', 'azure' => '#f0ffff', 'beige' => '#f5f5dc', 'bisque' => '#ffe4c4', 'black' => '#000000', 'blanchedalmond' => '#ffebcd', 'blue' => '#0000ff', 'blueviolet' => '#8a2be2', 'brown' => '#a52a2a', 'burlywood' =>  '#deb887', 'cadetblue' => '#5f9ea0', 'chartreuse' => '#7fff00', 'chocolate' => '#d2691e', 'coral' => '#ff7f50', 'cornflowerblue' => '#6495ed', 'cornsilk' => '#fff8dc', 'crimson' => '#dc143c', 'cyan' => '#00ffff', 'darkblue' => '#00008b', 'darkcyan' => '#008b8b', 'darkgoldenrod' => '#b8860b', 'darkgray' => '#a9a9a9', 'darkgreen' => '#006400', 'darkkhaki' => '#bdb76b', 'darkmagenta' => '#8b008b', 'darkolivegreen' => '#556b2f', 'darkorange' => '#ff8c00', 'darkorchid' => '#9932cc', 'darkred' => '#8b0000', 'darksalmon' => '#e9967a', 'darkseagreen' => '#8fbc8f', 'darkslateblue' => '#483d8b', 'darkslategray' => '#2f4f4f', 'darkturquoise' => '#00ced1', 'darkviolet' => '#9400d3', 'deeppink' => '#ff1493', 'deepskyblue' => '#00bfff', 'dimgray' => '#696969', 'dodgerblue' => '#1e90ff', 'firebrick' => '#b22222', 'floralwhite' => '#fffaf0', 'forestgreen' => '#228b22', 'fuchsia' => '#ff00ff', 'gainsboro' => '#dcdcdc', 'ghostwhite' => '#f8f8ff', 'gold' => '#ffd700', 'goldenrod' => '#daa520', 'gray' => '#808080', 'green' => '#008000', 'greenyellow' => '#adff2f', 'honeydew' => '#f0fff0', 'hotpink' => '#ff69b4', 'indianred ' => '#cd5c5c', 'indigo ' => '#4b0082', 'ivory' => '#fffff0', 'khaki' => '#f0e68c', 'lavender' => '#e6e6fa', 'lavenderblush' => '#fff0f5', 'lawngreen' => '#7cfc00', 'lemonchiffon' => '#fffacd', 'lightblue' => '#add8e6', 'lightcoral' => '#f08080', 'lightcyan' => '#e0ffff', 'lightgoldenrodyellow' => '#fafad2', 'lightgrey' => '#d3d3d3', 'lightgreen' => '#90ee90', 'lightpink' => '#ffb6c1', 'lightsalmon' => '#ffa07a', 'lightseagreen' => '#20b2aa', 'lightskyblue' => '#87cefa', 'lightslategray' => '#778899', 'lightsteelblue' => '#b0c4de', 'lightyellow' => '#ffffe0', 'lime' => '#00ff00', 'limegreen' => '#32cd32', 'linen' => '#faf0e6', 'magenta' => '#ff00ff', 'maroon' => '#800000', 'mediumaquamarine' => '#66cdaa', 'mediumblue' => '#0000cd', 'mediumorchid' => '#ba55d3', 'mediumpurple' => '#9370d8', 'mediumseagreen' => '#3cb371', 'mediumslateblue' => '#7b68ee', 'mediumspringgreen' => '#00fa9a', 'mediumturquoise' => '#48d1cc', 'mediumvioletred' => '#c71585', 'midnightblue' => '#191970', 'mintcream' => '#f5fffa', 'mistyrose' => '#ffe4e1', 'moccasin' => '#ffe4b5', 'navajowhite' => '#ffdead', 'navy' => '#000080', 'oldlace' => '#fdf5e6', 'olive' => '#808000', 'olivedrab' => '#6b8e23', 'orange' => '#ffa500', 'orangered' => '#ff4500', 'orchid' => '#da70d6', 'palegoldenrod' => '#eee8aa', 'palegreen' => '#98fb98', 'paleturquoise' => '#afeeee', 'palevioletred' => '#d87093', 'papayawhip' => '#ffefd5', 'peachpuff' => '#ffdab9', 'peru' => '#cd853f', 'pink' => '#ffc0cb', 'plum' => '#dda0dd', 'powderblue' => '#b0e0e6', 'purple' => '#800080', 'red' => '#ff0000', 'rosybrown' => '#bc8f8f', 'royalblue' => '#4169e1', 'saddlebrown' => '#8b4513', 'salmon' => '#fa8072', 'sandybrown' => '#f4a460', 'seagreen' =>  '#2e8b57', 'seashell' => '#fff5ee', 'sienna' => '#a0522d', 'silver' => '#c0c0c0', 'skyblue' => '#87ceeb', 'slateblue' => '#6a5acd', 'slategray' => '#708090', 'snow' => '#fffafa', 'springgreen' => '#00ff7f', 'steelblue' => '#4682b4', 'tan' => '#d2b48c', 'teal' => '#008080', 'thistle' => '#d8bfd8', 'tomato' => '#ff6347', 'turquoise' => '#40e0d0', 'violet' => '#ee82ee', 'wheat' => '#f5deb3', 'white' => '#ffffff', 'whitesmoke' => '#f5f5f5', 'yellow' => '#ffff00', 'yellowgreen' => '#9acd32');
$set['image next'] = 'R0lGODlhOQAcAMQYAO7u7ufn5/j4+Ovr6/Hx8fX19dPT093d3c/PzzMzM+Tk5Pz8/KqqqoiIiNra2kRERGZmZhEREeDg4NbW1u/v7wAAAMzMzP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABgALAAAAAA5ABwAAAWzIHaNZGmeaKqubOu+cCzPdG3feK7vfO//PwAwB0hYhi0CIgWoVBrIVeCIajofwprA4rBYAqOpBTEQGMAKA8VrkZyszghD275MFwND4TKwCAAWBxZ7U0xOhxUQNFsDFwR+gmwWBBcKX2FUb4iHCTOMjpAOJxOBmIabip4WjY8CfY0BYAF6CLJ+VYhydKy3lhYGBAWDF4AFC6SZJHBYUTJWUM3ORtE0WdTX2Nna29zdQyLeKyEAOw==';
$set['image prev'] = 'R0lGODlhOQAcAMQXAO7u7uDg4Nra2s/Pz9PT0/z8/NbW1vj4+PX19efn5/Hx8d3d3evr6zMzM+Tk5GZmZhEREaqqqoiIiERERMzMzAAAAP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABcALAAAAAA5ABwAAAXBoCWOZGmeaKpa1+q+cCzPdG3feK7vfO//wBIgqKM0hkSbpFJBJmWACbP5lEUgU2opQKBQDAiLYGGgHBRdiqNAUYgGidojy3SOuIWCgSAeIBAHFAwWCAMMAQEWCgMFNA10dSYBAiIAZmMiCV6bCYUFDg42c3R2IpOVFAUCiRaaJgIAAwc3V1mlFlwWegZirIGJCguVBMI4UVO3AQNeBrOrIwzLFHEiBG46S1okp1UqRsmU3Sq34uXm5+jp6uvs7TMXIQA7';
$set['image overlay'] = 'R0lGODlhIAAgAJEAAAAAADMzMyEhIQAAACH5BAQUAP8ALAAAAAAgACAAAAJvTACGmtfrGBMCUVvB1Xn7DIXPKEUmhnLptwql+JKnSrN1hyPwHPeODczdfLviKNhK0oxEmQh5U1Ka1Bn0KmTytk8htlXVdqXess6JDkfXWLX6y86muXOyfUh3/8xxpbiOBteWRzjWd7jxp3cnKFAAADs=';
// GET CONFIG
$config = array();
$config['Author'] = '';
$config['Gallery Title'] = 'My gallery';
$config['Gallery Description'] = 'Pagemap ImageWall by Pagemap Premium Portfolios';
$config['Meta Keywords'] = 'gallery, photos, holidays';
$config['Thumbnail Cropped'] = 'on';
$config['Thumbnail Quality'] = 80;
$config['Thumbnail Size'] = 'normal';
$config['Thumbnail Background'] = 'black';
$config['Image Size'] = '';
$config['Sort'] = 'normal';
$config['Embedded Script'] = 'off';
$config['jQuery Path'] = 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js';
$config['Other JS'] = '';
$config['ImageWall Width'] = 'auto';
$config['Header Image'] = '';
$config['Background'] = 'white';
$config['Header Color'] = 'silver';
$config['Content Color'] = 'black';
$config['Footer Color'] = 'silver';
$config['Custom CSS'] = '';
$config['Custom FileCSS'] = '';
$config['Custom HTML'] = '';
$config['Home Page'] = 'localhost';
$config['Contact'] = '';
$config['Imprint'] = '';
$config['Images Dir'] = '';
$config['Images List'] = '';
$config['Exclude Images'] = '';
$config['Disqus Shortname'] = '';
$config['GoogleAnalytics Account'] = '';
$config['Per Page'] = '24';
// SET CONFIG
if(is_file($set['config file']) && is_readable($set['config file'])) {
	// Get config from Config File
	$set['config file contents'] =  file_get_contents($set['config file']);
	preg_match_all("/\[(.*):(.*)\]/U", $set['config file contents'], $set['config file variables']);
	foreach($set['config file variables'][1] as $position => $variable) if(!empty($variable))
		$config[trim($variable)] = isset($set['config file variables'][2][$position]) ? trim($set['config file variables'][2][$position]) : '';
} elseif(is_writeable($set['script dir'])) {
	// Create Config File if not exists
	$set['open config file'] = fopen($set['config file'], 'w');
	foreach($config as $variable => $value) fwrite($set['open config file'], '[' . $variable . ': ' . $value . ']' . "\r\n");
}
// FUNCTIONS
function p_encodeEmail($string) {
	$emails = array();
	preg_match_all('/\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,6}/i', $string, $emails);
	foreach((array) $emails[0] as $email) {
		$encoded_string = '';
		$arrCharacters = str_split($email);
		foreach ($arrCharacters as $strCharacter)
			$encoded_string .= sprintf('&#%s;', ord($strCharacter));
		$string = str_replace($email, $encoded_string, $string);
	}
	return str_replace('mailto:', '&#109;&#97;&#105;&#108;&#116;&#111;&#58;', $string);
}
function p_addHTTP($url) { return !empty($url) && substr($url, 0, 7) != 'http://' ? 'http://' . $url : $url;}
function p_getThumbnailSize($size) {
	switch($size) {
		case 'small' : $size = 90; break;
		case 'normal' : default : $size = 150; break;
		case 'large' : $size = 225; break;
	}
	return $size;
}
function p_html2rgb($color) {
	if($color[0] == '#') $color = substr($color, 1);
	if(strlen($color) == 6) list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
		elseif(strlen($color) == 3) list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
	else return false;
	$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
	return array($r, $g, $b);
}
function p_message($message) { if(!defined('p_error')) define('p_error', $message);}
function p_emptyCache($silent = false) {
	global $set;
	if(is_dir($set['cache dir'])) {
		if(is_readable($set['cache dir'])) {
			$cache_open = opendir($set['cache dir']);	
			while($item = readdir($cache_open)) if(is_file($set['cache dir'] . $item)) if(is_writeable($set['cache dir'] . $item))
				unlink($set['cache dir'] . $item);
			elseif($silent == true) p_message('One or more files could not be deleted. It seems that these files are write protected. Please try to change file permissions via FTP.');
		} elseif($silent == true)
			p_message('The cache directory is not readable. Please try to change directory permissions via FTP.');
		if(is_writeable($set['cache dir'])) rmdir($set['cache dir']);
			elseif($silent == true) p_message('The cache directory is write protected. Please try to change directory permissions via FTP.');
	}
}
function p_getMemoryLimit() {
	$memory_limit = ini_get('memory_limit');
	if(is_numeric($memory_limit)) {
		return $value;
	} else {
		$memory_limit_length = strlen($memory_limit);
		$qty = substr($memory_limit, 0, $memory_limit_length - 1);
		$unit = strtolower(substr($memory_limit, $memory_limit_length - 1));	
		switch($unit) {
			case 'k': $qty *= 1024; break;
			case 'm': $qty *= 1048576; break;
			case 'g': $qty *= 1073741824; break;
		}
		return $qty;
	}
}
/* add page navigation - credits: V Song - https://code.google.com/p/pagemap-imagewall-enhance/ */
function mulit($count, $page, $perpage) {
	global $dir;
	$last = $allpage = ceil($count / $perpage);
	if ($page > $allpage) {
		$page = $allpage;    
	}
	if ($allpage == 0) {
		return false;    
	}
	$i = 1;
	$pager = "<nav id='mulit'><a class='bulberight' href='?dir=$dir&page=1' title='First page'><em>First</em></a>";
	while($allpage) {
		$class = '';
		if ($i == $page) {
			$class = 'class = "current"'; 
		}
		if ($dir) {
			$pager .= "<a href='?dir=$dir&page=$i' ><em $class>";
		} else {
			$pager .= "<a class='bulbeleft'  href='?page=$i' title='Go to page $i'><em $class>";    
		}
		$pager .= "$i";
		$pager .= "</em></a>";
		$i ++;
		$allpage --;
	}
	$next = $page + 1;
	$pager .= "<a class='bulberight' href='?dir=$dir&page=$last' title='Last page'><em>Last</em></a>";
	$pager .= "<a class='bulbeleft' href='?dir=$dir&page=$next' title='Next page'><em>NEXT</em></a></nav>";
	return $pager;
}
// DATA CHECK
// PHP
if(phpversion() < 4) p_message('<strong>System error:</strong>: Pagemap ImageWall needs at least PHP 4.01. Your current installed PHP version is ' . phpversion());
if(!extension_loaded('gd')) p_message('<strong>System error:</strong> Pagemap ImageWall needs the PHP extension GD-LIB for rendering images. Contact your hosting provider for information how to enable the extension.');
// Images Dir
$config['Images Dir'] = empty($config['Images Dir']) ? $set['script dir'] : trim($config['Images Dir'], '/') . '/';
if(!is_dir($config['Images Dir'])) p_message('Image directory <strong>' . $config['Images Dir'] . '</strong> cannot be found. Please check your configuration.');
// Convert Contact
$config['Contact'] = strpos($config['Contact'], '@') === false
	? p_addHTTP($config['Contact'])
	: p_encodeEmail('mailto:' . $config['Contact']);
// Validate URL's
$config['Home Page'] = p_addHTTP($config['Home Page']);
$config['Imprint'] = p_addHTTP($config['Imprint']);
// Exlude Images
$set['exclude images'] = array(	$config['Header Image']);
$set['exclude images list'] = explode(',', $config['Exclude Images']);
foreach($set['exclude images list'] as $item) $set['exclude images'][] = trim($item);
// Thumbnail Background Color
if(isset($set['color names'][strtolower($config['Thumbnail Background'])])) $config['Thumbnail Background'] = $set['color names'][strtolower($config['Thumbnail Background'])];
$config['Thumbnail Background'] = p_html2rgb($config['Thumbnail Background']) ? p_html2rgb($config['Thumbnail Background']) : array(0, 0, 0);
// Custom HTML
if(!empty($config['Custom HTML']) && is_file($config['Custom HTML'])) $config['Custom HTML'] = file_get_contents($config['Custom HTML']);
// OUTPUT
// Thumbnail
if(isset($_GET['thumbnail']) && is_file($_GET['thumbnail'])) {
	$thumbnail = array();
	$thumbnail['image data'] = getimagesize($_GET['thumbnail']);
	$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp');
	$thumbnail['resized file name'] = substr($_GET['thumbnail'], strrpos($_GET['thumbnail'], '/') + 1);
	$thumbnail['resized file name'] = substr($thumbnail['resized file name'], 0, strrpos($thumbnail['resized file name'], '.')) . '.' . $types[$thumbnail['image data'][2]];
	$thumbnail['resized width'] = p_getThumbnailSize($config['Thumbnail Size']);
	$thumbnail['resized height'] = p_getThumbnailSize($config['Thumbnail Size']);
	if($config['Thumbnail Cropped'] == 'on') {
		if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
			else $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
	} else {
		if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
			else $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
	}
	header('content-type: image/' . $types[$thumbnail['image data'][2]]);
	if(!is_file($set['cache dir'] . $thumbnail['resized file name'])) {
		if(filesize($_GET['thumbnail']) > p_getMemoryLimit() && exif_thumbnail($_GET['thumbnail']) == false) {
			$thumbnail['exif image'] = exif_thumbnail($_GET['thumbnail'], $thumbnail['image data'][0], $thumbnail['image data'][1], $thumbnail['image data'][2]);
			$thumbnail['original image'] = imagecreatefromstring($thumbnail['exif image']);
		} else {
			$thumbnail['original image'] = call_user_func('imagecreatefrom' . $types[$thumbnail['image data'][2]], $_GET['thumbnail']);
		}
		$thumbnail['resized image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
		imagecopyresampled($thumbnail['resized image'], $thumbnail['original image'], 0, 0, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], $thumbnail['image data'][0], $thumbnail['image data'][1]);
		if($config['Thumbnail Cropped'] == 'on') {
			$thumbnail['thumbnail image'] = $thumbnail['resized image'];
		} else {
			$thumbnail['thumbnail image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
			$background_color = imagecolorallocate($thumbnail['thumbnail image'], $config['Thumbnail Background'][0], $config['Thumbnail Background'][1], $config['Thumbnail Background'][2]);
			imagefill($thumbnail['thumbnail image'], 0, 0, $background_color);
			imagecopymerge($thumbnail['thumbnail image'], $thumbnail['resized image'], (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized width']) / 2, (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized height']) / 2, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], 100);
		}
		if($types[$thumbnail['image data'][2]] != 'jpeg') $config['Thumbnail Quality'] = '';
		if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], $set['cache dir'] . $thumbnail['resized file name'], $config['Thumbnail Quality']);
		call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], false, $config['Thumbnail Quality']);
		imagedestroy($thumbnail['original image']);
		imagedestroy($thumbnail['resized image']);
		imagedestroy($thumbnail['thumbnail image']);
	} else
		readfile($set['cache dir'] . $thumbnail['resized file name']);
	exit();
}
// Resized image
if(isset($_GET['image']) && is_file($_GET['image'])) {
	$image['image data'] = getimagesize($_GET['image']);
	$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp');
	header('content-type: image/' . $types[$image['image data'][2]]);
	$image['resized file name'] = substr($_GET['image'], strrpos($_GET['image'], '/') + 1);
	$image['resized file name'] = substr($image['resized file name'], 0, strrpos($image['resized file name'], '.')) . '_resized' . '.' . $types[$image['image data'][2]];
	if(empty($config['Image Size'])) $config['Image Size'] = $set['fallback image size'];
	$image['resize'] = ($image['image data'][0] > $config['Image Size'] || $image['image data'][1] > $config['Image Size']) ? 1 : 0;
	if($image['resize'] == 1 && !is_file($set['cache dir'] . $image['resized file name'])) {
		$image['resized width'] = $config['Image Size'];
		$image['resized height'] = $config['Image Size'];
		if($image['image data'][0] > $image['image data'][1]) $image['resized height'] = floor($config['Image Size'] * $image['image data'][1] / $image['image data'][0]);
			else $image['resized width'] = floor($config['Image Size'] * $image['image data'][0] / $image['image data'][1]);
		$image['original'] = call_user_func('imagecreatefrom' . $types[$image['image data'][2]], $_GET['image']);
		$image['resized'] = imagecreatetruecolor($image['resized width'], $image['resized height']);
		imagecopyresampled($image['resized'], $image['original'], 0, 0, 0, 0, $image['resized width'], $image['resized height'], $image['image data'][0], $image['image data'][1]);
		if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$image['image data'][2]], $image['resized'], $set['cache dir'] . $image['resized file name'], 90);
		call_user_func('image' . $types[$image['image data'][2]], $image['resized'], false, 90);
		imagedestroy($image['original']);
		imagedestroy($image['resized']);
	} else
		readfile($image['resize'] == 1 ? $set['cache dir'] . $image['resized file name'] : $_GET['image']);
	exit();
}
// Layout files
if(isset($_GET['symbol'])) {
	header('content-type: image/gif');
	$set['symbol name'] = 'image ' . $_GET['symbol'];
	if(isset($set[$set['symbol name']])) echo base64_decode($set[$set['symbol name']]);
	exit();
}
// CACHE
if(is_dir($set['cache dir']) && is_file($set['config file']) && filemtime($set['cache dir']) < filemtime($set['config file'])) p_emptyCache(true);
if(!is_dir($set['cache dir']) && is_writeable($config['Images Dir'])) mkdir($set['cache dir'], 0777);
// IMAGE LIST
// Get images
if(empty($config['Images List'])) {
	// From dir
	$set['images dir open'] = opendir($config['Images Dir']);
	$images = array();
	while($item = readdir($set['images dir open'])) {
		if(is_file($config['Images Dir'] . $item) && !in_array($item, $set['exclude images'])) {
			$imagedata = getimagesize($config['Images Dir'] . $item);
			if($imagedata[2] == 1 || $imagedata[2] == 2 || $imagedata[2] == 3) $images[] = $item;
		}
	}
	closedir($set['images dir open']);
} else {
	// From list
	if(!stristr($config['Images List'], ',') && !is_file($config['Images List'])) {
		p_message('Your image list respectively a file with name <strong>' . $config['Images List'] . '</strong> cannot be found.');
		$config['Images List'] = '';
	}
	if(stristr($config['Images List'], '.ini'))
		$config['Images List'] = is_file($config['Images List']) ? file_get_contents($config['Images List']) : '';
	$images = empty($config['Images List']) ? array() : explode(',', $config['Images List']);
	for($i = 0; $i < count($images); $i++) $images[$i] = trim($images[$i]);
	if(count($images) == 0) p_message('<strong>No images found.</strong><br>Your file list is empty.');
}	
// Set Page
$page = max(1, intval($_GET['page']));
$allpage = ceil(count($images) / $config['Per Page']);
if ($page > $allpage) {
	$page = $allpage;    
}

$start = ($page - 1) * $config['Per Page'];
$mulit = mulit(count($images), $page, $config['Per Page']);
$images = array_slice($images, $start, $config['Per Page']);
// Sort images
switch($config['Sort']) {
	case 'normal' : sort($images); break;
	case 'reverse' : rsort($images); break;
	case 'shuffle' : shuffle($images); break;
}
// Get number of existing files
for($i = 0; $i < count($images); $i++) if(is_file($config['Images Dir'] . $images[$i])) break;
if($i == count($images)) {
	p_message('<strong>No images found.</strong><br>The specified file(s) in Images List cannot be found.');
	$images = array();
}
// Get number of images
$number_of_images = count($images);
if($number_of_images == 0) p_message('<strong>No images found.</strong><br>Put some images in this folder or use the <strong>[Images List: ]</strong> tag in <strong>' . $set['config file'] . '</strong> for a custom list (comma separated).');
// UNINSTALL
if(basename($_SERVER['PHP_SELF']) == 'uninstall.php') {
	$images = array();
	$number_of_images = 0;
	p_emptyCache(false);
	if(is_file($set['config file']) && is_writeable($set['config file'])) unlink($set['config file']);
	if(!is_dir($set['cache dir']) && !is_file($set['config file'])) p_message('<strong>Uninstall report:</strong> The cache directory and the config file were deleted successfully. You can now delete this file via FTP.');
	if(!is_dir($set['cache dir']) && is_file($set['config file'])) p_message('<strong>Uninstall report:</strong> The cache directory was deleted successfully. You can now delete this and all related files via FTP.');
}
// GALLERY
// Send header
if($config['Embedded Script'] == 'off' || headers_sent() == false) header('content-type: text/html; charset=utf-8');
?>
<?php if($config['Embedded Script'] == 'off') { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="author" content="<?php echo strip_tags($config['Author']); ?>" />
	<meta name="description" content="<?php echo strip_tags($config['Gallery Description']); ?>" />
	<meta name="generator" content="Pagemap ImageWall" />
	<meta name="keywords" content="<?php echo strip_tags($config['Meta Keywords']); ?>">
	<meta name="robots" content="all" />
	<title><?php echo strip_tags($config['Gallery Title']); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
	<link rel="start" title="Home Page" href="<?php echo $config['Home Page']; ?>" />
	<link rel="help" title="Pagemap Premium Portfolios" href="https://github.com/krisxoofoo/Pagemap-ImageWall/" />
	<style type="text/css">
		html { height: 100%;}
		* {  margin: 0; padding: 0;}
		article, aside, figure, footer, header, hgroup, nav, section {  display:block;}
		body { margin: 15px 25px; background: <?php echo $config['Background']; ?>; text-align: center; font: 12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color: <?php echo $config['Content Color']; ?>; }
		header h1 {margin: 20px 20px 30px 20px;text-align: center;}
		header h1 span {font-size: 24px;display: block; padding-top:20px; font-weight: 400;text-shadow: 0 1px 1px #fff;text-decoration: none;color: <?php echo $config['Header Color']; ?>;}
		header h1 span a { text-decoration: none;color: <?php echo $config['Header Color']; ?>;}
		footer { margin-top: 15px; margin-bottom: 25px;height:80px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 11px; font-style: italic; text-align:center; line-height:1.6em; }
		footer nav {font-size: 14px; padding: .5em 0; font-style: normal;}
		footer, footer a { text-decoration: none; color: <?php echo $config['Footer Color']; ?>; }
	</style>
<?php } ?>
	<style type="text/css">
		/* GALLERY */
		p.error { width: 550px; margin: 50px auto; font-size: 14px; line-height:1.5em; text-align:center;}
		#imagewall { max-width: <?php echo $config['ImageWall Width']; ?>; margin: 0 auto; text-align: center; line-height: 0; font-size: 0; }
		#imagewall img { margin: 1px; }
		#imagewall-container {clear:both;}
		#imagewall-container a img { border: none; box-shadow: 0 0 10px rgba(0,0,0,0.5) ; background: #fff; border-radius: 5px; padding:8px; margin:6px !important; width: <?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>; height: <?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>;}
		#imagewall-container a img:hover {-webkit-transition: all 0.4s ease-in-out;-moz-transition: all 0.4s ease-in-out;-o-transition: all 0.4s ease-in-out;transition: all 0.4s ease-in-out;-webkit-transform: rotate(10deg);-moz-transform: rotate(10deg);-o-transform: rotate(10deg);transform: rotate(10deg);opacity:.5;}
		#mulit li {list-style:none;}
		#mulit {font-size:12px;text-align:center;padding: 0 0 10px 0;margin: 30px 0 10px 0;}
		#mulit em {border: solid 1px #ccc;padding: 2px 7px;margin: 0 3px 0 0;}
		#mulit .current {border: solid 1px #7dc0d1;color:#7dc0d1;}
		#mulit a {color:#999;text-decoration:none;}
		/* SlimBox 2.04 */
		#lbOverlay { position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background: #000 url('<?php echo $set['script name']; ?>?symbol=overlay') repeat; }
		#lbCenter, #lbBottomContainer { position: absolute; z-index: 9999;}
		#lbCenter { z-index: 99999; }
		#lbImageContainer img { -moz-box-shadow: 1px 0 5px #000; -webkit-box-shadow: 1px 0 5px #000; box-shadow: 1px 0 5px #000; }
		#lbCenter .lbLoading { background-color: #fff; }
		#lbImage { position: absolute; left: 0; top: 0; }
		#lbPrevLink, #lbNextLink { display: block; position: absolute; background: url('img/blank.gif'); z-index: 9999; top: 0; width: 50%; outline: none; }
		#lbPrevLink { left: 0; }
		#lbPrevLink:hover { background: url('<?php echo $set['script name']; ?>?symbol=prev') no-repeat left center; }
		#lbNextLink { right: 0; }
		#lbNextLink:hover { background: url('<?php echo $set['script name']; ?>?symbol=next') right center no-repeat; }
		#lbBottom { padding: 5px 10px; text-align: left; font: 12px 'Trebuchet MS', Arial, Helvetica, sans-serif; line-height: 10px; color: #000; font-weight: bold;}
		#lbCloseLink { display: block; float: right; width: 44px; height: 10px; outline: none; }
		#lbCaption, #lbNumber { display: inline; }
		#lbCaption { padding-right: 0.5em;}
		/* TipTip 1.2 */
		#tiptip_holder {display: none;position: absolute;top: 0;left: 0;z-index: 99999;}
		#tiptip_holder.tip_top {padding-bottom: 5px;}
		#tiptip_holder.tip_bottom {padding-top: 5px;}
		#tiptip_holder.tip_right {padding-left: 5px;}
		#tiptip_holder.tip_left {padding-right: 5px;}
		#tiptip_content {text-align: center; font-size: 12px;color: #fff;text-shadow: 0 0 2px #000;padding: 4px 8px;border: 1px solid rgba(255,255,255,0.25);background-color: rgba(25,25,25,0.92);background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(transparent), to(#000));border-radius: 3px;box-shadow: 0 0 3px #555;}
		#tiptip_arrow, #tiptip_arrow_inner {position: absolute;border-color: transparent;border-style: solid;border-width: 6px;height: 0;width: 0;}
		#tiptip_holder.tip_top #tiptip_arrow {border-top-color: #fff;border-top-color: rgba(255,255,255,0.35);}
		#tiptip_holder.tip_bottom #tiptip_arrow {border-bottom-color: #fff;border-bottom-color: rgba(255,255,255,0.35);}
		#tiptip_holder.tip_right #tiptip_arrow {border-right-color: #fff;border-right-color: rgba(255,255,255,0.35);}
		#tiptip_holder.tip_left #tiptip_arrow {border-left-color: #fff;border-left-color: rgba(255,255,255,0.35);}
		#tiptip_holder.tip_top #tiptip_arrow_inner {margin-top: -7px;margin-left: -6px;border-top-color: rgb(25,25,25);border-top-color: rgba(25,25,25,0.92);}
		#tiptip_holder.tip_bottom #tiptip_arrow_inner {margin-top: -5px;margin-left: -6px;border-bottom-color: rgb(25,25,25);border-bottom-color: rgba(25,25,25,0.92);}
		#tiptip_holder.tip_right #tiptip_arrow_inner {margin-top: -6px;margin-left: -5px;border-right-color: rgb(25,25,25);border-right-color: rgba(25,25,25,0.92);}
		#tiptip_holder.tip_left #tiptip_arrow_inner {margin-top: -6px;margin-left: -7px;border-left-color: rgb(25,25,25);border-left-color: rgba(25,25,25,0.92);}
		/* CUSTOM CSS */
	<?php echo $config['Custom CSS']; ?>
	</style>
	<?php if(!empty($config['Custom FileCSS'])) { ?>
	<link rel="stylesheet" href="<?php echo $config['Custom FileCSS']; ?>">
	<?php } ?>
<?php if(!empty($config['jQuery Path'])) { ?><script src="<?php echo $config['jQuery Path']; ?>"></script><?php } ?>
<?php if(!empty($config['Other JS'])) { ?><script src="<?php echo $config['Other JS']; ?>"></script><?php } ?>
<?php if($config['Embedded Script'] == 'off') { ?>
</head>
<body>
<?php } ?>
<div id="imagewall">
<?php if($config['Embedded Script'] == 'off') { ?>
	<?php if(!empty($config['Header Image'])) { ?>
		<header>
			<h1><?php if(!empty($config['Home Page'])) { ?><a class="bulberight" href="<?php echo $config['Home Page']; ?>" ><?php } ?><img src="<?php echo $config['Header Image']; ?>" alt="Header Image" /><?php if(!empty($config['Home Page'])) { ?></a><?php } ?>
			<span>
			<?php if(!empty($config['Gallery Title'])) { ?><?php if(!empty($config['Home Page'])) { ?><a class="bulbetop" href="<?php echo $config['Home Page']; ?>" title="<?php echo $config['Gallery Description']; ?>"><?php } ?><?php echo $config['Gallery Title']; ?><?php if(!empty($config['Home Page'])) { ?></a><?php } ?><?php } ?>
			</span></h1>
		</header>
	<?php } ?>
<?php } ?>
	<section id="imagewall-container">
	<?php if(defined('p_error')) { ?>
		<p class="error"><?php echo constant('p_error'); ?></p>
	<?php } ?><p>
	<?php for($i = 0; $i < $number_of_images; $i++) { ?>
		<?php $image_title = str_replace('_', ' ', substr($images[$i], 0, strrpos($images[$i], '.'))); ?>
			<a class="bulbe" href="<?php echo (empty($config['Image Size']) ? '' : $set['script name'] . '?image=') . $config['Images Dir'] . $images[$i]; ?>" data-infos="<?php echo $image_title; ?>" title="<?php echo $image_title; ?>" target="_blank" rel="lightbox[p]"><img src="<?php echo $set['script name']; ?>?thumbnail=<?php echo $config['Images Dir'] . $images[$i]; ?>" alt="<?php echo $image_title; ?>" /></a>
	<?php } ?>
		</p>
		<?php if($mulit) echo $mulit;?>
		<?php if(!empty($config['Disqus Shortname'])) { ?>
		<!-- disqus -->
		<div id="disqus_thread"></div>
		<script>
			var disqus_shortname = '<?php echo $config['Disqus Shortname']; ?>';
			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<p><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink bulbe">Comments powered by <span class="logo-disqus">Disqus</span></a></p>
		<?php } ?>
		
	</section>
	<?php echo $config['Custom HTML']; ?>

<?php if($config['Embedded Script'] == 'off') { ?>
	<footer>
		<nav><?php if(!empty($config['Home Page'])) { ?><a class="bulbe" href="<?php echo $config['Home Page']; ?>" title="Go to the home page">Home</a><?php } ?><?php if(!empty($config['Contact'])) { ?> • <a class="bulbe" href="<?php echo $config['Contact']; ?>" title="Contact us">Contact</a><?php } ?><?php if(!empty($config['Imprint'])) { ?> • <a class="bulbe" href="<?php echo $config['Imprint']; ?>" title="Imprint this page">Imprint</a> <?php } ?></nav><?php if(!empty($config['Author'])) { ?><p>Photos by <strong><?php echo $config['Author']; ?></strong> - Copyright © 2013 - All rights reserved.</p><?php } ?>
		<p>Powered by <b>Pagemap ImageWall</b> modified by <a class="bulbe" href="https://xoofoo.org/" title="XooFoo Websites"><strong>XooFoo</strong></a></p>
	</footer>
<?php } ?>
</div>
<script>
<?php if($config['Embedded Script'] == 'off') { ?>
// Set width of ImageWall to browser width
$('#imagewall').css({width: $('#imagewall-container').width() + 'px'});
<?php } ?>
/* TipTip - Copyright 2010 Drew Wilson - code.drewwilson.com/entry/tiptip-jquery-plugin */
(function($){$.fn.tipTip=function(options){var defaults={activation:"hover",keepAlive:false,maxWidth:"200px",edgeOffset:3,defaultPosition:"bottom",delay:400,fadeIn:200,fadeOut:200,attribute:"title",content:false,enter:function(){},exit:function(){}};var opts=$.extend(defaults,options);if($("#tiptip_holder").length<=0){var tiptip_holder=$('<div id="tiptip_holder" style="max-width:'+opts.maxWidth+';"></div>');var tiptip_content=$('<div id="tiptip_content"></div>');var tiptip_arrow=$('<div id="tiptip_arrow"></div>');$("body").append(tiptip_holder.html(tiptip_content).prepend(tiptip_arrow.html('<div id="tiptip_arrow_inner"></div>')));}else{var tiptip_holder=$("#tiptip_holder");var tiptip_content=$("#tiptip_content");var tiptip_arrow=$("#tiptip_arrow");}return this.each(function(){var org_elem=$(this);if(opts.content){var org_title=opts.content;}else{var org_title=org_elem.attr(opts.attribute);}if(org_title!=""){if(!opts.content){org_elem.removeAttr(opts.attribute);}var timeout=false;if(opts.activation=="hover"){org_elem.hover(function(){active_tiptip();},function(){if(!opts.keepAlive){deactive_tiptip();}});if(opts.keepAlive){tiptip_holder.hover(function(){},function(){deactive_tiptip();});}}else if(opts.activation=="focus"){org_elem.focus(function(){active_tiptip();}).blur(function(){deactive_tiptip();});}else if(opts.activation=="click"){org_elem.click(function(){active_tiptip();return false;}).hover(function(){},function(){if(!opts.keepAlive){deactive_tiptip();}});if(opts.keepAlive){tiptip_holder.hover(function(){},function(){deactive_tiptip();});}}function active_tiptip(){opts.enter.call(this);tiptip_content.html(org_title);tiptip_holder.hide().removeAttr("class").css("margin","0");tiptip_arrow.removeAttr("style");var top=parseInt(org_elem.offset()['top']);var left=parseInt(org_elem.offset()['left']);var org_width=parseInt(org_elem.outerWidth());var org_height=parseInt(org_elem.outerHeight());var tip_w=tiptip_holder.outerWidth();var tip_h=tiptip_holder.outerHeight();var w_compare=Math.round((org_width-tip_w)/2);var h_compare=Math.round((org_height-tip_h)/2);var marg_left=Math.round(left+w_compare);var marg_top=Math.round(top+org_height+opts.edgeOffset);var t_class="";var arrow_top="";var arrow_left=Math.round(tip_w-12)/2;if(opts.defaultPosition=="bottom"){t_class="_bottom";}else if(opts.defaultPosition=="top"){t_class="_top";}else if(opts.defaultPosition=="left"){t_class="_left";}else if(opts.defaultPosition=="right"){t_class="_right";}var right_compare=(w_compare+left)<parseInt($(window).scrollLeft());var left_compare=(tip_w+left)>parseInt($(window).width());if((right_compare&&w_compare<0)||(t_class=="_right"&&!left_compare)||(t_class=="_left"&&left<(tip_w+opts.edgeOffset+5))){t_class="_right";arrow_top=Math.round(tip_h-13)/2;arrow_left=-12;marg_left=Math.round(left+org_width+opts.edgeOffset);marg_top=Math.round(top+h_compare);}else if((left_compare&&w_compare<0)||(t_class=="_left"&&!right_compare)){t_class="_left";arrow_top=Math.round(tip_h-13)/2;arrow_left=Math.round(tip_w);marg_left=Math.round(left-(tip_w+opts.edgeOffset+5));marg_top=Math.round(top+h_compare);}var top_compare=(top+org_height+opts.edgeOffset+tip_h+8)>parseInt($(window).height()+$(window).scrollTop());var bottom_compare=((top+org_height)-(opts.edgeOffset+tip_h+8))<0;if(top_compare||(t_class=="_bottom"&&top_compare)||(t_class=="_top"&&!bottom_compare)){if(t_class=="_top"||t_class=="_bottom"){t_class="_top";}else{t_class=t_class+"_top";}arrow_top=tip_h;marg_top=Math.round(top-(tip_h+5+opts.edgeOffset));}else if(bottom_compare|(t_class=="_top"&&bottom_compare)||(t_class=="_bottom"&&!top_compare)){if(t_class=="_top"||t_class=="_bottom"){t_class="_bottom";}else{t_class=t_class+"_bottom";}arrow_top=-12;marg_top=Math.round(top+org_height+opts.edgeOffset);}if(t_class=="_right_top"||t_class=="_left_top"){marg_top=marg_top+5;}else if(t_class=="_right_bottom"||t_class=="_left_bottom"){marg_top=marg_top-5;}if(t_class=="_left_top"||t_class=="_left_bottom"){marg_left=marg_left+5;}tiptip_arrow.css({"margin-left":arrow_left+"px","margin-top":arrow_top+"px"});tiptip_holder.css({"margin-left":marg_left+"px","margin-top":marg_top+"px"}).attr("class","tip"+t_class);if(timeout){clearTimeout(timeout);}timeout=setTimeout(function(){tiptip_holder.stop(true,true).fadeIn(opts.fadeIn);},opts.delay);}function deactive_tiptip(){opts.exit.call(this);if(timeout){clearTimeout(timeout);}tiptip_holder.fadeOut(opts.fadeOut);}}});}})(jQuery);
/* Init tooltip */
jQuery(function(){
	jQuery(".bulbe").tipTip();
	jQuery(".bulberight").tipTip({maxWidth: "auto", defaultPosition: "right"});
	jQuery(".bulbeleft").tipTip({maxWidth: "auto", defaultPosition: "left"});
	jQuery(".bulbetop").tipTip({maxWidth: "auto", defaultPosition: "top"});
});	
// Slimbox v2.04 (c) Christophe Beyls (http://www.digitalia.be)
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(3($){p g=$(R),4,k,q=-1,H,A,B,S,T,n,r,13=!R.20,U=[],1p=1q.1p,6={},14=15 V(),16=15 V(),s,7,v,I,21,J,K,C,L,17,18;$(3(){$("22").W($([s=$(\'<o m="23" />\')[0],7=$(\'<o m="24" />\')[0],C=$(\'<o m="25" />\')[0]]).t("X","1r"));v=$(\'<o m="26" />\').1s(7).W(I=$(\'<o z="D: 28;" />\').W([J=$(\'<a m="29" Y="#" />\').M(19)[0],K=$(\'<a m="2a" Y="#" />\').M(1a)[0]])[0])[0];$(I).2b(1t=$(\'<o m="2c" z="D: 1u; 1b: 0;" />\'));L=$(\'<o m="2d" />\').1s(C).W([$(\'<a m="2e" Y="#" />\').1v(s).M(1c)[0],17=$(\'<o m="2f" />\')[0],18=$(\'<o m="2g" />\')[0],$(\'<o z="2h: 2i;" />\')[0]])[0]});$.1d=3(a,b,c){4=$.2j({N:Z,1w:0.8,1e:10,1f:10,1g:"2k",1x:1y,1z:1y,1A:10,1B:10,1C:"V {x} 2l {y}",1D:[27,2m,2n],1E:[2o,2p],1F:[2q,2r]},c);5(2s a=="2t"){a=[[a,b]];b=0}T=g.1G()+(g.9()/2);n=4.1x;r=4.1z;$(7).t({11:O.1H(0,T-(r/2)),h:n,9:r,1h:-n/2}).1i();S=13||(s.1I&&(s.1I.D!="2u"));5(S)s.z.D="1u";$(s).t("1J",4.1w).1K(4.1e);D();1j(1);k=a;4.N=4.N&&(k.u>1);j 12(b)};$.P.1d=3(c,d,e){d=d||3(a){j[a.Y,a.2v]};e=e||3(){j 1L};p f=1M;j f.1N("M").M(3(){p b=1M,1k=0,E,i=0,u;E=$.2w(f,3(a,i){j e.2x(b,a,i)});2y(u=E.u;i<u;++i){5(E[i]==b)1k=i;E[i]=d(E[i],i)}j $.1d(E,1k,c)})};3 D(){p l=g.2z(),w=g.h();$([7,C]).t("1b",l+(w/2));5(S)$(s).t({1b:l,11:g.1G(),h:w,9:g.9()})}3 1j(c){5(c){$("2A").1v(13?"2B":"2C").1O(3(a,b){U[a]=[b,b.z.F];b.z.F="1l"})}2D{$.1O(U,3(a,b){b[0].z.F=b[1]});U=[]}p d=c?"2E":"1N";g[d]("2F 2G",D);$(1q)[d]("2H",1P)}3 1P(a){p b=a.2I,P=$.2J;j(P(b,4.1D)>=0)?1c():(P(b,4.1F)>=0)?1a():(P(b,4.1E)>=0)?19():Z}3 19(){j 12(A)}3 1a(){j 12(B)}3 12(a){5(a>=0){q=a;H=k[q][0];A=(q||(4.N?k.u:0))-1;B=((q+1)%k.u)||(4.N?0:-1);Q();7.1Q="2K";6=15 V();6.1R=1S;6.G=H}j Z}3 1T(a,b,c,d){5(c>a)c=a;5(d>b)d=b;p e=O.2L(c/a,d/b);j[O.1U(e*a),O.1U(e*b)]}3 1S(){7.1Q="";$(v).t({F:"1l",X:""});p a=1T(6.h,6.9,$(R).h()-2M,$(R).9()-2N);6.h=a[0];6.9=a[1];$(1t).1m(\'<2O G="\'+H+\'" h="\'+6.h+\'" 9="\'+6.9+\'" />\');$(I).h(6.h);$([I,J,K]).9(6.9);$(17).1m(k[q][1]||"");$(18).1m((((k.u>1)&&4.1C)||"").1V(/{x}/,q+1).1V(/{y}/,k.u));5(A>=0)14.G=k[A][0];5(B>=0)16.G=k[B][0];n=v.1W;r=v.1n;p b=O.1H(0,T-(r/2));5(7.1n!=r){$(7).1o({9:r,11:b},4.1f,4.1g)}5(7.1W!=n){$(7).1o({h:n,1h:-n/2},4.1f,4.1g)}$(7).2P(3(){$(C).t({h:n,11:b+r,1h:-n/2,F:"1l",X:""});$(v).t({X:"1r",F:"",1J:""}).1K(4.1A,1X)})}3 1X(){5(A>=0)$(J).1i();5(B>=0)$(K).1i();$(L).t("1Y",-L.1n).1o({1Y:0},4.1B);C.z.F=""}3 Q(){6.1R=2Q;6.G=14.G=16.G=H;$([7,v,L]).Q(1L);$([J,K,v,C]).1Z()}3 1c(){5(q>=0){Q();q=A=B=-1;$(7).1Z();$(s).Q().2R(4.1e,1j)}j Z}})(2S);',62,179,'|||function|options|if|preload|center||height||||||||width||return|images||id|centerWidth|div|var|activeImage|centerHeight|overlay|css|length|image||||style|prevImage|nextImage|bottomContainer|position|filteredLinks|visibility|src|activeURL|sizer|prevLink|nextLink|bottom|click|loop|Math|fn|stop|window|compatibleOverlay|middle|hiddenElements|Image|append|display|href|false|400|top|changeImage|ie6|preloadPrev|new|preloadNext|caption|number|previous|next|left|close|slimbox|overlayFadeDuration|resizeDuration|resizeEasing|marginLeft|show|setup|startIndex|hidden|html|offsetHeight|animate|documentElement|document|none|appendTo|imageContainer|absolute|add|overlayOpacity|initialWidth|250|initialHeight|imageFadeDuration|captionAnimationDuration|counterText|closeKeys|previousKeys|nextKeys|scrollTop|max|currentStyle|opacity|fadeIn|true|this|unbind|each|keyDown|className|onload|animateBox|aspectRatio|round|replace|offsetWidth|animateCaption|marginTop|hide|XMLHttpRequest|imageFull|body|lbOverlay|lbCenter|lbBottomContainer|lbImage||relative|lbPrevLink|lbNextLink|prepend|lbImageContainer|lbBottom|lbCloseLink|lbCaption|lbNumber|clear|both|extend|swing|of|88|67|37|80|39|78|typeof|string|fixed|title|grep|call|for|scrollLeft|object|select|embed|else|bind|scroll|resize|keydown|keyCode|inArray|lbLoading|min|75|100|img|queue|null|fadeOut|jQuery'.split('|'),0,{}))
jQuery(function(e){e("#imagewall-container a[rel^='lightbox']").slimbox({},function(e){return[e.href,e.getAttribute("data-infos")]},function(e){return this==e||this.rel.length>8&&this.rel==e.rel})})
// Init Slimbox
if(!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {$("#imagewall-container a[rel^='lightbox']").slimbox({counterText: "({x} / {y})",initialWidth: 200,initialHeight: 200,overlayOpacity: 0.85,resizeDuration: 300,captionAnimationDuration: 200},null,function(el) {return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));});}
</script>
<?php if(!empty($config['GoogleAnalytics Account'])) { ?>
<script>
<!-- ga -->
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $config['GoogleAnalytics Account']; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php } ?>
<?php if($config['Embedded Script'] == 'off') { ?></body></html><?php } else $set = null; ?>