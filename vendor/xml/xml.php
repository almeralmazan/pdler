<?php

class XML 
{
	private static $xml_header = '<?xml version="1.0" encoding="utf-8"?>';

	public static function create($truck)
	{
		$xml =  self::$xml_header . "\n";

		if ($truck) {
			$xml .= "<truck id=\"$truck->id\" name=\"$truck->name\"";
			$xml .= " display_name=\"$truck->display_name\" city=\"$truck->city\"";
			$xml .= " state=\"$truck->state\" category=\"$truck->category\"";
			$xml .= " longitude=\"$truck->longitude\" latitude=\"$truck->latitude\"";
			$xml .= " status=\"$truck->status\"/>\n";
		} else {
			$xml .= '<truck id="" name="" display_name="" city="" state="" category=""';
			$xml .= ' longitude="" latitude="" status=""/>';
		}

		return $xml;
	}

	
	public static function create_trucks($truck, $rootnode='trucks', $basenode='truck')
	{
		$xml =  self::$xml_header . "\n";
		$xml .= "<$rootnode>\n";

		foreach ($truck as $trucks) {
			$xml .= "\t<$basenode id=\"$trucks->id\" name=\"$trucks->name\"";
			$xml .= " display_name=\"$trucks->display_name\"";
			$xml .= " city=\"$trucks->city\" state=\"$trucks->state\"";
			$xml .= " category=\"$trucks->category\" longitude=\"$trucks->longitude\"";
			$xml .= " latitude=\"$trucks->latitude\" status=\"$trucks->status\"";
			$xml .= " created_at=\"$trucks->created_at\" updated_at=\"$trucks->updated_at\"";
			$xml .= " truck_id=\"$trucks->truck_id\" about=\"$trucks->about\"";
			$xml .= " image=\"$trucks->image\" telephone=\"$trucks->telephone\"";
			$xml .= " mobile=\"$trucks->mobile\" email=\"$trucks->email\"";
			$xml .= " facebook=\"$trucks->facebook\" twitter=\"$trucks->twitter\"/>\n";
		}
		
		$xml .= "</$rootnode>";
		return $xml;
	}

}