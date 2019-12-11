
@extends('layouts.app')
@section('content')

<form action="/store" method="POST" enctype="multipart/form-data" style="background-color:#74b9ff;text-align:center; height: 300px;width: 50%;">
    {{ csrf_field() }}
   <h2>Upload your file</h2>
   
    File:
    <br />
    <input type="file" name="csv_file" />
    <br /><br />
    <input type="submit" value=" Save " />
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
</form>

@endsection
 