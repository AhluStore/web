<?php
//print_r($capcha);
    $form= ArrayMe::array_insert_after("password",$form,"newPassword",array("type"=>"password","value"=>""));
    $form= ArrayMe::array_insert_after("username",$form,"sex",array("type"=>"select","value"=>array(""=>"--Sex--","mr"=>"Male","ms"=>"Female")));

    //insert capcha
    if(array_key_exists("role",$form)){
        $form["role"]["type"] = "hidden";
        $form["role"]["value"]="customer";
    }
    if(array_key_exists("email",$form)){
        $form["email"]["class"]="customer";
    }
    if(array_key_exists("passwordCode",$form)){
        unset($form["passwordCode"]);
    }
?>                                       
<div class="wrapper">
 <div class="content_package_part form_register">                                                          
   <form method="post" action="#" name="form_register_field" class="form_register_field" id="form_register_field">
   <p>Register</p>
   <p class="message_user" style="color:blue;"></p>
   <?php
      foreach($form as $k=>$v){
          if($v["type"]!="select"){
                 if($v["type"]!="hidden"){
                     ?>
                    <p><span><?php echo ucfirst($k);?>: </span> <input title="<?php echo $k=="email"? "Please Enter your email" : "Please Enter the field"; ?>" class="<?php echo $k=="email"? "required email" : "required"; ?>" type="<?php echo $v["type"];?>" value="<?php echo $v["value"];?>" id="<?php echo $k;?>" name="<?php echo $k;?>" size="40px" /></p>   
                 <?php
                 }else{
                 ?>
                    <p><input  type="<?php echo $v["type"];?>" value="<?php echo $v["value"];?>" id="<?php echo $k;?>" name="<?php echo $k;?>" />
                 <?php
                 }
          }else{
              ?>
                <p><span><?php echo ucfirst($k);?>: </span><?php echo form_dropdown('sex', $v["value"],'0','id="sex" class="required" title="Please choose your sex"'); ?></p>
            <?php
          }
      }
   ?>
   <p id="capcha" class="<?php echo strtolower($capcha["word"]); ?>"><span>Capcha: </span><input type="text" value="" size="15" /><?php echo $capcha["image"] ;?> </p>   
   <p><input type="submit" id="register_user" class="button_readmore" value="Register"> </p>
   </form>
 </div>
</div>
   