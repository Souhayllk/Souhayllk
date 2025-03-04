@extends('admin.admin')
@section('title', $option->exists ? 'Modifier une option' : 'Créer une otpion')

@section('content')
<div class="container mt-5">
    <h1>@yield('title')</h1>

    <form action="{{route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="post">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')

       

      
    @include('shared.input', ['name'=>'name','label' => 'Nom ',  'value'=> $option->name])
   

        
        <button class="btn btn-primary">
            @if ($option->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </form>
</div>
@endsection