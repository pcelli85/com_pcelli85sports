<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace pcelli85\Component\pcelli85sports\Site\Service;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\RulesInterface;

/**
 * Rule to process URLs without a menu item
 *
 * @since  3.4
 */
class pcelli85sportsNomenuRules implements RulesInterface
{
	/**
	 * Router this rule belongs to
	 *
	 * @var RouterView
	 * @since 3.4
	 */
	protected $router;

	/**
	 * Class constructor.
	 *
	 * @param   RouterView  $router  Router this rule belongs to
	 *
	 * @since   3.4
	 */
	public function __construct(RouterView $router)
	{
		$this->router = $router;
	}

	/**
	 * Dummymethod to fullfill the interface requirements
	 *
	 * @param   array  &$query  The query array to process
	 *
	 * @return  void
	 *
	 * @since   3.4
	 * @codeCoverageIgnore
	 */
	public function preprocess(&$query)
	{
		$test = 'Test';
	}

	/**
	 * Parse a menu-less URL
	 *
	 * @param   array  &$segments  The URL segments to parse
	 * @param   array  &$vars      The vars that result from the segments
	 *
	 * @return  void
	 *
	 * @since   3.4
	 */
	public function parse(&$segments, &$vars)
	{
		//with this url: http://localhost/j4x/my-walks/pcelli85sport-n/walk-title.html
		// segments: [[0] => pcelli85sport-n, [1] => walk-title]
		// vars: [[option] => com_pcelli85sports, [view] => pcelli85sports, [id] => 0]

		$vars['view'] = 'pcelli85sport';
		$vars['id'] = substr($segments[0], strpos($segments[0], '-') + 1);
		array_shift($segments);
		array_shift($segments);
		return;
	}

	/**
	 * Build a menu-less URL
	 *
	 * @param   array  &$query     The vars that should be converted
	 * @param   array  &$segments  The URL segments to create
	 *
	 * @return  void
	 *
	 * @since   3.4
	 */
	public function build(&$query, &$segments)
	{
		// content of $query ($segments is empty or [[0] => pcelli85sport-3])
		// when called by the menu: [[option] => com_pcelli85sports, [Itemid] => 126]
		// when called by the component: [[option] => com_pcelli85sports, [view] => pcelli85sport, [id] => 1, [Itemid] => 126]
		// when called from a module: [[option] => com_pcelli85sports, [view] => pcelli85sports, [format] => html, [Itemid] => 126]
		// when called from breadcrumbs: [[option] => com_pcelli85sports, [view] => pcelli85sports, [Itemid] => 126]

		// the url should look like this: /site-root/pcelli85sports/walk-n/walk-title.html

		// if the view is not pcelli85sport - the single walk view
		if (!isset($query['view']) || (isset($query['view']) && $query['view'] !== 'pcelli85sport') || isset($query['format']))
		{
			return;
		}
		$segments[] = $query['view'] . '-' . $query['id'];
		$segments[] = $query['slug'];
		unset($query['view']);
		unset($query['id']);
		unset($query['slug']);
	}
}

