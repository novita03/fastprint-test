<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('products', $data);
    }

    public function save_from_api($item)
    {
        // kategori
        $cat = $this->db->get_where('categories', [
            'nama_kategori' => $item['kategori']
        ])->row();

        if (!$cat) {
            $this->db->insert('categories', [
                'nama_kategori' => $item['kategori']
            ]);
            $kategori_id = $this->db->insert_id();
        } else {
            $kategori_id = $cat->id_kategori;
        }

        // status
        $status = $this->db->get_where('statuses', [
            'nama_status' => $item['status']
        ])->row();

        if (!$status) {
            $this->db->insert('statuses', [
                'nama_status' => $item['status']
            ]);
            $status_id = $this->db->insert_id();
        } else {
            $status_id = $status->id_status;
        }

        // produk
        return $this->db->insert('products', [
            'nama_produk' => $item['nama_produk'],
            'harga' => $item['harga'],
            'kategori_id' => $kategori_id,
            'status_id' => $status_id
        ]);
    }

    public function get_sellable()
    {
        return $this->db
            ->select('p.*, c.nama_kategori, s.nama_status')
            ->from('products p')
            ->join('categories c', 'c.id_kategori=p.kategori_id')
            ->join('statuses s', 's.id_status=p.status_id')
            ->where('s.nama_status', 'bisa dijual')
            ->get()
            ->result();
    }

    public function get_categories()
    {
        return $this->db->get('categories')->result();
    }

    public function get_statuses()
    {
        return $this->db->get('statuses')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('products', [
            'id_produk' => $id
        ])->row();
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_produk', $id)
            ->update('products', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_produk', $id)
            ->delete('products');
    }
}
