<div class="col-12" style="cursor: pointer;">
  @if(Session::get('message'))
  <p class="alert alert-success" onClick="$('.alert').alert('close');">
    {{Session::get('message')}}
  </p>
  @endif
  @if(Session::get('error'))
  <p class="alert alert-danger" onClick="$('.alert').alert('close');">
    {{Session::get('error')}}
  </p>
  @endif
</div>