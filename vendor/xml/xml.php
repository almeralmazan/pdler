<?php

class XML 
{
	public static function create($truck, $rootnode='trucks', $basenode='truck')
	{
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$xml .= "<$rootnode>\n";

		if ( is_array($truck) ) 
		{
			foreach ($truck as $trucks) 
			{
				$xml .= "\t<$basenode id=\"$trucks->id\" name=\"$trucks->name\"";
				$xml .= " description=\"$trucks->description\"";
				$xml .= " category=\"$trucks->category\"";
				$xml .= " city=\"$trucks->city\" state=\"$trucks->state\"/>\n";
			}
		} 
		else 
		{
			$xml .= "\t<$basenode id=\"$truck->id\" name=\"$truck->name\"";
			$xml .= " description=\"$truck->description\"";
			$xml .= " category=\"$trucks->category\"";
			$xml .= " city=\"$truck->city\" state=\"$truck->state\"/>\n";
		}

		$xml .= "</$rootnode>";
		return $xml;
	}

}