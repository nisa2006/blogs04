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
}
