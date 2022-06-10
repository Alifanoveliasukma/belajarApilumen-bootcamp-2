<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Whoops\Run;

class BookController extends Controller
{
    public function index()
    {
        $client = new Client;

        $response = $client->request('GET','http://localhost:8080/books');

        $result = json_decode($response->getBody());

        return  view('book.index')->with('penerbit', $result);

    }

    public function create()
    {
        $client = new Client;

        $response = $client->request('GET','http://localhost:8080/penerbit');

        $result = json_decode($response->getBody());

        return  view('book.create')->with('penerbit', $result);

    }

    public function store(Request $r)
    {
        $client = new Client;

        $response = $client->request('POST', 'http://localhost:8080/books/update',['form_params'
        => [
                'name' => $r->name,
                'price' => $r->price,
                'desc' => $r->desc,
                'penerbit_id' => $r->penerbit_id,
                'status' => $r->status
            ]
        ]);
     
         
        $result = $response->getStatusCode();

        return redirect('/books');
    }

    public function edit($id)
    {
        $client = new Client;
       
        $response = $client->request('GET', 'http://localhost:8080/books/'.$id);
        $response2 = $client->request('GET', 'http://localhost:8080/penerbit');
        $data = json_decode($response->getBody());
        $penerbit = json_decode($response2->getBody());
        

        return view('book.edit')->with('book', $data)->with('penerbit', $penerbit);

    }

    public function update(Request $r)
    {
        $client = new Client;
        $response = $client->request('POST', 'http://localhost:8080/books/update', [
            'form_params' => [
                'id' => $r->id,
                'name' => $r->name,
                'price' => $r->price,
                'desc' => $r->desc,
                'penerbit_id' => $r->penerbit_id,
                'status' => $r->status
            ]
            ]);
            return redirect('/books');
    }


    public function delete(Request $r)
    {
        $client = new Client;
        $response = $client->request('POST', 'http://localhost:8080/books/delete',['form_params'
        => [
                'id' => $r->id,
            ]
        ]);
        $result = $response->getStatusCode();

        return redirect('/books');
 
    }
}
