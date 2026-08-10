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

        // Check if category is selected
        if (!$category) {
            redirect('shuffle_game_controller'); // Redirect if no category is selected
        }

        // Load the model
        $this->load->model('Shuffle_game_model');

        // Fetch shuffled cards based on selected category
        $data['cards'] = $this->Shuffle_game_model->getShuffledCards($category);

        // Load the game view (play.php) and pass the shuffled cards
        $this->load->view('shuffle_game/play', $data);
    }

    public function dashboard()
    {
        $data['cards'] = $this->Shuffle_game_model->getAllCards();
        $this->load->view('admin/dashboard', $data);
    }

    public function play()
    {
        $current_index = $this->session->userdata('current_index') ?? 0;
        $cards = $this->session->userdata('shuffled_cards') ?? [];

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
        $this->load->view('shuffle_game/edit', $data);
    }
    public function next()
    {
        $category = $this->input->post('category'); // Get the category from the form

        if (!$category) {
            redirect('shuffle_game_controller'); // If no category, go back to category selection
        }

        // Fetch the next question from the same category
        $cards = $this->Shuffle_game_model->get_next_question($category);

        if (!empty($cards)) {
            $data['cards'] = $cards;
            $this->load->view('shuffle_game/play', $data); // Load the game view with new question
        } else {
            redirect('shuffle_game_controller/gameover'); // No more questions in category
        }
    }


    public function gameover()
    {
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
        $this->Shuffle_game_model->deleteCard($id);
        redirect('shuffle_game_controller');
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
