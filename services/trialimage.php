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

namespace OCA\TrialApp\Services;


use OCP\AppFramework\Db\Entity;
use JsonSerializable;

class TrialImage extends Entity implements JsonSerializable{
	protected $imagePath;
	protected $imageHeight;
	protected $imageWidth;

	public function jsonSerialize() {
		return [
			'id' => $this->$id,
			'imagePath' => $this->$imagePath,
			'imageHeight' => $this->$imageHeight,
			'imageWidth' => $this->$imageWidth
		];
	}
}