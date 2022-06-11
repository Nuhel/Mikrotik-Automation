@push('inner-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/css/datatable.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/css/datatable-extended.css')}}"/>
@endpush

<div class="card mt-3">


    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">{{$heading}}</h6>
        </div>
    </div>

    <div class="card-body">
        <div  class="only-bottom-border mb-3">
            <p>Filters</p>
            <div id="{{$datatableId}}-search" class="row">
            </div>
        </div>
        <div class="table-responsive p-0">
            {!! $dataTable->table() !!}
        </div>

    </div>
</div>






@push('inner-script')



    <script src="{{asset('/vendor/datatables/datatable.js')}}"></script>
    <script src="{{asset('/vendor/datatables/buttons.js')}}"></script>
    <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>

    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            //"pagingType": "full",
            "language": {
                "paginate": {
                     "first": `<i class="fas fa-angle-double-left"></i>`,
                     "previous" : `<i class="fas fa-angle-left"></i>`,
                     "next" : `<i class="fas fa-angle-right"></i>`,
                     "last" : `<i class="fas fa-angle-double-right"></i>`
                }
            }
        });
    </script>

    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function() {
            const json = '{!! $datatableFilters !!} ';
            const filters = JSON.parse(json);

            //var dataTable = $('#{{$datatableId}}').dataTable();

            var columns = $('#{{$datatableId}}').dataTable().api().columns();
            columns.every(function () {
                var column = this;
                if(filters[column.index()] !== undefined){
                    var input = $('<input/>', {
                        class: 'form-control ',
                        //placeholder: filters[column.index()]
                    }).on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    }).wrap('<div>').parent().addClass('input-group input-group-outline')
                        .prepend(`<label class="form-label">`+filters[column.index()]+`</label>`)
                    .wrap('<div>').parent().addClass('col-sm-12 col-md')
                    .appendTo($('#{{$datatableId}}-search'));
                }

            });
            $('#{{$datatableId}}_filter').remove();
            $('#{{$datatableId}}-reset-button').click(function(){
                $('#{{$datatableId}}-search').find('input').val('');
            });


        });
    </script>
@endpush
