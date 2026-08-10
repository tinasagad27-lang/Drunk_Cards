<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $admin = $this->db->get('admins')->row();

        if ($admin && hash('sha256', $password) === $admin->password) {
            return $admin;
        } else {
            return false;
        }
    }

    // Removed redundant methods
}
