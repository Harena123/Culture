<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="villes-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($villes as $ville)
                <tr>
                    <td>{{ $ville->nom }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['villes.destroy', $ville->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('villes.show', [$ville->id]) }}"
                               class='btn btn-default btn-xs' style="background-color: white; color:black;">Détails
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('villes.edit', [$ville->id]) }}"
                               class='btn btn-default btn-xs' style="background-color: green">Modifier
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i> Supprimer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $villes])
        </div>
    </div>
</div>
</div>
</div>
</div>



