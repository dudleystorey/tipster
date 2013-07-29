<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<title>tipster.io</title>
<meta name=viewport content="width=device-width">
<meta property="og:image" content="images/tipster.png">
<meta property="og:title" content="tipster.io">
<meta property="og:url" content="http://tipster.io">
<meta property="og:site_name" content="tipster.io">
<meta property="og:description" content="Automatically provides local tipping customs and percentages for services anywhere in the world.">
<link rel=stylesheet href=main.css>
</head>
<body itemscope itemtype=http://schema.org/WebPage>
<a href=//github.com/dudleystorey id=github><img style="position: absolute; top: 0; left: 0; border: 0;" src=//s3.amazonaws.com/github/ribbons/forkme_left_darkblue_121621.png alt="Fork me on GitHub"></a>
<meta name="name" content="tipster.io">
<meta name="description" content="Automatically provides local tipping customs and percentages for services anywhere in the world.">
<meta name="image" content="images/tipster.png">
<header>
<ul class="socialcount" data-url="http://tipster.io" data-counts="true" data-share-text="Automatically find local tipping customs for services anywhere in the world.">
<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=http://tipster.io" title="Share on Facebook"><span class="social-icon icon-facebook"></span><span class="count">Like</span></a></li>
<li class="twitter"><a href="https://twitter.com/intent/tweet?text=http://tipster.io" title="Share on Twitter"><span class="social-icon icon-twitter"></span><span class="count">Tweet</span></a></li>
<li class="googleplus"><a href="https://plus.google.com/share?url=http://tipster.io" title="Share on Google Plus"><span class="social-icon icon-googleplus"></span><span class="count">+1</span></a></li>
</ul>
</header>
<h1>tipster.io</h1>
<div id=tips></div>
<form action=/find.php>
<p>Enter a country:
<input type=search maxlength=20 size=18 name="country" id="country" list="countries" placeholder="Japan">
<datalist id="countries">
<option value=Albania>
<option value=Argentina>
<option value=Australia>
<option value=Austria>
<option value=Belgium>
<option value=Bolivia>
<option value=Brazil>
<option value=Canada>
<option value=Chile>
<option value=China>
<option value=Columbia>
<option value=Denmark>
<option value=Ecuador>
<option value="Faulkland Islands">
<option value=Finland>
<option value=France>
<option value="French Guiana">
<option value=Germany>
<option value="Great Britain">
<option value=Greece>
<option value=Guyana>
<option value="Hong Kong">
<option value=Iceland>
<option value=India>
<option value=Ireland>
<option value="Isle of Man">
<option value=Israel>
<option value=Italy>
<option value=Japan>
<option value=Jordan>
<option value=Netherlands>
<option value="New Zealand">
<option value=Norway>
<option value=Pakistan>
<option value=Paraguay>
<option value=Peru>
<option value=Portugal>
<option value=Singapore>
<option value="South Africa">
<option value="South Korea">
<option value=Spain>
<option value=Suriname>
<option value=Sweden>
<option value=Thailand>
<option value=Turkey>
<option value="United States">
<option value=Uruguay>
<option value=Venezuela>
</datalist>
<input type=submit value=Go>
</form>
<footer>
<p><span itemscope itemtype="http://schema.org/Person">A site by <a itemprop="name" rel="author" href="https://plus.google.com/115433388220321744732">Dudley Storey</a>. </span>Corrections, feedback: <a href="//github.com/dudleystorey/tipster">contribute to the GitHub project</a>.
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/socialcount.js"></script>
<script>
$(document).ready(function () {
        if (navigator && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(geo_success, geo_error);
        } else {
            error('Geolocation is not supported.');
        }
    });
function geo_success(position) {
 $.post("find.php", {lat : position.coords.latitude, long: position.coords.longitude}, function(data){
   if (data.length>0){ 
     $("#tips").html(data); 
   } 
  }) 
}

$("form").submit(function(e){  
   e.preventDefault();
   country = $("#country").val();
    $.post("find.php", {country : country}, function(data){
   if (data.length>0){ 
     $("#tips").html(data); 
    } 
  })
});  
        
function geo_error(err) {
    if (err.code == 1) {
        error('The user denied the request for location information.')
    } else if (err.code == 2) {
        error('Your location information is unavailable.')
    } else if (err.code == 3) {
        error('The request to get your location timed out.')
    } else {
        error('An unknown error occurred while requesting your location.')
    }
}
var _gaq=[['_setAccount','UA-37233092-1'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));

var MTIProjectId='30d94542-4109-4c8a-b846-1eba6798001b';
 (function() {
        var mtiTracking = document.createElement('script');
        mtiTracking.type='text/javascript';
        mtiTracking.async='true';
        mtiTracking.src=('https:'==document.location.protocol?'https:':'http:')+'//fast.fonts.com/t/trackingCode.js';
        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild( mtiTracking );
   })();
</script>

</body>
</html>