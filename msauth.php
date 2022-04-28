<?php

$appid = "26bc6208-a311-439c-b604-bac4c7868b1a";
$tennantid = "e1b43892-9a7c-4e7b-9794-d24014da6f25";
$secret = "~lH8Q~gxqNugqPrUGh~JKXsHPwk3XaEwynoOGdbd";
$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";

session_start ();
$_SESSION['state']=session_id();
echo "<h1>MS OAuth2.0 Demo </h1><br>";

if (isset ($_SESSION['msatg'])){
    echo "<h2>Authenticated ".$_SESSION["uname"]." </h2><br> ";
    echo '<p><a href="?action=logout">Log Out</a></p>';
} //end if session

else   echo '<h2><p>You can <a href="?action=login">Log In</a> with Microsoft</p></h2>';

if ($_GET['action'] == 'login'){
    $params = array ('client_id' =>$appid,
        'redirect_uri' =>'https://casestory.savethechildren.net.ph/msauth.php',
        'response_type' =>'token',
        'scope' =>'https://graph.microsoft.com/User.Read',
        'state' =>$_SESSION['state']);
    header ('Location: '.$login_url.'?'.http_build_query ($params));
}

echo '
<script> url = window.location.href;
i=url.indexOf("#");
if(i>0) {
    url=url.replace("#","?");
    window.location.href=url;}
</script>
';

if (array_key_exists ('access_token', $_GET))
 {
   $_SESSION['t'] = $_GET['access_token'];
   $t = $_SESSION['t'];
$ch = curl_init ();
curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Authorization: Bearer '.$t,
                                            'Conent-type: application/json'));
curl_setopt ($ch, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$rez = json_decode (curl_exec ($ch), 1);
//print_r($rez);
if (array_key_exists ('error', $rez)){  
 var_dump ($rez['error']);    
 die();
}
else  {
    $_SESSION['msatg'] = 1;  //auth and verified
    $_SESSION['uname'] = $rez["displayName"];
    $_SESSION['pname'] = $rez['userPrincipalName'];
    $_SESSION['id'] = $rez["id"];
}

curl_close ($ch);
   header ('Location: https://casestory.savethechildren.net.ph/msauth.php');
}


if ($_GET['action'] == 'logout'){
   unset ($_SESSION['msatg']);
   header ('Location: https://casestory.savethechildren.net.ph/msauth.php');
}