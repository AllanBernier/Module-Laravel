
<h1>{{$blog->title}}</h1>

<div>
    <img src="{{asset('storage/' . $blog->picture )}}" alt="Blog image">
</div>

<div>{{$blog->content}}</div>

<a href="{{route('blog.index')}}">Retour</a>
<a href="{{route('blog.edit', $blog->id)}}">Modifier</a>
<form method="POST">
    @csrf
    @method("DELETE")

    <input type="submit" value="Supprimer">
</form>
