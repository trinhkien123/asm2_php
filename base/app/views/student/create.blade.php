<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
@if(isset($_SESSION['errors']) && isset($_GET['msg']))
    <ul>
        @foreach($_SESSION['errors'] as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span>{{$_SESSION['success']}}</span>
@endif
    <form action="{{route('store')}}" method="POST">
        <label>Name</label>
        <input type="text" name="name">
        <label>Year</label>
        <input type="text" name="year_of_birth">
        <label>Phone Number</label>
        <input type="text" name="phone_number">
        <button type="submit" name="btn-submit" value="Gửi">Gửi</button>
    </form>
</body>
</html>