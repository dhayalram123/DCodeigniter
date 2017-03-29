<?php 

	if ( ! function_exists('is_php')){
		function is_php($version){
			static $_is_php;
			$version = (string) $version;
			if ( ! isset($_is_php[$version])){
				$_is_php[$version] = version_compare(PHP_VERSION, $version, '>=');
			}
			return $_is_php[$version];
		}
	}

?>