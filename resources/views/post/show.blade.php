@extends('app.base')

@section('content')
<label class="ml-5 mt-5 text-white" style="font-size:20px;">Message:</label>
<div class="ml-5 w-75 bg-white" style="border-radius:10px;">
    
    <div class="w-50 text-dark bg-white ml-2" style="font-size:20px;">
         {{ $post->mensaje}}
    </div>
    <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
        @foreach ($users as $user)
            @if($user->id == $post->idusuario)
                {{ $user->nombre }}
            @endif 
        @endforeach
    </div>
    <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
        Created date: {{ $post->created_at }}
    </div>
    <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
        Update date: {{ $post->updated_at }}
    </div>
</div>
<label class="ml-5 mt-5 text-white" style="font-size:20px;">Comments:</label>
@foreach ($comments as $comment)
    @if($comment->idpost == $post->id)
        <div class="ml-5 w-75 bg-white mt-2" style="border-radius:10px;">
            
            <div class="w-50 text-dark bg-white ml-2" style="font-size:20px;">
                 {{ $comment->mensaje}}
            </div>
            <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
                @foreach ($users as $user)
                    @if($user->id == $comment->idusuario)
                        {{ $user->nombre }}
                    @endif 
                @endforeach 
            </div>
            <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
                Created date: {{ $comment->created_at }}
            </div>
            <div class="text-muted bg-white text-right mr-2" style="font-size:12px;">
                Update date: {{ $comment->updated_at }}
            </div>
        </div>
    @endif
@endforeach
    
    <div>
        <form action="{{ url('mycomment') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="mensaje" class="text-white ml-5 mt-5">Comment</label>
                <input value="{{ old('comment') }}" _required type="text" maxlength="100" class="form-control w-50 ml-5 h-25" id="mensaje" name="mensaje" placeholder="Your comment">
                <input name="idpost" type="hidden" value="{{$post->id}}">
                @error('mensaje')
                    <div class="alert alert-danger ml-5 w-50">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success ml-5 mt-3">Add Comment</button>
            </div>
        </form>
    </div>
    <div class="mt-5 ml-5">
        <a href="{{ url('mypost') }}" class="btn btn-primary">Back</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection