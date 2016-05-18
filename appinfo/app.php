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

$app = new Application();
$container = $app->getContainer();

//$container->query('OCP\INavigationManager')->add(function () use ($container) {
//	$urlGenerator = $container->query('OCP\IURLGenerator');
//	$l10n = $container->query('OCP\IL10N');
//	return [
//		// the string under which your app will be referenced in owncloud
//		'id' => 'trialapp',
//
//		// sorting weight for the navigation. The higher the number, the higher
//		// will it be listed in the navigation
//		'order' => 10,
//
//		// the route that will be shown on startup
//		'href' => $urlGenerator->linkToRoute('trialapp.page.index'),
//
//		// the icon that will be shown in the navigation
//		// this file needs to exist in img/
//		'icon' => $urlGenerator->imagePath('trialapp', 'app.svg'),
//
//		// the title of your application. This will be used in the
//		// navigation or on the settings page of your app
//		'name' => $l10n->t('Trial App'),
//	];
//});

\OCP\Util::connectHook('OC_Filesystem', 'post_create', 'OCA\TrialApp\hooks\FileHooks', 'postCreate');