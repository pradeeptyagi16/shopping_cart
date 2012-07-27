<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Edit item</title>
	<meta charset="UTF-8">
	<style type="text/css">
        
        #product_edit{
            background-color: #f7efef;
            
        }
		
	</style>
    <script>
      
        
    </script>    
</head>
<body>
    <div id="product_edit">
    <?php
   
        echo form_open_multipart('shop/edit_item/');
        $tmpl = array ( 'table_open'  => '<table border="0" cellpadding="2" cellspacing="1" class="mytable" style="text-align:left">' );
        $results = $this->db->get_where('products', array('id' => $item_id))->result();
		$result = $results[0];
        if ($result->option_values) {
			$result->option_values = explode(',',$result->option_values);
		}
		?> 
        <input type="hidden" name="item_id" id="item_id" value="<?php echo $item_id; ?>">
        <?php
        
        $this->table->set_template($tmpl); 
        $data1 = array(
              'name'        => 'name',
              'id'          => 'name',
              'value'=>$result->name,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:25%',
        );

       $data2 = array(
              'name'        => 'price',
              'id'          => 'price',
              'value'=>$result->price,
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
         
         if($result->option_name)
         { 
             $option_name=$result->option_name;
             $option_values=implode(',', $result->option_values);
         }
         else
         {
             $option_name='';
             $option_values='';
         }
       $data4 = array(
          'name'        => 'option_name',
          'id'          => 'option_name',
          'value'=>$option_name,
          'maxlength'   => '100',
          'size'        => '50',
          'style'       => 'width:25%',
        );
        $data5 = array(
          'name'        => 'option_values',
          'id'          => 'option_values',
          'value'=>$option_values,
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
           echo form_upload('userfile');
       echo br(3);
//        $this->table->add_row(array(form_label('Name'), form_input($data1)));
//        $this->table->add_row(array(form_label('Prince'), form_input($data2)));
//     $this->table->add_row(array(form_label('Image'), form_upload('userfile')));
//        $this->table->add_row(array(form_label('Option name'), form_input($data4)));
//        $this->table->add_row(array(form_label('Option values'), form_input($data5)));
//     
//        
        
        
        echo form_submit('update', 'update');
        	echo br(2);

   //   echo $this->table->generate(); 
        echo form_close();
        ?>
        
<?php
?>
        </div>
</body>
</html>