@extends('layouts.library')
@section('content')
@can('asset_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("library.assets.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.asset.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header" style="font-weight:bold;">
        {{ trans('cruds.asset.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body" >
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Asset">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.publication') }} / {{ trans('cruds.asset.fields.edition') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.language') }}
                        </th>
                        <th>
                            {{ trans('cruds.asset.fields.pages') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $key => $asset)
                        <tr data-entry-id="{{ $asset->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $asset->name ?? '' }}
                            </td>
                            <td>
                                {{ $asset->author ?? '' }}
                            </td>
                            <td>
                                {{ $asset->publication ?? '' }} {{ $asset->edition ?? '' }}
                            </td>
                            <td>
                                {{ $asset->description ?? '' }}
                            </td>
                            <td>
                                {{ $asset->language ?? '' }}
                            </td>
                            <td>
                                {{ $asset->pages ?? '' }}
                            </td>
                            <td>
                                @can('asset_show')
                                    <a href="{{ route('library.assets.show', $asset->id) }}" >
                                    <i class="fa fa-eye view" style="margin-left:5px; " aria-hidden="true" ></i>
                                    </a>
                                @endcan

                                @can('asset_edit')
                                    <a href="{{ route('library.assets.edit', $asset->id) }}">
                                    <i class="fa fa-pencil  edit"  style="margin-left:5px; " aria-hidden="true" ></i>
                                    </a>
                                @endcan

                                @can('asset_delete')
                                    <form action="{{ route('library.assets.destroy', $asset->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" style=" border:none; background:none;"  value="{{ trans('global.delete') }}">
                                        <i class="fa fa-trash delete"  aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endcan

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
@can('asset_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('library.assets.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  $('.datatable-Asset:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
