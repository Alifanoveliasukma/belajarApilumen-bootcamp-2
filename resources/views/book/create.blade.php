<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Create</title>
</head>
<body>
    <form action="{{url('books/create')}}" method="post">
        @csrf
    <label for="name">Name</label>
    <input type="text" name="name">
    <br>
    <label for="">Price</label>
    <input type="number" name="price">
    <br>
    <label for="">Description</label>
    <input type="text" name="desc">
    <br>
    <label for="">Status</label>
    <input type="text" name="status" id="">
    <select name="status" id="">
        <option value="lama">Lama</option>
        <option value="baru">Baru</option>
    </select>
    <label for="">Penerbit</label>
    <input type="text" name="penerbit_id">
        <select name="penerbit_id" id="">
            @foreach($penerbit as $a)
            <option value="{{$a->id}}">{{$a->name}}</option>
            @endforeach
        </select>
        <button type="submit">Save</button>
        </form>
</body>
</html>