@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('name', 'Название категории') }}
{{ Form::text('name') }}<br>
{{ Form::label('description', 'Описание') }}
{{ Form::textarea('description') }}<br>
{{ Form::select('state', [
    'draft' => 'Черновик',
    'published' => 'Публиуация'
], 'draft') }}<br>
