@php
    $flasher = app('flasher');
@endphp

@if (session()->has('success'))
    @php
        $flasher->addSuccess(session()->get('success'));
    @endphp
@endif

@if (session()->has('error'))
    @php

        $flasher->addError(session()->get('error'));
    @endphp
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            $flasher->addError($error);
        @endphp
    @endforeach
@endif