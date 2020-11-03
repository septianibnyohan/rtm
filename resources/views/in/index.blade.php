@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ config('app.url') }}/css/datepicker.css">
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">List In</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                <div class="row">
                                    <div class="col-md-5 col-6">
                                        <input type="text" name="start_date" id="start_date" class="form-control" autocomplete="off"/>
                                        <br/>
                                    </div>
                                    <div class="col-md-5 col-6">
                                        <input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off"/>
                                        <br/>
                                    </div>
                                    <div class="col-md-1 col-6">
                                        <button type="button" class="btn btn-primary" style="min-width: 100%" id="btnFilter">Filter</button>
                                    </div>
                                    <div class="col-md-1 col-6 text-right">
                                        <button id="btn-download" class="btn btn-primary" 
                                            style="min-width: 100%">Download</button>
                                    </div>
                                </div>
                                <br/>
                                <table id="in-table" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Id</th>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ config('app.url') }}/js/bootstrap-datepicker.js"></script>
<script src="{{ config('app.url') }}/js/jquery.table2excel.min.js"></script>
<script>
$(function() {
    $('#start_date').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $('#end_date').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });

    var suhu_table = $('#in-table').DataTable({
        order : [[ 0, "desc" ]],
        bInfo : false,
        ajax: '{{ config('app.url')}}/listIn',
        'lengthChange': true,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'no', name: 'no' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'waktu', name: 'waktu' }
        ]
    });

    $( "#btn-download" ).click(function() {
        location.href = '{{ config('app.url') }}/excel_in?start_date=' + $('#start_date').val() + "&end_date=" + $('#end_date').val();
    });

    $( "#btnFilter").click(function() {
        $('#in-table').DataTable().clear().draw();
        $('#in-table').DataTable().destroy()
        
        $('#in-table').DataTable({
            order : [[ 0, "desc" ]],
            bInfo : false,
            ajax: '{{ config('app.url')}}/listIn?start_date=' + $('#start_date').val() + "&end_date=" + $('#end_date').val(),
            'lengthChange': true,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'no', name: 'no' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'waktu', name: 'waktu' }
            ]
        });
    });
});
</script>
@endsection