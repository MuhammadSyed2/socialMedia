@extends('layout')

@section('content')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        @if( count($guitars) > 0)
            @foreach($guitars as $guitar)
                <div>
                    <h3>
                        <a href="{{ route('guitars.show', ['guitar' => $guitar['id']]) }}">{{$guitar['name']}}</a>
                    </h3>
                    <ul>
                        <li>Made by: {{ $guitar['brand'] }}</li>
                        <li>Made on: {{ $guitar['yearMade'] }}</li>
                        <form method="POST" action="{{ route('guitars.destroy', ['guitar' => $guitar->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input class="bg-white" type="submit" value="Delete" />
                        </form>
                    </ul>
                </div>
            @endforeach
        @else
            <div>There are no guitars to display</div>
        @endif

        <div>
            User Input: {{$userInput}}
        </div>
    </div>
@endsection