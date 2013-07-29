<?php $api_key = "ABQIAAAA_BECVXQWvpqRqFNXYwwr4hQqRv-di0S0EGcqBXi0dRvJsORXhBS90Y28p729-glPrh4B4T79mz8l9A";
if (isset($_POST['long'])) { // automatic geolocation 
$lat = $_POST['lat'];
$long = $_POST['long'];
$url = 'http://maps.google.com/maps/geo?q='.$lat.','.$long.'&output=json&sensor=true_or_false&key='.$api_key;
$data = @file_get_contents($url);
$jsondata = json_decode($data,true);
if(is_array($jsondata )&& $jsondata ['Status']['code']==200)
{ 
$country = $jsondata['Placemark'][0]['AddressDetails']['Country']['CountryName']; 
$countrycode = $jsondata['Placemark'][0]['AddressDetails']['Country']['CountryNameCode']; 
}
$db = new mysqli('tipster.db','','','tips');
if (!$db) { printf("Can't connect to MySQL server. Errorcode: %s\n".mysqli_connect_error());exit; }
if ($result = $db->query("SELECT * FROM countries WHERE country='$countrycode'")) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if ($row) {
$string = "<p>Tipping conventions in <strong>".$row['countryname']."</strong>
<dl>
<dt class=ss-icon>lodging<dd>".$row['hotel']."%
<dt class=ss-icon>taxi<dd>".$row['taxi']."%
<dt class=ss-icon>utensils<dd>".$row['restaurant']."%
<dt class=ss-icon>cocktail<dd>".$row['bar']."%
</dl>".$row['notes'];
 } else {
$string = "<p>Sorry, I don't have tipping information for your location ".$countrycode." yet.";
}
echo $string;
}
}
if (isset($_POST['country'])) { // form submission
	$country = urldecode(filter_var(trim($_POST['country'])));
	$db = new mysqli('localhost','root','root','tips');
	if (!$db) { printf("Can't connect to MySQL server. Errorcode: %s\n".mysqli_connect_error());exit; }
	if ($result = $db->query("SELECT * FROM countries WHERE countryname='$country'")) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if ($row) {
			$string = "<p>Tipping conventions in <strong>".$row['countryname']."</strong>
<dl>
<dt class=ss-icon>lodging<dd>".$row['hotel']."%
<dt class=ss-icon>taxi<dd>".$row['taxi']."%
<dt class=ss-icon>utensils<dd>".$row['restaurant']."%
<dt class=ss-icon>cocktail<dd>".$row['bar']."%
</dl>".$row['notes'];
 } else {
$string = "<p>Sorry, I don't have tipping information for ".$country." yet.";
} 
echo $string;
}
}
?>