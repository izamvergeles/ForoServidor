@extends('app.base')

@section('content')
<label class="ml-5 mt-5 text-white" style="font-size:20px;">Post:</label>
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
<label class="ml-5 mt-5 text-white" style="font-size:20px;">Comment:</label>
        <div class="ml-5 w-75 bg-white mt-2" style="border-radius:10px;">
            <div class="w-50 text-dark bg-white ml-2" style="font-size:20px;">
                 {{ $comment->mensaje}}
            </div>
        </div>
</label>
<div class="mt-5 ml-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
</div>



@endsection