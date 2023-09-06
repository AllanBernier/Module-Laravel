


<h1> This is an email </h1>

<p>Nom : {{ $name }}</p>

<div>
    <table border="1">
        <thead>
        <tr>
            <td>Name</td>
            <td>Siren</td>
        </tr>
        </thead>

        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>
                    {{$brand->name}}
                </td>
                <td>
                    {{$brand->siren}}
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
