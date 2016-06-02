<?php
$name = $_POST['name'];
$password = $_POST['password'];
if(!isset($_POST['name'])&&!isset($_POST['password']))
{
//Visitor needs to enter a name and password
?>
<!-- <form class="login" action="auth.php" method="post">
  <label for="username">
    <input type="text" name="name" value="" id="username" placeholder="Username">
  </label>
  <label for="password">
    <input type="password" name="name" value="" id="password" placeholder="Password">
  </label>
  <label for="login-btn">
    <input type="button" name="name" value="Login" id="login-btn">
  </label>
</form> -->
<?php
}
else
{
// connect to database server
$mysql = mysqli_connect( 'http://86.96.194.194', 'webauth', 'webauth' );
if(!$mysql)
{
echo 'Can'/'t connect..';
exit;
}
// select the database
$selected = mysqli_select_db( $mysql, 'auth' );
if(!$selected)
{
echo 'Can'/'t select database.';
exit;
}
// query the database to see if there is a record which matches
$query = "select count(*) from authorised_users where
name = '$username' and
password = sha1('$password');
$result = mysqli_query( $mysql, $query );
if(!$result)
{
  echo 'Can'/'t run query.';
  exit;
}
$row = mysqli_fetch_row( $result );
$count = $row[0];
if ( $count > 0 )
{
  // visitor's name and password combination are correct
  echo '<h1>Welcome</h1>';
  // echo 'Enjoy.';
}
else
{
  // visitor's name and password are not correct
  echo '<h1>Login failed..</h1>';
  echo 'Please check the values you entered..';
}
}
?>
