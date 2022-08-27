@extends('layouts.library')
@section('content')
    @can('asset_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("library.transactions.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.transaction.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transaction">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.asset') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.member') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.issuedBy') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.issueDate') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.returnDate') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.returnedOn') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key => $transaction)
                        <tr data-entry-id="{{ $transaction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transaction->asset->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->user->fname ?? '' }} {{ $transaction->user->lname ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->member->fname ?? '' }} {{ $transaction->member->lname ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->issueDate ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->returnDate ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->returnedOn ?? '' }}
                            </td>
                            <td>
{{--                                @can('transaction_show')--}}
{{--                                    <a class="btn btn-xs btn-primary" href="{{ route('library.transaction.show', $transaction->id) }}">--}}
{{--                                        {{ trans('global.view') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}

{{--                                @can('transaction_edit')--}}
{{--                                    <a class="btn btn-xs btn-info" href="{{ route('library.transaction.edit', $transaction->id) }}">--}}
{{--                                        {{ trans('global.edit') }}--}}
{{--                                    </a>--}}
{{--                                @endcan--}}

{{--                                @can('transaction_delete')--}}
{{--                                    <form action="{{ route('library.transaction.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
{{--                                    </form>--}}
{{--                                @endcan--}}

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 0, 'desc' ]],
    pageLength: 100,
      columnDefs: [{
          orderable: true,
          className: '',
          targets: 0
      }]
  });
  $('.datatable-Transaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
