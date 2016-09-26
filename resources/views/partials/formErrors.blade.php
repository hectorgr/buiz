@if (count($errors) > 0)
    <div class="alert alert-danger" id="listErrors">
        <button type="button" class="close" aria-label="Cerrar" onclick="$('#listErrors').slideUp()"><span aria-hidden="true">&times;</span></button>
        @if (count($errors) > 1)
            <p>Por favor corrige los siguientes problemas:</p>
        @endif
        <ul class="list-reset {{ count($errors) === 1 ? 'list-unstyled' : '' }}">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
