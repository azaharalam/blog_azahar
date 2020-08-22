@extends ('layouts.app')
@section('title','Edit blog '.$blog->title);
@section('content')

<h1 class= "d-flex justify-content-center">Edit for{{" "}} <span><h1 color="#000"><a href="/bloglist/{{$blog->id}}">{{ $blog->title}}</a></h1></span></h1>

<style>
    input {
  width: 20%;
  padding: 12px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
button{
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;

  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin:auto;
}
.desdesign{
    height: 120px;
    width: 40%;
}
.errordesign{
    color:red;
    font-size:15px;
}
.imagedesign{
   font-size:20px;
}
</style>
<form action="/bloglist/{{$blog->id}}"  enctype="multipart/form-data" method="POST">
    @method('patch')
    <div class="row">
      <div class="center-block col-md-4" style="float: none; background-color: grey; margin-left:auto;margin-right:auto;border-radius:10px">
        @include('blog.form')
        <button class ="submit-button" type="submit">Submit</button>
  </div>
  </div>
</form>
@endsection