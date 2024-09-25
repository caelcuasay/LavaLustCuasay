<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product_model extends Model {
	
    public function read(){
       return $this->db->table('products')->get_all();
    }

    public function create($product_name, $product_desc){
        $data = array(
            'product_name' => $product_name,
            'product_desc' => $product_desc,
        );

        return $this->db->table('products') ->insert($data);
    }
}
?>
