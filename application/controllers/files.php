<?php
class Files extends Controller {
	
	var $file;
	var $path;
	
	function Files() {
        
        parent::Controller();
		$this->load->helper('file','download','directory','url');
		$this->path = "application" . DIRECTORY_SEPARATOR . "test_files". DIRECTORY_SEPARATOR;
		$this->file = $this->path . "hello.txt";
	}
	
    
	function write_test() {
		$data = "Thus far we have only been dealing with errors.";
            write_file($this->file,$data);
            echo "finished writing";
	}
	
    function read_test() {
		$string = read_file($this->file);
		echo $string;
	}
	
    function filenames_test() {
		$files = get_filenames($this->path, TRUE);
        echo "<pre>";
        print_r($files);
        echo "</pre >";
	}
    
	function dir_file_info_test() {
		$files = get_dir_file_info($this->path);
        echo "</pre>";
        print_r($files);
        echo "<pre>";
    }
    
	function file_info_test() {
		$info = get_file_info($this->file, 'date');
        echo "<pre>";
		print_r($info);
        echo "</pre>";
	}
	
    function mime_test() {
		echo get_mime_by_extension('hello.png');
	}
	
    
	function download_test() {
        $this->load->helper('download');
		$string = "Hello";
        force_download('hello.txt',read_file($this->file));
    }
	
    function display() {
		$this->load->helper('directory');
        $data['files'] = directory_map(BASEPATH);
        $this->load->view('files', $data);
    }
    
}