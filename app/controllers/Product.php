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
    if($this->form_validation->submitted()) {
    $this->form_validation
        ->name('product_name')
            ->required()
            ->alpha()
        ->name('product_desc')
            ->required()
            ->max_length(200);

    if ($this->form_validation->run()) {
        
        $data = [
            'product_name' => $this->io->post('product_name'),
            'product_desc' => $this->io->post('product_desc')
        ];

        if($this->form_validation->run()) {
            $product_name = $this->io->post('product_name');
            $product_desc = $this->io->post('product_desc');

            if($this->product_model->create($product_name, $product_desc)){

            set_flash_alert('success', 'Product created successfully');
            redirect('product/add');
        }

        } else {
            set_flash_alert('danger', $this->form_validation->errors());    
            redirect('product/add');
        }
    }
    }

    $this->call->view('product/create');
    }


    public function update($id) {
        if($this->form_validation->submitted()) {
            $this->form_validation
                ->name('product_name')
                    ->required()
                    ->alpha()
                ->name('product_desc')
                    ->required()
                    ->max_length(200);
        
            if ($this->form_validation->run()) {
                
                $data = [
                    'product_name' => $this->io->post('product_name'),
                    'product_desc' => $this->io->post('product_desc')
                ];
        
                if($this->form_validation->run()) {
                    $product_name = $this->io->post('product_name');
                    $product_desc = $this->io->post('product_desc');
        
                    if($this->product_model->update($product_name, $product_desc, $id)){
        
                    set_flash_alert('success', 'Product updated successfully');
                    redirect('product/display');
                }
        
                } else {
                    set_flash_alert('danger', $this->form_validation->errors());    
                    redirect('product/display');
                }
            }
            }

        $data['p'] = $this->product_model->get_one($id);
        $this->call->view('product/update', $data);
    }

    public function delete($id) {
        if($this->product_model->delete($id)) {
            set_flash_alert('success', 'Product Deleted successfully');
            redirect('product/display');
        } else {
            set_flash_alert('danger', 'Something went wrong');    
            redirect('product/display');
        }
    }

}

?>
