<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
    }

    public function index()
    {
        // pastikan hanya POST
        if ($this->input->method() !== 'post') {
            show_404();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'username' => 'tesprogrammer050226C17',
                'password' => '20f4fbb2b53050761b1aae02ce74d038'
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            curl_close($curl);
            $this->session->set_flashdata(
                'error',
                'Gagal koneksi ke API'
            );
            redirect('products');
        }

        curl_close($curl);

        $json = json_decode($response, true);

        // echo '<pre>';
        // print_r($json);
        // die;


        if (!isset($json['data'])) {
            $this->session->set_flashdata(
                'error',
                'Response API tidak valid'
            );
            redirect('products');
        }

        foreach ($json['data'] as $item) {
            $this->Product_model->save_from_api($item);
        }

        $this->session->set_flashdata(
            'success',
            'Import produk dari API berhasil'
        );


        redirect('products');
    }
}
