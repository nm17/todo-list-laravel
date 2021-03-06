<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Students</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
            input {
                max-width: 25%;
                margin-bottom: 1%
            }
        </style>
    </head>
    <body>
            <div class="card card-default">
                    <form action="{{ route('get_data') }}" method="POST">
                        @csrf
                        <input name="search">
                        <button class="btn">Search</button>
                    </form>
                </div>    
        <div class="card card-default">
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <input name="name">
                    <input name="date_of_birth">
                    <button class="btn">Save</button>
                </form>
            </div>

        <table style="width:100%" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Группа</th>
                    <th>Ф.И.О</th>
                    <th>Дата рождения</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $todo)
                <tr>
                    <th>{{ $todo->id }}</th>
                    <th>
                        @if ($todo->groups != null)
                        {{ $todo->groups->name }}
                        @endif
                        <form action="{{ route('edit', ['id' => $todo->id]) }}" method="POST">
                            @csrf
                            @if ($todo->groups != null)
                            <input name="group_id" value="{{ $todo->groups->id }}">
                            @else
                            <input name="group_id">
                            @endif
                            <button class="btn">Edit group</button>
                        </form>
                    </th>
                    <th>{{ $todo->name }}</th>
                    <th>{{ $todo->date_of_birth }}</th>
                    <th>
                        <form action="{{ route('delete', ['id' => $todo->id]) }}" method="POST">
                            @csrf
                            {{ method_field("delete") }}
                            <button class="btn">Delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </body>
</html>