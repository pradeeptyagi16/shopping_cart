<?php
class Test extends Controller {
	
    function index() 
    {
        $this->load->library('encrypt');
    }
    function md5_test($var)
    {
        echo md5($var);
    }
    
    function sha1_test($param)
    {
        echo sha1($param);
    }
    
    function md5_with_key($msg)
    {
        $this->load->library('encrypt');
        $encode_str= $this->encrypt->encode($msg,$this->config->item('encryption_key'));
        echo $encode_str."<br/>";
        $decode_str=$this->encrypt->decode('rio1gJETvNzunPoGs2sOmylcvsfwhqJX2Sbx+ht6pAFy7eRf1Kid1AxCWt2FGtBQG/A9McFqWipoHr6Tm0qGfGmF66/G0ld2s9oyYlIeTA+YT6JVRseWb3RoKE//SfHa',$this->config->item('encryption_key'));
        echo $decode_str;
    }
    
}
