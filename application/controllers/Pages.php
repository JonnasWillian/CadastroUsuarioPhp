<?php

    class Pages extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('pages_model');
        }
        
        public function index()
        {
            $results = $this->pages_model->get(); 

            $this->load->view('template/header');
            $this->load->view('pages/index', ['pages'=> $results]);
            $this->load->view('template/footer');
        }

        public function view($id){
            
            $page = $this->pages_model-> get($id);
        
            $this->load->view('template/header');
            $this->load->view('pages/view', ['page'=> $page]);
            $this->load->view('template/footer');
        }

        public function new()
        {
            $this->load->library('form_validation');

/*             $this -> form_validation->set_rules('title', 'Titulo', 'required');
            $this -> form_validation->set_rules('body', 'conteúdo', 'required'); */

            $this->load->view('template/header');
            $this->load->view('pages/new');
            $this->load->view('template/footer');
        }

        public function create()
        {

            $data['back'] = '/pages';
            $teste = $this->pages_model->new(); 

            if($teste > 0){
                $resultado = true;
            }else {
                $resultado = false;
            }
            
            echo $resultado;
        }

        public function edit($id){
            $this->load->library('form_validation');
            $this -> form_validation->set_rules('title', 'Titulo', 'required');
            $this -> form_validation->set_rules('body', 'conteúdo', 'required');

            $dados['page'] = $this->pages_model->editDados($id);


            if ($this->form_validation->run() === false){
                $this->load->view('template/header');
                $this->load->view('pages/edit',$dados);
                $this->load->view('template/footer' );
            }else{
                $data['back'] = '/pages';
                $teste = $this->pages_model->new(); 
                $this->load->view('template/success', $data);
            }
        }

        public function update($id){
           $teste = $this->pages_model->update($id);
           $data['back'] = '/pages';
           $this->load->view('template/success', $data);
        }

        public function delete($id){
            $data['back'] = '/pages';
                $this->pages_model->delete($id); 
                $this->load->view('template/success', $data);
        }
    }