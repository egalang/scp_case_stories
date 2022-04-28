<?php

$appid = "40aa6ca1-881c-43f1-9678-59ab33e5adf7";
$tennantid = "fcb15f07-e2b0-4a30-93e8-928a0ff1e25c";
$secret = "SD08Q~CusVSncHnYFqMMlZ3HMYno9BKyWusJ-aoq";
$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";

session_start ();
$_SESSION['state']=session_id();
//echo "<h1>MS OAuth2.0 Demo </h1><br>";

if (isset ($_SESSION['msatg'])){
    setcookie('gatherer', $_SESSION["uname"], time() + (86400 * 30), "/"); // 86400 = 1 day
    header("Location: ../");
    //echo "<h2>Authenticated ".$_SESSION["uname"]." </h2><br> ";
    //echo '<p><a href="?action=logout">Log Out</a></p>';
} //end if session

//else   echo '<h2><p>You can <a href="?action=login">Log In</a> with Microsoft</p></h2>';

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
   setcookie("gatherer", "", time() - 3600);
   header ('Location: https://casestory.savethechildren.net.ph/msauth.php');
}
?>
<html>
    <head>
        <title>Save the Children Philippines - Case Stories</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="login/css/util.css">
        <link rel="stylesheet" type="text/css" href="login/css/main.css">
    </header>
    <body>
        <div class="container-login100" style="background-image: url('https://www.savethechildren.org.ph/__resources/webdata/images/pages/8_og_.jpg');">
            <?php echo '<a href="?action=login"><img src="login/images/mslogin.png"></a></h2>'; ?>
        </div>
    </body>
</html>