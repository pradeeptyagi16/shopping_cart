<?php
class Shop extends Controller {
    
    
function index() {
    
    $this->load->model('Products_model');
    $data['products'] = $this->Products_model->get_all();
    $this->load->view('products', $data);
}



function add() {
    $this->load->model('Products_model');
    $product = $this->Products_model->get($this->input->post('id'));
    $insert = array(
        'id' => $this->input->post('id'),
        'qty' => $this->input->post('quantity'),
        'price' => $product->price,
        'name' => $product->name
    );
    if ($product->option_name) {
        $insert['options'] = array(
            $product->option_name => $product->option_values[$this->input->post($product->option_name)]
        );
    }
    $this->cart->insert($insert);
    redirect('index.php/shop');
}


function remove($rowid) {
    $this->cart->update(array(
        'rowid' => $rowid,
        'qty' => 0
    ));
    redirect('index.php/shop');
}


function update($rowid,$newqyt) 
{
    $this->cart->update(array(
        'rowid' => $rowid,
        'qty' => $newqyt
    ));
    redirect('index.php/shop');

}


function admin_login()
{
    $this->load->view('admin_login');
}

function validate_login($username,$password){
  $limit=1;  
  $query = $this->db->get_where('user', array('name' => $username,'password'=>$password), $limit);


$this->session->set_userdata($newdata);
    if($query->result())
    {
        redirect('index.php/shop/admin_panel');
    }else {
        echo 'record not found';
    }

}

//function for admin panel
function admin_panel($id='')
{
    
    if($id){
        $data['item_id']=$id;
        
    }else
    {
        $data['item_id']='unset';
    }
    $this->load->view('admin_view',$data);
    
   
}

    function edit_item()
    {
        
        if(isset($_POST['update']))
        {
            $id=$this->input->post('item_id');
            $name=$this->input->post('name');
            $price=$this->input->post('price');
            if($_POST['option_name']!=='' || $_POST['option_name']!==NULL)
            {
                $option_name=$this->input->post('option_name');
                $option_values=$this->input->post('option_values');
            }
            else
            {
                $option_name='';
                $option_values='';
            }
         $image_name1='';
            if($_FILES['userfile']['name'])
            {
              
             $image_name1=$_FILES['userfile']['name'];
             $config = array(
                    'allowed_types' => 'jpg|jpeg|gif|png',
                    'upload_path' => 'img/',
                    'max_size' => 2000,
                    'width'  => '100',
                    'height'  => '100'
                    );

                $this->load->library('upload', $config);
                $this->upload->do_upload();
               
            }
            else
            {
                  $result = $this->db->get_where('products', array('id' => $id),'1')->result();
                  $image_name1=$result[0]->image;
            }
            
            $data = array(
                   'name' => $name,
                   'price' => $price,
                   'image' => $image_name1,
                   'option_name'=>$option_name,
                   'option_values'=>$option_values
    
                 );

                $this->db->where('id', $id);
                if($this->db->update('products', $data))
                {
                    redirect('index.php/shop/admin_panel');
                } 
            
       
           
        }
   }
function delete_item($id)
{
    if($this->db->delete('products', array('id' => $id)))
    {
    redirect('index.php/shop/admin_panel');
        
    }
}
function add_item()
{
   // print_r($_FILES);die;
    $name=$this->input->post('name');
    $price=$this->input->post('price');
   if($_POST['option_name']!=='' || $_POST['option_name']!==NULL)
    {
        $option_name=$this->input->post('option_name');
        $option_values=$this->input->post('option_values');
    }
    else
    {
        $option_name='';
        $option_values='';
    }

       if($_FILES['image']['name'])
        {

            $image_name1=$_FILES['image']['name'];
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => 'img/',
                'max_size' => 2000,
                'width'  => '100',
                'height'  => '100'
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $data = array(
               'name' => $name ,
               'price' => $price ,
                'image'=>$image_name1,
               'option_name' => $option_name,
                'option_values' => $option_values,
            );

            if($this->db->insert('products', $data))
            {
                redirect('index.php/shop/admin_panel');
            }
        }else{
            redirect('index.php/shop/admin_panel');
  
        }
            
            
            
}

}
