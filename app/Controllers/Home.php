<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
{
    return view('welcome_message'); // atau return 'Berhasil tampil!';
}


    public function masalembu(): string
    {
        return 'Halo dari Masalembu!';
    }
    public function dashboard(): string
    {
    return view ('dashboard');
    }
  public function destinasi_wisata(): string
{
    $client = \Config\Services::curlrequest();
    $page = $this->request->getGet('page') ?? 1;
    $perPage = 5;

    $response = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page={$perPage}&page={$page}");
    $posts = json_decode($response->getBody());

    $totalPages = $response->getHeaderLine('X-WP-TotalPages') ?: 1;

    return view('destinasi_wisata', [
        'posts' => $posts,
        'currentPage' => $page,
        'totalPages' => $totalPages,
    ]);
}

public function detail_artikel($id)
{
    $client = \Config\Services::curlrequest();

    // Ambil detail artikel berdasarkan ID
    $response = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts/{$id}?_embed");
    $post = json_decode($response->getBody());

    // Ambil beberapa artikel terbaru sebagai sidebar
    $terbaruResponse = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page=5");
    $terbaru = json_decode($terbaruResponse->getBody());

    return view('detail_artikel', [
        'post' => $post,
        'terbaru' => $terbaru
    ]);
}

public function kontak(): string
{
    return view ('kontak');
}
public function about(): string
 {

return view('about');
}

}
