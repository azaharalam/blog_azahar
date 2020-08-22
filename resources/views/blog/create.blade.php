@extends ('layouts.app')
@section('title','Add blog');
@section('content')

<h1 class= "d-flex justify-content-center">Add to blog</h1>

<style>
    input {
  width: 20%;
  padding-top: 20px;
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
  margin: auto;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
<form action="/bloglist"  enctype="multipart/form-data" method="POST">
    @method('post')
    <div class="row">
      <div class="center-block col-md-6" style="float: none; background-color: grey; margin-left:auto;margin-right:auto;border-radius:10px">
        @include('blog.form')
        <button class="submit-button" type="submit">Submit</button>
  </div>
  </div>
    
</form>
@endsection