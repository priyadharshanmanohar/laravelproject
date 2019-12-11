
@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
       <script>
        function getMessage(stat) {
           $.ajax({
              type:'POST',
              url:'/getmsg',
              data:{ id: stat },
              headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
              success:function(data) {
                 $("#msg").html(data.msg);
              }
           });
        }
     </script>
        
<form action="/store" method="POST" enctype="multipart/form-data" style="background-color:#74b9ff;text-align:center; height: 600px;width: 50%;">
    {{ csrf_field() }}
   <h2>Upload your file</h2>
   
    File:
    <br />
    <input type="file" name="csv_file" />
    <br /><br />
    
    <input type="submit" value=" Save "/>
   
    <div id="demo">      
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<br /><br />
<a href="/display" class="w3-btn w3-black">View Records</a>
<div id = 'msg'></div>
@if ($errors->any())
<script>getMessage(2)</script>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
</form>

           
@endsection
 