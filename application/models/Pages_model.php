<?php

    class Pages_model extends CI_Model
    {

        private $table_name = "pages";
        

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function get($id = null)
        {
            if ($id === null){
                $query=$this->db->select("date_format(nascimento,'%d/%m/%Y') as nascimento, title, body, id");
                $query=$this->db->from("pages");
                
                $query = $this->db->get();
                return $query->result();
            }

            $query=$this->db->select("date_format(nascimento,'%d/%m/%Y') as nascimento, title, body, id");
            $query=$this->db->from("pages");
            $query=$this->db->where('id',$id);

            return $this->db->get()->result_array();
        }

        public function new()
        {
            $this->load->helper('url');
            $slug = url_title($this->input->post('title'), 'dash', true);

            /* To testando */
            $dataInicio = str_replace('/', '-',  $this-> input -> post('nascimento'));
            $dataInicialFormatoBanco = date('Y-m-d', strtotime($dataInicio));

            $data = [
                'title' => $this -> input->post('title'),
                'body' => $this-> input -> post('body'),
                'nascimento' => $dataInicialFormatoBanco ,
                'slug' => $slug
            ];


            return $this->db->insert('pages', $data);
        }

        public function update ($id) {

            $this->load->helper('url');
            $slug = url_title($this->input->post('title'), 'dash', true);

            /* To testando */
            $dataInicio = str_replace('/', '-',  $this-> input -> post('nascimento'));
            $dataInicialFormatoBanco = date('Y-m-d', strtotime($dataInicio));

            $data = [
                'title' => $this -> input->post('title'),
                'body' => $this-> input -> post('body'),
                'nascimento' => $dataInicialFormatoBanco ,
                'slug' => $slug
            ];

            $this->db->where('id', $id);

            return $this->db->update($this->table_name, $data);
        }

        public function delete($id){
            return $this->db->delete($this->table_name, ['id' => $id]);
        }

        public function editDados($id = null)
        {
            if ($id === null){
                $query = $this->db->get('pages');
                return $query->result();
            }
            $this->db->select('date_format(nascimento,"%d/%m/%Y") as nascimento, title, body, id');
            $this->db->from('pages');
            $this->db->where('id', $id);

            $query= $this->db->get()->result_array();
            return $query;
        }

    }
