<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('xss_clean'))
{
	function xss_clean($str, $is_image = FALSE)
	{
		$CI =& get_instance();
		return $CI->input->xss_clean($str, $is_image);
	}
}

if ( ! function_exists('dohash'))
{	
	function dohash($str, $type = 'sha1')
	{
		if ($type == 'sha1')
		{
			if ( ! function_exists('sha1'))
			{
				if ( ! function_exists('mhash'))
				{	
					require_once(BASEPATH.'libraries/Sha1'.EXT);
					$SH = new CI_SHA;
					return $SH->generate($str);
				}
				else
				{
					return bin2hex(mhash(MHASH_SHA1, $str));
				}
			}
			else
			{
				return sha1($str);
			}	
		}
		else
		{
			return md5($str);
		}
	}
}
	

if ( ! function_exists('strip_image_tags'))
{
	function strip_image_tags($str)
	{
		$str = preg_replace("#<img\s+.*?src\s*=\s*[\"'](.+?)[\"'].*?\>#", "\\1", $str);
		$str = preg_replace("#<img\s+.*?src\s*=\s*(.+?).*?\>#", "\\1", $str);
		return $str;
	}
}
	


if ( ! function_exists('encode_php_tags'))
{
	function encode_php_tags($str)
	{
		return str_replace(array('<?php', '<?PHP', '<?', '?>'),  array('&lt;?php', '&lt;?PHP', '&lt;?', '?&gt;'), $str);
	}
}
