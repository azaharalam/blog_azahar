@extends ('layouts.app')
@section('title','Blog List')
@section('content')

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class = "bg-light">
<!-- Button trigger modal -->
<div class = "float-right">
  <div class = "m-100"></div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#BlogAddModal">Add to Blog</button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="BlogAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add to Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addtoblog" enctype="multipart/form-data" method= "post">
        <div class="modal-body">
          @include('blog.form')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Add to Blog</button>
        </div>
      </form>
    </div>
  </div>
</div>

@if(!$blogs->isEmpty())
<h1 class="d-flex justify-content-center" class = "pb-4">Blogs</h1>
<div class="m-5" style = "border-radius:5px">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Subtitle</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($blogs as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td><a href = "/bloglist/{{$item->id}}">{{$item->title}}</a></td>
      <td>{{$item->subtitle}}</td>
      <td>{{$item->description}}</td>
      <td>@if($item->image)<img src="{{ asset('uploads/blogs/'.$item->image) }}" alt ="" class = "" height="50" width="60">@endif</td>
    </tr>
</tbody>
    @endforeach
</table>
</div>
@else
  <h1 class="d-flex justify-content-center" class = "pb-4">No blogs available</h1>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type = "text/javascript">
  $(document).ready(function(){
      $('#addtoblog').on('submit',function(e){
        e.preventDefault();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      
        $.ajax({
         
          type: 'POST',
          url: '/bloglist',
          data: $('#addtoblog').serialize(),
          
          
          success: function(response){
            console.log(response)
            $('#BlogAddModal').modal('hide')
            alert('Added to Blog');
            location.reload();
          },
          
          
          statusCode: {
            404: function() {
              // handle the 404 response
            },
            401: function() {
              alert('Login first');
              window.location.href = "{{ route('home') }}";
            }
          },
          error: function(error){
            console.log(error)
            alert('Failed to Add Blog');
          }
    

        });
      });
  });
</script>


</body>

@endsection