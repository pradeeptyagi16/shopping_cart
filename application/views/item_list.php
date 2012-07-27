
<?php
   $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable" style="text-align:center">' );

        $this->table->set_template($tmpl); 
        $this->table->set_heading('Item no.','Name','Price','Image','Option name','Option value','Update','Remove');
    $results = $this->db->get('products')->result();
    if($results){
     
     
        
        $itemno=1;
         foreach($results as $item)
            {
              if($item->option_name)
              {
               $op_name=$item->option_name;
               }else
               {
                   $op_name='-';
               }
              if($item->option_values)
              {
               $op_values=$item->option_values;
               }else
               {
                   $op_values='-';
               }
               $id=$item->id;
               $href_path="http://192.168.1.208/pradeep.kumar/cisc/shop/admin_panel/".$id;
               $href_path2="http://192.168.1.208/pradeep.kumar/cisc/shop/delete_item/".$id;
             $this->table->add_row($itemno,$item->name,'$'.$item->price, img(array(
				'src' => 'img/' . $item->image,
				'class' => 'thumb',
				'alt' => $item->image,
                 'height'=>'67',
                 'width'=>'67'
			)),$op_name,$op_values,'<a href="'.$href_path.'">edit</a>','<a href="'.$href_path2.'">delete</a>');
             $itemno=$itemno+1;
        
            }
            echo $this->table->generate();
            }else {
                     echo $this->table->generate();
                echo br(4);
                echo 'record not found';
            }
?>
