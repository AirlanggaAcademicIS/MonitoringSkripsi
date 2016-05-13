<?php require_once('Connections/koneksi.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUser'])) {
  $loginUsername=$_POST['txtUser'];
  $password=md5($_POST['txtUser']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "sukses.php";
  $MM_redirectLoginFailed = "gagal.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_koneksi, $koneksi);
  
  $LoginRS__query=sprintf("SELECT id, password FROM user WHERE id='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="500" height="100" border="10">
  <tr>
    <th width="140" scope="row">Username</th>
    <td width="326"><form id="" name="" method="POST" action="<?php echo $loginFormAction; ?>">
      <label>
        <input name="txtUser" type="text" id="txtUser" />
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <th scope="row">Password</th>
    <td><form id="txtPass" name="txtPass" method="post" action="">
      <label>
        <input type="password" name="textfield" />
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><form id="form1" name="form1" method="post" action="">
      <label>
        <input name="btnLogin" type="submit" id="btnLogin" value="Log in" />
        </label>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
