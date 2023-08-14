<?php
include 'process.php';


?>

<htmml>


  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="password-strength-indicator.css">
    <link rel="stylesheet" href="style2.css">
  </head>

  <body style="height:135%;">
    <!--?php$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) ?-->
    <div class="container" style="
    margin-left:40%;      
   position: absolute;
    background: #fff;
    padding: 20px 30px;
    width: 420px;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    top: 20px;">
      <h1 style="text-align:center;">REUP MARKET</h1>

    </div>

    <div class="container" style="
    margin-left: 40%; 
    margin-top: 187px;
    /* height: 70%; */
    background: #fff;
    padding: 20px 30px;
    width: 420px;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);">


      <h4 style="text-align:center;">Register Your Account </h4>
      <form method="post" action="register.php" id="register_form" style="
   padding-bottom: 382px;
">

        <div class="" style="text-align:center;">
          <div <?php if (isset($name_error)) : ?> class="form_error" <?php endif ?>>
            <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text" name="username" placeholder="Username" id="Username" value="">
            <ul style="list-style-type: none; ">
              <li>
                <?php if (isset($name_error)) : ?>
                  <span class="error"><?php echo $name_error; ?></span>
                <?php endif ?>
              </li>
            </ul>
          </div>
          <div class="">


            <div class="">
              <div <?php if (isset($password_error)) : ?> class="form_error" <?php endif ?>>
                <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password" name="userPassword" placeholder="Password" id="userPassword" value="">
                <ul style="list-style-type: none;  ">
                  <li>
                    <?php if (isset($password_error)) : ?>
                      <span class="error"><?php echo $password_error; ?></span>
                    <?php endif ?>
                  </li>
                </ul>
              </div>

              <div <?php if (isset($confirmPassword_error)) : ?> class="form_error" <?php endif ?>>
                <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password" name="confirmPassword" placeholder="Confirm Password" id="password" value="">
                <ul style="list-style-type: none;  ">
                  <li>
                    <?php if (isset($confirmPassword_error)) : ?>
                      <span class="error"><?php echo $confirmPassword_error; ?></span>
                    <?php endif ?>
                  </li>
                </ul>
              </div>

              <div <?php if (isset($pin_error)) : ?> class="form_error" <?php endif ?>>
                <input style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text" name="pin" placeholder="4 character pin" id="pin" value="">
                <ul style="list-style-type: none;  ">
                  <li>
                    <?php if (isset($pin_error)) : ?>
                      <span class="error"><?php echo $pin_error; ?></span>
                    <?php endif ?>
                  </li>
                </ul>
              </div>


              <script type="text/javascript">
                $('form').on('submit', function(e) {
                  e.preventDefault();
                  var text = $('#role').find(":selected").text();
                  $('input[name="option_text"]').val(text);
                  $('form').submit();
                });
              </script>
              <div class="custom-select" style="width:200px;">
                <select id="account_role" name="account_role" style="
    position: absolute;
    width: 10%;
    margin-left: 10px;
    border: 1px solid lightgrey;
    padding-left: 15px;
    outline: none;
    border-radius: 5px;
    margin-top: 170px;
    font-size: 15px;
     ">
                  <option value="Buyer">Buyer</option>
                  <option value="Vendor">Vendor</option>
                </select>
                <input type='hidden' name="option_text" value=''>
                <div style="text-align:center;">

                  <button type="submit" name="register" id="reg_btn" style="    padding: 10px 25px 8px;
    position:absolute; 
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 50px;
    cursor: pointer;
    margin-left:30px;
    margin-top:300px;
    height:40px;
    float: left;
    display: flex;">Register</button>
                  <a href="login.php"><button type="button" name="login" id="login_btn" style=" padding: 10px 25px 8px;
    margin-left: 67px;
    position: absolute;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 300px;
    cursor: pointer;
    display: inline-block;
    position: absolute;">Login</button></a>
      
   
                </div>
              </div>
            </div>
            <a href="login.php"><button type="button" name="back" id="back_btn" style=" padding: 10px 25px 8px;
    margin-left: 67px;
    position: absolute;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 300px;
    cursor: pointer;
    display: inline-block;
    position: absolute;">Back</button></a>
      </form>
    </div>

    </form>

  </body>

  </html>