<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="etats-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descri</th>
                <th>Test</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($etats as $etat)
                <tr>
                    <td>{{ $etat->id }}</td>
                    <td>{{ $etat->descri }}</td>
                    <td>{{ $etat->test }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['etats.destroy', $etat->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('etats.show', [$etat->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('etats.edit', [$etat->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $etats])
        </div>
    </div>
</div>
