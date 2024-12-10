@if(count($errors) > 0)
  <div class="alert alert-danger" style="width: 100%;">
    <ul>
      @foreach($errors as $error_type)
        @foreach($error_type as $error)
          <li>{{ $error }}</li>
        @endforeach
      @endforeach
    </ul>
  </div>
@endif