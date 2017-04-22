@extends('principal')
@section('conteudo')
<!-- Modal -->
<div id="" class="" role="dialog">
  	<div class="modal-dialog">
    	<!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Modal Header</h4>
      		</div>
      		<div class="modal-body">
        		<p>Some text in the modal.</p>
      		</div>
      		<div class="modal-footer">
        		<a href="{{route('feed.listar')}}" class="btn btn-default" data-dismiss="modal">Close</a>
      		</div>
    	</div>
    </div>
</div>

@stop