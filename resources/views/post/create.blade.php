@extends('app.base')


    @section('content')
    <div>
        <form action="{{ url('mypost') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="mensaje" class="text-white ml-4 mt-5">Message</label>
                <input value="{{ old('mensaje') }}" _required type="text" maxlength="100" class="form-control w-50 ml-4 h-25" id="mensaje" name="mensaje" placeholder="Message">
                @error('mensaje')
                    <div class="alert alert-danger ml-4 w-50">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success ml-4 mt-3">Add</button>
                <a href="{{ url('mypost') }}" class="btn btn-primary ml-4 mt-3">Back</a>
            </div>
        </form>
    </div>
    @endsection
    
