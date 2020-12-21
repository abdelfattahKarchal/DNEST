@if (Session()->has('status'))

    <div class="alert alert-success" style="{{ $type ?? 'dd' }}">
        <ul>
            <li> {{ Session()->get('status') }} </li>
        </ul>
    </div>
@endif
