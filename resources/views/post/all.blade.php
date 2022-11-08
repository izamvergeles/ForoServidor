@extends('main.index')
@section('content')
    <div class="row" style="margin-top: 8px;">
        <table class="table bg-info ml-5 mr-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"># id</th>
                    <th scope="col">Post</th>
                    <th scope="col">Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>
                            {{ $post->mensaje }}
                        </td> 
                        <td>
                            <a href="{{ url('mypost/' . $post->id) }}" class="text-white">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row ml-5">
        <a href="{{ url('mypost/create') }}" class="btn btn-success">New Post</a>
    </div>
    
@endsection