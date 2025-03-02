@extends('admin.admin')
@section('title', $property->exists ? 'Modifier un bien' : 'Créer un bien')

@section('content')
<div class="container mt-5">
    <h1>@yield('title')</h1>

    <form action="{{route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="post">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">
            @include('shared.input', ['class'=>'col-12','label' => 'Titre', 'name' => 'title', 'value'=> $property->title])
            @include('shared.input', ['class'=>'col-12','label' => 'Description', 'name' => 'description', 'value'=> $property->description, 'type' => 'textarea'])
        </div>
        
        <div class="row">
            @include('shared.input', ['class'=>'col','label' => 'Surface', 'name' => 'surface', 'value'=> $property->surface])
            @include('shared.input', ['class'=>'col','label' => 'Prix', 'name' => 'price', 'value'=> $property->price])
            @include('shared.input', ['class'=>'col','label' => 'Pièces', 'name' => 'rooms', 'value'=> $property->rooms])
            @include('shared.input', ['class'=>'col','label' => 'Chambres', 'name' => 'badrooms', 'value'=> $property->badrooms])
            @include('shared.input', ['class'=>'col','label' => 'Étage', 'name' => 'floor', 'value'=> $property->floor])
        </div>

        <div class="row">
            @include('shared.input', ['class'=>'col','label' => 'Ville', 'name' => 'city', 'value'=> $property->city])
            @include('shared.input', ['class'=>'col','label' => 'Adresse', 'name' => 'address', 'value'=> $property->address])
            @include('shared.input', ['class'=>'col','label' => 'Code postal', 'name' => 'postal_code', 'value'=> $property->postal_code])
        </div>

        <div class="form-check mb-3">
            <input type="hidden" name="sold" value="0">
            <input type="checkbox" class="form-check-input" id="sold" name="sold" value="1" @if($property->sold) checked @endif>
            <label class="form-check-label" for="sold">Vendu</label>
        </div>

        <button class="btn btn-primary">
            @if ($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </form>
</div>
@endsection