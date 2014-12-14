<?php
namespace AssetCompress\Filter;

use AssetCompress\AssetFilter;
use JShrink\Minifier;

/**
 * JShrink filter.
 *
 * Allows you to minify Javascript files through JShrink.
 * JShrink can be downloaded at https://github.com/tedivm/JShrink.
 * You need to put Minifier.php in your vendors jshrink folder.
 *
 */
class JShrinkFilter extends AssetFilter {

/**
 * Settings for JShrink minifier.
 *
 * @var array
 */
	protected $_settings = array(
		'path' => 'jshrink/Minifier.php',
		'flaggedComments' => true,
	);

/**
 * Apply JShrink to $content.
 *
 * @param string $filename target filename
 * @param string $content Content to filter.
 * @throws Exception
 * @return string
 */
	public function output($filename, $content) {
		if (!class_exists('JShrink\Minifier')) {
			throw new \Exception(sprintf('Cannot not load filter class "%s".', 'JShrink\Minifier'));
		}
		return Minifier::minify($content, array('flaggedComments' => $this->_settings['flaggedComments']));
	}

}
