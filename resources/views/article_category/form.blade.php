@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('name', 'Название категории') }}<br>
{{ Form::text('name') }}<br>
{{ Form::label('description', 'Описание') }}<br>
{{ Form::textarea('description') }}<br>
{{ Form::label('state', 'Состояние') }}<br>
{{ Form::select('state', [
    'draft' => 'Черновик',
    'published' => 'Публиуация'
], 'draft') }}<br>
