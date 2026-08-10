<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shuffle_game_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Shuffle_game_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $data['cards'] = $this->Shuffle_game_model->getAllCards();
        $this->load->view('shuffle_game/index', $data);
    }

    public function shuffle()
    {
        $category = $this->input->post('category'); // Get the selected category

        if (!$category) {
            redirect('shuffle_game_controller'); // Redirect if no category is selected
        }

        $cards = $this->Shuffle_game_model->getShuffledCards($category);

        if (empty($cards)) {
            redirect('shuffle_game_controller/gameover');
        }

        $this->session->set_userdata('shuffled_cards', $cards);
        $this->session->set_userdata('current_index', 0);

        redirect('shuffle_game_controller/play');
    }

    public function dashboard()
    {
        $data['cards'] = $this->Shuffle_game_model->getAllCards();
        $this->load->view('admin/dashboard', $data);
    }

    public function play()
    {
        $cards = $this->session->userdata('shuffled_cards');
        $current_index = $this->session->userdata('current_index');

        if (empty($cards) || $current_index === null) {
            redirect('shuffle_game_controller');
        }

        if ($current_index >= count($cards)) {
            redirect('shuffle_game_controller/gameover');
        }

        $data['card'] = $cards[$current_index];
        $this->load->view('shuffle_game/play', $data);
    }
    public function edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $data['card'] = $this->Shuffle_game_model->getCardById($id);

        if (empty($data['card'])) {
            redirect('admin_controller/dashboard');
        }

        $this->load->view('shuffle_game/edit', $data);
    }

    public function update($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $data = array(
            'question' => $this->input->post('question'),
            'category' => $this->input->post('category')
        );

        $this->Shuffle_game_model->updateCard($id, $data);
        redirect('admin_controller/dashboard');
    }

    public function next()
    {
        $current_index = $this->session->userdata('current_index');
        $cards = $this->session->userdata('shuffled_cards');

        if (empty($cards) || $current_index === null) {
            redirect('shuffle_game_controller');
        }

        $current_index++;
        $this->session->set_userdata('current_index', $current_index);

        if ($current_index >= count($cards)) {
            redirect('shuffle_game_controller/gameover');
        }

        redirect('shuffle_game_controller/play');
    }


    public function gameover()
    {
        $this->session->unset_userdata(['shuffled_cards', 'current_index']);
        $this->load->view('shuffle_game/game_over');
    }


    public function create()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        $this->load->view('shuffle_game/create');
    }

    public function store()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $data = array(
            'question' => $this->input->post('question'),
            'category' => $this->input->post('category')
        );

        $this->Shuffle_game_model->insertCard($data);
        redirect('admin_controller/dashboard');
    }

    public function delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $this->Shuffle_game_model->deleteCard($id);
        redirect('admin_controller/dashboard');
    }

    public function dare()
    {
        // Logic to get a random dare
        $this->load->model('Dare_model');
        $dare = $this->Dare_model->get_random_dare();

        // Load the view with the dare
        $data['dare'] = $dare;
        $this->load->view('shuffle_game/dare', $data);
    }
}
