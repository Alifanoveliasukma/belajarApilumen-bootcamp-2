<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Edit</title>
</head>
<body>
    <form action="{{url('books/update')}}" method="post">
        @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$book->name}}">
    <br>
    <label for="">Price</label>
    <input type="number" name="price" value="{{$book->price}}">
    <br>
    <label for="">Description</label>
    <input type="text" name="desc" value="{{$book->desc}}">
    <br>
    <label for="">Status</label>
    <input type="text" name="status" id="">
    <select name="status" id="">
        <option value="lama" <?php echo($book->status == 'lama')? 'selected' : ''?>>Lama</option>
        <option value="baru" <?php echo($book->status == 'baru')? 'selected' : ''?>>Baru</option>
    </select>
    <label for="">Penerbit</label>
    <select name="penerbit_id" id="">
        @foreach($penerbit as $a)
          <option value="{{$a->id}}" <?php echo($book->penerbit_id == $a->id)? 'selected' : ''?>>{{$a->name}}</option>
          @endforeach 
    </select>
    <input type="hidden" name="id" value="{{$book->id}}">
    
        <button type="submit">Save</button>
        </form>
</body>
</html>