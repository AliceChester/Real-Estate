<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: Tracker.php 4275 2011-04-01 14:09:05Z vipsoft $
 * 
 * @category Piwik_Plugins
 * @package Piwik_VisitorGenerator
 */

/**
 * Fake Piwik_Tracker that:
 * - overwrite the sendHeader method so that no headers are sent.
 * - doesn't print the 1pixel transparent GIF at the end of the visit process
 * - overwrite the Tracker Visit object to use so we use our own Tracker_visit @see Piwik_Tracker_Generator_Visit
 * 
 * @package Piwik_VisitorGenerator
 */
class Piwik_VisitorGenerator_Tracker extends Piwik_Tracker
{
	/**
	 * Does nothing instead of sending headers
	 */
	protected function sendHeader($header)
	{
	}
	
	/**
	 * Does nothing instead of displaying a 1x1 transparent pixel GIF
	 */
	protected function end()
	{
	}
	
	/**
	 * Returns our 'generator home made' Piwik_VisitorGenerator_Visit object.
	 *
	 * @return Piwik_VisitorGenerator_Visit
	 */
	protected function getNewVisitObject()
	{
		$ip = Piwik_Common::getRequestVar('cip', false);
		$visit = new Piwik_VisitorGenerator_Visit($ip);
		$visit->generateTimestamp();
		return $visit;
	}	
	
	static function disconnectDatabase()
	{
		return;
	}
}
