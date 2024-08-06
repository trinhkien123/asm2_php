@extends('layouts.main')
@section('content')
<a href="{{route('create')}}">Them</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Year of Birth</th>
        <th>Phone Number</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($students as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->year_of_birth }}</td>
                <td>{{ $st->phone_number }}</td>
                <th>
                    <a href="">Sửa</a>
                    <a href="{{ route('delete/' . $st->id) }}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
