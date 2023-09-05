
<h1>Create blog page</h1>

<form method="POST"  action="{{ route('blog.store') }}">
    @csrf

    <label for="title">Title</label> <br>
    <input type="text" name="title" id="title"><br><br>
    @error('title')
        {{ $message }}
    @enderror

    <label for="picture">Image</label><br>
    <input type="file" name="picture" id="picture"><br><br>
    @error('picture')
    {{ $message }}
    @enderror

    <label for="content">Description</label><br>
    <textarea name="content" id="content"> </textarea><br><br>
    @error('content')
    {{ $message }}
    @enderror

    <input type="submit" name="valider" value="Valider">

</form>
