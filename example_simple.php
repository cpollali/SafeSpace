<?php
 
/**
 *   Example for a simple cas 2.0 client
 *
 * PHP Version 5
 *
 * @file     example_simple.php
 * @category Authentication
 * @package  PhpCAS
 * @author   Joachim Fritschi <jfritschi@freenet.de>
 * @author   Adam Franco <afranco@middlebury.edu>
 * @license  http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link     https://wiki.jasig.org/display/CASC/phpCAS
 */
 
// Load the settings from the central config file
require_once 'config_simple.php';
// Load the CAS lib.  Wellesley has installed it in a central PHP library
require_once 'CAS.php';
 
// Enable debugging
phpCAS::setDebug();
 
// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
 
// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);
 
// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();
 
// force CAS authentication
phpCAS::forceAuthentication();
 
// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().
 
// logout if desired
if (isset($_REQUEST['logout'])) {
    phpCAS::logout();
    die();
}
 
// for this test, simply print that the authentication was successfull
?>
<html>
  <head>
    <h1>Successful Authentication!</h1>
    
    <button style="
    display:block;
    margin: auto;
    margin-top: 400px;
    -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  text-shadow: 0px 0px 0px #666666;
  font-family: Georgia;
  color: #FFFFFF;
  font-size: 45px;
  background: #11cdd4;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  width:500px; height:200px;" onClick="location.href='map.html'">Continue</button>
  </body>
</html>