<?php

class XML 
{
	/**
	 * Create xml from object
	 * @param  array  $list     list of objects
	 * @param  string $rootnode 
	 * @param  string $basenode 
	 * @return string
	 */
	public static function create($list = array(), $rootnode = 'trucks', $basenode = 'truck')
	{
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$xml .= "<$rootnode>\n";

		foreach ($list as $truck) {
			$xml .= "\t<$basenode id=\"$truck->id\" name=\"$truck->name\"";
			$xml .= " description=\"$truck->description\"";
			$xml .= " city=\"$truck->city state=\"$truck->state\"/>\n";
		}

		$xml .= "</$rootnode>";
		return $xml;
	}
}