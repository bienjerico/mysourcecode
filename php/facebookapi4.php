<?php 

session_start();

require_once('lib/facebook-php-sdk-v4-4.0-dev/autoload.php');

use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication('314430672099879', '65e598f97cea5463b2be4fb163854038');

$helper = new FacebookRedirectLoginHelper('http://xx.xx.xx.xx/fb');


try {
    $session = $helper->getSessionFromRedirect();
} catch (FacebookRequestException $ex) {
    var_dump($ex);
} catch (Exception $ex) {
    var_dump($ex);
}

/* if user cancel the permission */
if (isset($_REQUEST['error'])) {
    header("Location: http://xx.xx.xx.xx/");
}

if (isset($session)) {

    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    $graphObject = $response->getGraphObject();

    $fbData = array();
    $fbData['fb_id'] = $graphObject->getProperty('id');
    $fbData['email'] = $graphObject->getProperty('email');
    $fbData['sex'] = $graphObject->getProperty('gender');
    $fbData['first_name'] = $graphObject->getProperty('first_name');
    $fbData['last_name'] = $graphObject->getProperty('last_name');
    $fbData['fb_link'] = $graphObject->getProperty('link');
    $fbData['fb_locale'] = $graphObject->getProperty('locale');
    $fbData['fb_timezone'] = $graphObject->getProperty('timezone');
    $fbData['fb_last_update'] = $graphObject->getProperty('updated_time');
    $fbData['fb_verified'] = $graphObject->getProperty('verified');

    $request2 = new FacebookRequest($session, 'GET', '/me/picture', array('redirect' => false, 'height' => '200', 'type' => 'normal', 'width' => '200',));
    $response2 = $request2->execute();
    $graphObject2 = $response2->getGraphObject();

    $fb_url_profile_picture = $graphObject2->getProperty('url');
    $fbData['fb_profile_picture'] = $fb_url_profile_picture;

    /* SAVE DATA */

    
} else {
    header("Location: " . $helper->getLoginUrl(array('email', 'user_friends', 'public_profile')));
}