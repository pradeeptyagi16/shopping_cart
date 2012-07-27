<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Edit item</title>
	<meta charset="UTF-8">
	<style type="text/css">
        #product_add{
            background-color: #f7efef;
            
        }
		
	</style>
    <script>
      function validate()
      {
          var name=document.getElementById('name').value;
          var price=document.getElementById('price').value;
          var image=document.getElementById('image').value;
          //alert(name);
            document.getElementById('name2').innerHTML='';
            document.getElementById('price2').innerHTML='';
//          var image=document.getElementById('image').value;
            var flag='';
          if(name=="" || name==null ){
              
              document.getElementById('name2').innerHTML='Name field is required.<br />';
          }else{
              flag+="name";
          }
          if(price=="" || price==null){
             
              document.getElementById('price2').innerHTML='Price field is required.<br />';
          }else{
               flag+="price";
          }
          if(image=="" || image==null){
               document.getElementById('image2').innerHTML='Image field is required.<br />';
          }else{
              flag+="image";
          }
          if(flag=="namepriceimage"){
              document.forms['myform'].submit();
          }
          
          
          
      }
        
    </script>    
</head>
<body>
    <div id="product_add">
    <?php
   echo validation_errors();
   $attributes = array('class' => 'myform', 'id' => 'myform');
        echo form_open_multipart('shop/add_item/',$attributes);
        $tmpl = array ( 'table_open'  => '<table border="0" cellpadding="2" cellspacing="1" class="mytable" style="text-align:left">' );
       
		?> 
        <div id="name2">
           
        </div>
         <div id="price2">
        </div>
        <div id="image2">
        </div>
         
<!--        <input type="hidden" name="item_id" id="item_id" value="<?php //echo $item_id; ?>">-->
        <?php
        
        $this->table->set_template($tmpl); 
        $data1 = array(
              'name'        => 'name',
              'id'          => 'name',
              'value'=>'',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:25%',
        );

       $data2 = array(
              'name'        => 'price',
              'id'          => 'price',
              'value'=>'',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:25%',
            );
         $data3 = array(
              'name'        => 'image',
              'id'          => 'image',
              'maxlength'   => '100',
              'size'        => '24',
              'style'       => 'width:25%',
            );
      
       $data4 = array(
          'name'        => 'option_name',
          'id'          => 'option_name',
          'value'=>'',
          'maxlength'   => '100',
          'size'        => '50',
          'style'       => 'width:25%',
        );
        $data5 = array(
          'name'        => 'option_values',
          'id'          => 'option_values',
          'value'=>'',
          'maxlength'   => '100',
          'size'        => '50',
          'style'       => 'width:25%',
        );
       echo br(1);
       echo form_label('Name');
       echo nbs(19   );
       echo form_input($data1);echo br(2);
       echo form_label('Price');
       echo nbs(20);
       echo form_input($data2);echo br(2);
       echo form_label('Option name');
       echo nbs(8);
       echo form_input($data4);echo br(2);
       echo form_label('Option values');
       echo nbs(7);
       echo form_input($data5);echo br(2);
       //echo nbs(13);   
       echo form_label('Image');
       echo nbs(20);    
           //echo form_upload('userfile');
       ?>
        <input type="file" id="image"  name="image">
       <?php
       echo br(3);
//        $this->table->add_row(array(form_label('Name'), form_input($data1)));
//        $this->table->add_row(array(form_label('Prince'), form_input($data2)));
//     $this->table->add_row(array(form_label('Image'), form_upload('userfile')));
//        $this->table->add_row(array(form_label('Option name'), form_input($data4)));
//        $this->table->add_row(array(form_label('Option values'), form_input($data5)));
//     
//        
        
        $js = 'onClick="validate()"';
        echo form_button('save', 'Save', $js);
        echo nbs(10);
        echo form_reset('reset','Reset');
        	echo br(2);

   //   echo $this->table->generate(); 
        echo form_close();
        ?>
        
<?php
?>
        </div>
</body>
</html>
