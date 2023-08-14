
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .error {
      color: red;
      display:inherit;
    }
</style>
<body>
<div class="" style="

">
<div class="login-head-container" style="
    

">

<div class="header-title" style="
    text-align: center;
    "><h1>MARKET</h1></div>
    </div>

</div>
<div class="form" style=" 
    width: 300px;
    margin: 0 auto;
    border: solid 1px black;
    text-align: center;
    margin-top: 15%;
    height:60%;
    overflow: hidden;
">
    <form method="post" action="registration5.php" id="register_form">
    <?php include ('config.php') ?>
<html>
  	<h1>Register</h1>

  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
	  <?php if (isset($name_error)): ?>
     
	  <?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="email" name="email" placeholder="Email (optional)" value="<?php ?>" >
      <?php if (isset($email_error)): ?>
      	<span class="error"><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
   
      <div <?php 
      if (isset($password_error)): ?> class="form_error" <?php endif ?> >
      <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password"  placeholder="Password" name="password" value="<?php echo $password; ?>" required>
      <?php if (isset($password_error)): ?>
      	<span class="error"><?php echo $password_error; ?></span>
      <?php endif ?>
  	</div>
    <!-- <div>
  		<input type="password"  placeholder="Password" name="password">
  	</div> -->
    <div>
  		<input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password"  placeholder="Confirm Password" name="confirmPassword" required>
  	</div>
     <div>
    <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text"  placeholder="Pin" name="pin" required>
  	</div>

    <script type="text/javascript">
    $('form').on('submit', function(e){
        e.preventDefault();
        var text = $('#role').find(":selected").text();
        $('input[name="option_text"]').val(text);
        $('form').submit();
    });
</script>

<div>
<div class="custom-select" style="">
  <select id="account_role" name="account_role" style="
    position:absolute;
    width:11%;
    margin-left:-102px;
    border: 1px solid lightgrey;
    padding-left: 15px;
    outline: none;
    border-radius: 5px;
    font-size: 15px;
    transition: all 0.3s;
    margin-top:20px;
     ">
    <option value="Buyer">Buyer</option>
    <option value="Vendor">Vendor</option>
    </select>
    <input type='hidden' name="option_text" value=''>
  </div>
    
  	<div>
        <button type="submit" name="register" id="reg_btn" style="    padding: 10px 25px 8px;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 170px;
    cursor: pointer;">Register</button>
        <a href="login.php"><button type="button" name="register" id="reg_btn" style="    padding: 10px 25px 8px;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 170px;
    cursor: pointer;">Login</button></a>
    
        </div>
  	</div>
      </div>
      <? } ?>
  </form>
      </body>
</html>