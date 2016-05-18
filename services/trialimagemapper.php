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


use OCP\AppFramework\Db\Mapper;
use OCP\IDb;

class TrialImageMapper extends Mapper {

	/**
	 * @param IDb $database
	 */

	public function __construct(IDb $database) {
		parent::__construct($database, 'trial_image_size', '\OCA\TrialApp\Services\TrialImage');
	}

	public function find($imagePath) {
		$sql = 'SELECT * FROM *PREFIX*trial_image_size WHERE image_path = ?';
		return $this->findEntity($sql, [$imagePath]);
	}
}