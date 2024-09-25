<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('product_model');
    }
	
    public function read() {
        $data ['prod'] = $this->product_model->read(); 
        $data ['name'] = "LavaLust Framework";
        $this->call->view('product/display', $data);
    }

    public function create() {

        if($this->form_validation->submitted()){
        $this->form_validation
            ->name('product_name')
                -required()
                ->alpha()
            ->name('product_desc')
                ->required()
                ->max_length(200);
        if($this->form_validation->run()) {
            $product_name = $this->io->post('product_name');
            $product_desc = $this->io->post('product_desc');
    
            if($this->product_model->create($product_name, $product_desc));
            set_flash_alert('success', 'Product created successfully');
            redirect('product/add');
        }
        }  else {
            set_flash_alert('success', 'Product created successfully');
            redirect('product/add');
        }

        $this->call->view('product/create');
    }
}
?>
