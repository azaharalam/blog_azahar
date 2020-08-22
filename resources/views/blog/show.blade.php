@extends ('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
.blogheader{    
    background-color: #3ac;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    font-size: 50px;
    margin: 0;
    text-align:center;
}
.subtitle{
    
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font: bold;
    margin-top: 50px;
}

.descriptiondesign{
    
    background-color: #fff;
    color: #000;
    font-family: 'Nunito', sans-serif;
    font-weight: 500;
    font-size: 15px;
    margin: 10;
    border: 1px solid;
    border-radius:5px;
}

.imgdesign{
    height:132%;
    width:99%;
}
.editDesign{
    margin-top:20px;
    font-size:20px;
}
.btn{
    background:#f00;
    margin-top:10px;
}
</style>
</head>

<body>

<h1 class="d-flex justify-content-center">{{$blog->title}}</h1>
<span class= "float float-right">
<a href="{{$blog->id}}/edit" class = "btn btn-primary">Edit</a>
<span >
    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
</button>
</span>
</span>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/bloglist/{{$blog->id}}" method  = "POST">
      <div class="modal-body" style = "color:#0af">
        Do you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            
        
      </div>
      @csrf
      </form>
    </div>
  </div>
</div>
<h3 class = "mt-5">{{$blog->subtitle}}</h3>
<br>
@if($blog->image)
    <div>
         <img src="{{ asset('uploads/blogs/'.$blog->image) }}"  class="img-thumbnail" alt="Responsive image">
    </div>
@endif
<div class="descriptiondesign">
    <p style = "Padding:10px">{{$blog->description}}</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

@endsection