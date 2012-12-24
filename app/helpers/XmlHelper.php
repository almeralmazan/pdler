<?php

class XmlHelper
{
	public static function view_truck_details_of_one($truck)
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

		echo $xml;
	}


	public static function view_all($trucks)
	{
      $xml = self::create_header();
		$xml .= "<trucks>\n";

		foreach ($trucks as $truck) {
			$xml .= "\t<truck id=\"$truck->id\" name=\"$truck->name\"";
			$xml .= " display_name=\"$truck->display_name\"";
			$xml .= " city=\"$truck->city\" state=\"$truck->state\"";
			$xml .= " category=\"$truck->category\" longitude=\"$truck->longitude\"";
			$xml .= " latitude=\"$truck->latitude\" status=\"$truck->status\"";
			$xml .= " created_at=\"$truck->created_at\" updated_at=\"$truck->updated_at\"";
			$xml .= " truck_id=\"$truck->truck_id\" about=\"$truck->about\"";
			$xml .= " image=\"$truck->image\" telephone=\"$truck->telephone\"";
			$xml .= " mobile=\"$truck->mobile\" email=\"$truck->email\"";
			$xml .= " facebook=\"$truck->facebook\" twitter=\"$truck->twitter\"/>\n";
		}
		
		$xml .= "</trucks>";
		echo $xml;
	}

	public static function create_error_messages( $errors )
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

   public static function render_signup_error($errors)
   {
      $xml = XmlViewHelper::create_header();
      $xml .= "<signup success=\"false\">\n";
      $xml .= XmlViewHelper::create_error_messages($errors);
      $xml .= "\n</signup>";
      echo $xml;
   }

   public static function render_signup_success()
   {
      $xml = XmlViewHelper::create_header();
      $xml .= "<signup success=\"true\"/>";
      echo $xml;
   }

	public static function create_header()
	{ 
		return "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
	}

}