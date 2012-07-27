<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Shop</title>
	<meta charset="UTF-8">
	<style type="text/css">
		
	</style>
    <script>
        
     function close_itself(){
   // location.href=''+arg;
   var username=document.getElementById('username').value;
   var password=document.getElementById('password').value;
 
   window.opener.location.href = 'http://192.168.1.208/pradeep.kumar/cisc/index.php/shop/validate_login/'+username+'/'+password;
    self.close();
         //alert('');    
  }
        
    </script>    
</head>
<body>
    <?php
    
    $js = 'onClick="close_itself()"';
     echo form_open('shop/');
        
        $data1 = array(
              'name'        => 'username',
              'id'          => 'username',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

       $data2 = array(
              'name'        => 'password',
              'id'          => 'password',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
   
        $this->table->add_row(array(form_label('Username'), form_input($data1)));
        $this->table->add_row(array(form_label('Password'), form_password($data2)));
        $this->table->add_row(array(form_submit('login', 'Login',$js)));
        echo $this->table->generate(); 
        echo form_close();
        ?>
        
<?php
    ?>
</body>
</html>