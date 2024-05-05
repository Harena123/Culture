
@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Ville
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
<h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore veniam tempora similique nostrum, illum laudantium vero odit nulla dolorum? Ipsum placeat quibusdam necessitatibus aspernatur autem voluptas dicta ad totam animi!</h1>
            {!! Form::model($ville, ['route' => ['villes.update', $ville->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('villes.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('villes.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
