<?php
/**
 * ownCloud - trialapp
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Jalpreet Singh Nanda <jalpreetnanda@gmail.com>
 * @copyright Jalpreet Singh Nanda 2016
 */

namespace OCA\TrialApp\Hooks;

use OC\Files\Node;
use OC\Files\Node\Root;
use OC\Search\Provider\File;
use OCA\TrialApp\Services\TrialImage;
use OCA\TrialApp\Services\TrialImageMapper;

class FileHooksStatic {
	protected $mapper;
	protected $dataDirectory;
	protected $root;

	/**
	 * @param Root $root
	 * @param TrialImageMapper $mapper
	 * @param $dataDirectory
	 */

	public function __construct(Root $root, TrialImageMapper $mapper, $dataDirectory) {
		$this->root = $root;
		$this->mapper = $mapper;
		$this->dataDirectory = $dataDirectory;
	}

	public function post_Create($params) {
		$absolutePath = $this->dataDirectory . $params['path'];

		$dimensions = getimagesize($absolutePath);

		if ($dimensions !== false) {
			list($width, $height) = $dimensions;

			//LOG the dimensions
			$logger = \OC::$server->getLogger();
			$logger->log('debug', $dimensions, array('app' => 'TrialApp'));

			$trialImage = new TrialImage();
			$trialImage->setImagePath($absolutePath);
			$trialImage->setImageHeight($height);
			$trialImage->setImageWidth($width);

			$this->mapper->insert($trialImage);
		}
	}
}