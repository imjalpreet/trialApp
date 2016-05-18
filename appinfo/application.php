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

namespace OCA\TrialApp\AppInfo;


use OCA\TrialApp\Hooks\FileHooksStatic;
use OCA\TrialApp\Services\TrialImageMapper;
use OCP\AppFramework\App;
use OCP\IContainer;

class Application extends App {
	public function __construct () {
		parent::__construct('trialapp');
		$container = $this->getContainer();

		$container->registerService('TrialImageMapper', function(IContainer $Container){
			return new TrialImageMapper(
				$Container->query('ServerContainer')->getDb()
			);
		});

		$container->registerService('FileHooksStatic', function(IContainer $Container) {
			$server = $Container->query('ServerContainer');

			return new FileHooksStatic(
				$server->getRootFolder(),
				$Container->query('TrialImageMapper'),
				$server->getConfig()->getSystemValue('datadirectory')
			);
		});
	}
}