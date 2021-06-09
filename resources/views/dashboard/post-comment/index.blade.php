@extends('dashboard.master')
@section('content')

@if (count($postComments) > 0)

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Titulo
            </td>
            <td>
                Usuario
            </td>
            <td>
                Aprovado
            </td>
            <td>
                Creacion
            </td>
            <td>
                Actualizacion
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($postComments as $postComment)
            <tr>
                <td>
                    {{$postComment->id}}
                </td>
                <td>
                    {{$postComment->title}}
                </td>
                <td>
                    {{$postComment->user->name}}
                </td>
                <td>
                    {{$postComment->approved}}
                </td>
                <td>
                    {{$postComment->created_at->format('d-m-Y')}}
                </td>
                <td>
                    {{$postComment->updated_at->format('d-m-Y')}}
                </td>
                <td>
                    <a href="{{ route('post-comment.show',$postComment->id) }}" class="btn btn-primary">Show</a>
                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $postComment->id }}" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$postComments->links()}}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Estas seguro de eliminar el postComment seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('post-comment.destroy',0 )}}" data-action="{{ route('post-comment.destroy',0 )}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
    window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
    
        action = $('#formDelete').attr('data-action').slice(0,-1);
        
        $('#formDelete').attr('action',action + id)
        var modal = $(this)
        modal.find('.modal-title').text('Delete postComment with id: ' + id)
        });
    };
</script>
@else
<h1>No hay comentarios para el post seleccionado</h1>
@endif
@endsection