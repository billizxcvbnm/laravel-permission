@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
 <body>
  <br />
  
  <div class="container">
   <h3 align="center">Projects</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   
    
</div>
</body>
</html>

@endsection