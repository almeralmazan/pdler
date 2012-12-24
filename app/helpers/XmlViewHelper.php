<?php

class XmlViewHelper
{
	public static function create($truck)
	{
      $xml = self::create_header();
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

	
	public static function listAllTrucks($truck, $rootnode='trucks', $basenode='truck')
	{
      $xml = self::create_header();
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

	public static function create_error_messages( $errors ) 
	{
		$message = "<messages/>\n";

		foreach( $errors as $key => $value ) {
			$message .= "\t<message ";
			$message .= "source=\"$key\" ";
			$message .= "text=\"$value\" ";
			$message .= "/>\n";
		}
		
		$message .= "</messages>";
		return $message;
	}

   public static function render_signup_error($errors)
   {
      $xml = XmlHelper::create_header();
      $xml .= "<signup success=\"false\">\n";
      $xml .= XmlHelper::create_error_messages($errors);
      $xml .= "\n</signup>";
      echo $xml;
   }

   public static function render_signup_success()
   {
      $xml = XmlHelper::create_header();
      $xml .= "<signup success=\"true\"/>";
      echo $xml;
   }

	public static function create_header() 
	{ 
		return "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
	}

}