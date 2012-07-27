
<html>
    <head>
        <title></title>
        <script>
           function submit_form1()
           {
              document.forms["ff1"].submit();
           }
            function submit_form2()
           {
              document.forms["ff2"].submit();
           }
          
         </script>
       <style type="text/css">
            body{
                padding: 0px;
                margin: 0px;
                             
            }
            #layout{
                width:800px;
                background-color: #D0D0D0;
                margin:0px auto;
                                   
                                        
            }
            #header{
                height:100px;
                background-color:#ccccff;
                text-align: center;
              
            }
            .container{
                 background-color: #D0D0D0;
                 height: auto;
                              
            } 
            #nav{
                width:150px;
                height: auto;
                float: left;
                background-color: #ccc;
            }
              #content{
               width:650px;
               background-color: #FFF;
               float: left;
                              
                     
            }
            #content table{
                width: 650px;
                
            }
            
        </style>
    </head>
    <body>
        
        <div id="layout">
            <div id="header">
                <h3> Admin Panel</h3>
            </div>
            <div class="container">
            <div id="nav">
                
       
            <br/>
            <?php      
            
                $attributes = array('name' => 'ff1','id' => 'ff1');
                echo form_open('shop/admin_panel',$attributes)
            ?>
            
              <input type="hidden" name="first" value="all_item">
              <a href="javascript:submit_form1()">
                  <ul type="none" ><li name="all_item">All item list</li></ul>
              </a>
              <br />
                  
            <?php
                echo form_close();
            ?>
             
            <?php      
                $attributes = array('name' => 'ff2','id' => 'ff2');
                echo form_open('shop/admin_panel',$attributes)
            ?>
                <input type="hidden" name="second" value="add_item">
                <a href="javascript:submit_form2()">
                    <ul type="no"><li>Add new item</li></ul>
                </a><br />
             
            <?php
                echo form_close();
            ?>
             
            </div>
            <div id="content">
                <?php
                     
                    if($this->input->post('first'))
                    {
                        require_once('item_list.php');
                    } 
                    else if($this->input->post('second'))
                    {
                        require_once('add_item.php');
                    }
                    
                 else  if($item_id!=='unset')
                   {
                       require_once('edit_item.php');
                   }
                   else
                    {
                        require_once('item_list.php');
                 
                    }
                    
                ?>
            </div>
                <div style=" clear: both"></div>
                </div>
        </div>
      
    </body>
       
</html>
