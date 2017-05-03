@extends('layout.app')
@section('content')
    <ul>
        <li><a href="{{route()}}"></a></li>
    </ul>
    <ul>
        @foreach($items as $item)
            <li>
                {{$item->id}}
            </li>
        @endforeach
    </ul>
@endsection
