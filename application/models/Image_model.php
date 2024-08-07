<?php
class Image_model extends CI_Model {

    public function insert_image($image_name, $image_path) {
        $data = array(
            'image_name' => $image_name,
            'image_path' => $image_path
        );

        $this->db->insert('tbl_product_images', $data);
    }
}
