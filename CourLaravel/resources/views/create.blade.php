
<h1>Create blog page</h1>

@if( isset($blog))
    <form method="POST"  action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
        @method("PUT")
@else
    <form method="POST"  action="{{ route('blog.store') }}" enctype="multipart/form-data">
@endif
    @csrf

    <label for="title">Title</label> <br>
    <input type="text" value="{{ isset($blog->title) ? $blog->title : ''  }}" name="title" id="title"><br><br>
    @error('title')
        <div>{{ $message }}</div>
    @enderror

    <label for="picture">Image</label><br>

    @if( isset($blog->picture))
        <img src="{{asset('storage/' . $blog->picture)}}" alt="Image blog actuelle">
    @endif

    <input type="file" name="picture" id="picture"><br><br>
    @error('picture')
        <div>{{ $message }}</div>
    @enderror

    <label for="content">Description</label><br>
    <textarea name="content" id="content">
        {{ isset($blog->content) ? $blog->content : ''  }}
    </textarea><br><br>
    @error('content')
        <div>{{ $message }}</div>
    @enderror

    <input type="submit" name="valider" value="Valider">
</form>
