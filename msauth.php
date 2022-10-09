<?php

require 'db.php';
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM settings;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$appid = $row['client_id'];
$tennantid = $row['tenant_id'];
$secret = $row['secret'];
$conn->close();
$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";

session_start ();
$_SESSION['state']=session_id();
//echo "<h1>MS OAuth2.0 Demo </h1><br>";

if (isset ($_SESSION['msatg'])){
    setcookie('gatherer', $_SESSION["uname"], time() + (86400 * 30), "/"); // 86400 = 1 day
    if (isset ($_COOKIE['mobile'])){
        header("Location: cases_list_m.php");
    } else {
        header("Location: ../");
    }
    
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <meta charset="UTF-8">
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
        <link rel="stylesheet" type="text/css" href="login/css/main.css"> -->
    </header>
    <body style="background-color: url('https://wallpaper.dog/large/987479.jpg');">
        <!-- <div class="container-login100" style="background-image: url('https://media.istockphoto.com/vectors/cute-boys-and-girls-holding-hands-and-dancing-around-the-world-vector-id1159732711?k=20&m=1159732711&s=612x612&w=0&h=oLvndRqejvFXumo9HVs2p-g4PO55ZNsEpI9lglRyhEo=');">
            <?php echo '<a href="?action=login"><img src="login/images/mslogin.png"></a></h2>'; ?>
        </div> -->
        <div class='row'>
            <div class='col-sm-4'>&nbsp;</div>
            <div class='col-sm-4'>
                <div class='container'>
                    <br><h2>Sign In</h2>
                    <div class="card">
                        <div class="card-body">
                            <form action='login/index.php'>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form2Example1" class="form-control" name="username"/>
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form2Example2" class="form-control" name="pass"/>
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                </div>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>- or -</p>
                                </div>

                                <div class="d-grid">
                                    <?php echo '<a class="btn btn-dark btn-block mb-4" href="?action=login"><img src="ms_icon.png" height="22"> Sign in with Microsoft</a></h2>'; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>&nbsp;</div>
        </div>
    </body>
</html>