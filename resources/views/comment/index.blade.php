@extends('main.index')

@section('modalContent')
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span id="deleteComment"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Delete Comment"/>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')


    <div class="row" style="margin-top: 8px;">
        <table class="table bg-info ml-5 mr-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"># id</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                @if($comment->idusuario == $user->id)
                    <tr>
                        <td>
                            {{ $comment->id }}
                        </td>
                        <td>
                            {{ $comment->mensaje }}
                        </td>
                        @if($comment->updated_at > $now)
                        <td>
                            <a href="javascript: void(0);" 
                                   data-name="{{ $comment->id }}"
                                   data-url="{{ url('mycomment/' . $comment->id) }}"
                                   data-toggle="modal"
                                   class="text-danger"
                                   data-target="#modalDelete">Delete</a>
                        </td>
                        
                            <td>
                                <a href="{{ url('mycomment/' . $comment->id . '/edit') }}" class="text-warning">Edit</a>
                            </td>
                            @else
                            <td>
                                <a class="text-muted">Delete</a>
                            </td>
                            <td>
                                <a class="text-muted">Edit</a>
                            </td>
                        @endif
                        <td>
                            <a href="{{ url('mycomment/' . $comment->id) }}" class="text-white">Show</a>
                        </td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
@endsection

@section('scripts')
<script src="{{ url('assets/js/product-modal-delete2.js') }}"></script>
@endsection