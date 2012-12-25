<?php

class XmlHelper
{
	public static function viewTruckDetails($truck)
	{
      $xml = self::createHeader();
		if ($truck) {
			$xml .= self::appendFirstPartOfXmlTruckDetails($truck) . "/>\n";
		} else {
			$xml .= '<truck id="" name="" display_name="" city="" state="" category=""';
			$xml .= ' longitude="" latitude="" status=""/>';
		}
		echo $xml;
	}

	public static function viewAll($trucks)
	{
      $xml = self::createHeader();
		$xml .= "<trucks>\n";

		foreach ($trucks as $truck) {
			$xml .= "\t" . self::appendFirstPartOfXmlTruckDetails($truck);
			$xml .= " created_at=\"$truck->created_at\" updated_at=\"$truck->updated_at\"";
			$xml .= " truck_id=\"$truck->truck_id\" about=\"$truck->about\"";
			$xml .= " image=\"$truck->image\" telephone=\"$truck->telephone\"";
			$xml .= " mobile=\"$truck->mobile\" email=\"$truck->email\"";
			$xml .= " facebook=\"$truck->facebook\" twitter=\"$truck->twitter\"/>\n";
		}
		
		$xml .= "</trucks>";
		echo $xml;
	}

   private static function appendFirstPartOfXmlTruckDetails($truck)
   {
      $xml = "<truck id=\"". $truck->id ."\" name=\"$truck->name\"";
      $xml .= " display_name=\"$truck->display_name\"";
      $xml .= " city=\"$truck->city\" state=\"$truck->state\"";
      $xml .= " category=\"$truck->category\" longitude=\"$truck->longitude\"";
      $xml .= " latitude=\"$truck->latitude\" status=\"$truck->status\"";
      return $xml;
   }

	public static function createErrorMessages( $errors )
	{
		$message = "<messages/>\n";

		foreach( $errors as $key => $value ) {
			$message .= "\t<message source=\"$key\" ";
			$message .= "text=\"$value\" ";
			$message .= "/>\n";
		}
		
		$message .= "</messages>";
		return $message;
	}

   public static function renderSignupError($errors)
   {
      $xml = XmlHelper::createHeader();
      $xml .= "<signup success=\"false\">\n";
      $xml .= XmlHelper::createErrorMessages($errors);
      $xml .= "\n</signup>";
      echo $xml;
   }

   public static function renderSignupSuccess()
   {
      $xml = XmlHelper::createHeader();
      $xml .= "<signup success=\"true\"/>";
      echo $xml;
   }

	public static function createHeader()
	{ 
		return "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
	}

}