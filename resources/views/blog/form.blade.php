

        <input style = "margin-top:40px"type="text" placeholder="Title.." name="title" value = {{ old( 'title' ) ?? $blog->title }}>
        <div  class = "errordesign">{{$errors->first('title')}}</div>
        <input type="text" placeholder="Subtitle.." name ="subtitle" value = {{ old( 'subtitle' ) ?? $blog->subtitle }}>
        <br>
       
        <div>
            <input width = "40%" class = "form" rows= "5" type="text" placeholder="Description.." name ="description" value = {{ old( 'description' ) ?? $blog->description}}>
            <div  class = "errordesign">{{$errors->first('description')}}</div>
        </div>
        <div>
            <label for="image" class="imagedesign"> Upload an image</label>
            <input type="file" name = "image">
            <div  class = "errordesign">{{$errors->first('image')}}</div>
        </div>
 @csrf