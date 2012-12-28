<?php

class XmlHelper
{
   public static function createHeader()
   {
      return "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
   }

	public static function viewTruckDetails($truck)
	{
      $xml = self::createHeader();
		if ($truck) {
			$xml .= self::prependFirstPartOfXmlTruckDetails($truck) . "/>\n";
		} else {
			$xml .= '<truck id="" name="" display_name="" city="" state=""'
			      . ' category="" longitude="" latitude="" status=""/>';
		}
		echo $xml;
	}

	public static function viewAll($trucks)
	{
      $xml = self::createHeader()
		      . "<trucks>\n";

		foreach ($trucks as $truck) {
			$xml .= "\t" . self::prependFirstPartOfXmlTruckDetails($truck)
			      . " created_at=\"$truck->created_at\""
			      . " updated_at=\"$truck->updated_at\""
			      . " truck_id=\"$truck->truck_id\" about=\"$truck->about\""
			      . " image=\"$truck->image\" telephone=\"$truck->telephone\""
			      . " mobile=\"$truck->mobile\" email=\"$truck->email\""
			      . " facebook=\"$truck->facebook\""
			      . " twitter=\"$truck->twitter\"/>\n";
		}
		
		$xml .= "</trucks>";
		echo $xml;
	}

   private static function prependFirstPartOfXmlTruckDetails($truck)
   {
      return "<truck id=\"". $truck->id ."\" name=\"$truck->name\""
            . " display_name=\"$truck->display_name\""
            . " city=\"$truck->city\" state=\"$truck->state\""
            . " category=\"$truck->category\" longitude=\"$truck->longitude\""
            . " latitude=\"$truck->latitude\" status=\"$truck->status\"";
   }

	public static function createErrorMessages($errors)
	{
		$message = "<messages/>\n";

		foreach ($errors as $key => $value) {
			$message .= "\t<message source=\"$key\" "
			         . "text=\"$value\" "
			         . "/>\n";
		}
		
		$message .= "</messages>";
		return $message;
	}

   public static function createUser($user)
   {
      return self::createHeader()
            . "<user username=\"" . $user->username . "\" "
            . "email=\"" . $user->email . "\"/>";
   }

   public static function renderErrors($elementName, $errors)
   {
      return self::createHeader()
            . "<$elementName success=\"false\">\n"
            . self::createErrorMessages($errors)
            . "\n</$elementName>";
   }

   public static function renderSuccess($elementName, $children)
   {
      return self::createHeader()
            . "<$elementName success=\"true\">"
            .     $children
            . "</$elementName>";
   }
}