<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['products'] = $this->Product_model->get_sellable();
        $this->load->view('products/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'nama_produk',
            'Nama Produk',
            'required',
            [
                'required' => 'Nama produk wajib diisi.'
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|numeric',
            [
                'required' => 'Harga wajib diisi.',
                'numeric'  => 'Harga harus berupa angka.'
            ]
        );


        // ambil data dropdown
        $data['categories'] = $this->Product_model->get_categories();
        $data['statuses']   = $this->Product_model->get_statuses();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('products/form', $data);
        } else {
            $insert = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id'   => $this->input->post('status_id')
            ];

            $this->Product_model->insert($insert);
            redirect('products');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules(
            'nama_produk',
            'Nama Produk',
            'required',
            [
                'required' => 'Nama produk wajib diisi.'
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|numeric',
            [
                'required' => 'Harga wajib diisi.',
                'numeric'  => 'Harga harus berupa angka.'
            ]
        );


        $data['product']    = $this->Product_model->get_by_id($id);
        $data['categories'] = $this->Product_model->get_categories();
        $data['statuses']   = $this->Product_model->get_statuses();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('products/form_edit', $data);
        } else {
            $update = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id'   => $this->input->post('status_id')
            ];

            $this->Product_model->update($id, $update);
            redirect('products');
        }
    }

    public function delete($id)
    {
        $this->Product_model->delete($id);
        redirect('products');
    }
}
