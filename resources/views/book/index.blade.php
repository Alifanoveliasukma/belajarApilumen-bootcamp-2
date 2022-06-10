<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Create</title>
</head>
<body>
   <table>
       <tr>
           <th>Nama</th>
           <th>Harga</th>
           <th>Deskripsi</th>
           <th>Nama Penerbit</th>
           <th>Status</th>
           <th>Aksi</th>
       </tr>
       @foreach($penerbit as $a)
       <tr>
           <td>{{$a->name}}</td>
           <td>{{$a->price}}</td>
           <td>{{$a->desc}}</td>
           <td>{{$a->penerbit_id}}</td>
           <td>{{$a->status}}</td>
           <td>
                <a href="/books/edit/{{$a->id}}">Edit</a>
                <!-- <a href="/books/{{$a->id}}/hapus">Delete</a> -->
                <form action="{{url('books/delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$a->id}}">
                    <button type="submit">Delete</button>
                </form>
           </td>
       </tr>
       @endforeach
   </table>
</body>
</html>