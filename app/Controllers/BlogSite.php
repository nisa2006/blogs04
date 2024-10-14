<?php

namespace App\Controllers;

use App\Models\BlogModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BlogSite extends BaseController
{
    public function index()
    {
        return view('/blogs/home');
    }
    public function about()
    {
        return view('/blogs/about');
    }
    public function blogs()
    {
        $blogmodel = new BlogModel();
        $data['blog'] = $blogmodel->findAll();
        return view('/blogs/blogs', $data);
    }
    public function create()
    {
        return view('/blogs/create');
    }
    // code di bawah ini untuk menambah data ke dalam db
    public function insert()
    {
        $blogmodel = new BlogModel();
        //insert data kedalam databse
        $blogmodel->save([
            'Nama' => $this->request->getVar('Nama'),
            'Judul_blogs' => $this->request->getVar('Judul_blogs'),
            'Blogs' => $this->request->getVar('Blogs'),
            'Referensi' =>  $this->request->getVar('Referensi'),
            'Tanggal_create' => $this->request->getVar('Tanggal_create')
        ]);
        return redirect()->to('/blogs');
    }
    public function read($id)
    {
        $blogmodel = new BlogModel();
        $data['user_view'] = $blogmodel->find($id);
        return view('/blogs/view_blog', $data);
    }
     public function edit($id)
    {
        $blogmodel = new BlogModel();
        $data['user_edit'] = $blogmodel->find($id);
        return view('blogs/edit', $data);
    }
    public function update($id)
    {
        $blogmodel = new BlogModel();
        $ubah = $blogmodel->save([
            'id'  => $id,
            'Nama' => $this->request->getVar('Nama'),
            'Judul_blogs' => $this->request->getVar('Judul_blogs'),
            'Blogs' => $this->request->getVar('Blogs'),
            'Referensi' =>  $this->request->getVar('Referensi'),
            'Tanggal_create' => $this->request->getVar('Tanggal_create')
        ]);
        if ($ubah) {
            session()->setFlashdata('berhasil' ,'data mu berhasil diubah');
            return redirect()->to('/blogs');
        } else {
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        session();
        $blogmodel = new BlogModel();
        $hapus = $blogmodel->delete($id);
        if ($hapus) {
            session()->setFlashdata('hapus' ,'data mu berhasil di hapus');
            return redirect()->to('/blogs');
        } else {
            return redirect()->back();
        }
    }
}
