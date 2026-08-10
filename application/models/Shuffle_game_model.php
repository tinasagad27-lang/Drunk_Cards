<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shuffle_game_model extends CI_Model {

    public function getAllCards() {
        return $this->db->get('cards')->result_array();
    }

    public function insertCard($data) {
        $this->db->insert('cards', $data);
    }

    public function deleteCard($id) {
        $this->db->where('id', $id);
        $this->db->delete('cards');
    }
    public function getShuffledCards($category) {
        $this->db->where('category', $category);
        $this->db->order_by('RAND()'); // Randomize the order
        return $this->db->get('cards')->result_array();
    }
    public function get_next_question($category)
{
    $this->db->where('category', $category);
    $this->db->order_by('id', 'RANDOM'); // Fetch random question from the same category
    $this->db->limit(1);

    $query = $this->db->get('cards'); // Replace 'cards' with your actual table name

    return $query->result_array();
}

}
