<?php

class XML 
{
	private static $xml_header = '<?xml version="1.0" encoding="utf-8"?>';

	public static function create($truck, $rootnode='trucks', $basenode='truck')
	{
		$xml =  self::$xml_header . "\n";
		$xml .= "<$rootnode>\n";

		if ( is_array($truck) ) {
			foreach ($truck as $trucks) {
				$xml .= "\t<$basenode id=\"$trucks->id\" name=\"$trucks->name\"";
				$xml .= " category=\"$trucks->category\"";
				$xml .= " city=\"$trucks->city\" state=\"$trucks->state\"/>\n";
			}
		} else {
			$xml .= "\t<$basenode id=\"$truck->id\" name=\"$truck->name\"";
			$xml .= " category=\"$truck->category\"";
			$xml .= " city=\"$truck->city\" state=\"$truck->state\"/>\n";
		}

		$xml .= "</$rootnode>";
		return $xml;
	}

	public function create_truck($truck)
	{
		$xml = self::$xml_header . "\n";
		$xml .= "<truck id=\"$truck->id\" name=\"$truck->name\"";
		$xml .= " display_name=\"$truck->display_name\" city=\"$truck->city\"";
		$xml .= " state=\"$truck->state\" category=\"$truck->category\"";
		$xml .= " longitude=\"$truck->longitude\" latitude=\"$truck->latitude\"";
		$xml .= " status=\"$truck->status\" about=\"$truck->about\"";
		$xml .= " image=\"$truck->image\" telephone=\"$truck->telephone\"";
		$xml .= " mobile=\"$truck->mobile\" email=\"$truck->email\"";
		$xml .= " facebook=\"$truck->facebook\" twitter=\"$truck->twitter\"/>";
		return $xml;
	}
}