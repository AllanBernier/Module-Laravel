<h1> Tous les blogs </h1>


<a href="{{ route('blog.create') }}"> Créer un nouveau blog </a>




<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Picture</td>
            <td>Content</td>
            <td>Actions</td>
        </tr>
    </thead>

    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>
                {{$blog->title}}
            </td>
            <td>
                <img src="{{ asset('storage/'. $blog->picture)}}" alt="blog image">
            </td>
            <td>
                {{$blog->content}}
            </td>
            <td>
                <a href="{{ route('blog.show', $blog->id) }}"> Voir </a> <br>
                <a href="{{ route('blog.edit', $blog->id) }}"> Modifier </a>

                <form method="POST" action="{{ route('blog.destroy', $blog->id) }}">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

