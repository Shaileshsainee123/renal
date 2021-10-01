@extends('layouts.dash')
@section('content')
    <button type="button" class="btn btn-primary btn-lg mb-2" data-toggle="modal" data-target="#modelId">
        Add Patients
    </button>
    <table id="getPetients" class="table table-striped table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Mobile</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new Patients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('staff.savepetients')}}" id="petientsform" autocomplete="off"
                        onsubmit="saveform();">
                        @csrf
                        <div class="form-group">
                            <label for="">Petients Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="helpId"
                                placeholder="Enter name">
                            <span class="text-danger err" id="e-name"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" class="form-control" name="age" aria-describedby="helpId"
                                placeholder="Enter age">
                            <span class="text-danger err" id="e-age"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" class="form-control" name="mobile" aria-describedby="helpId"
                                placeholder="Enter Mobile">
                            <span class="text-danger err" id="e-mobile"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="saveform();">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('dash') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('dash') }}/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('dash') }}/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('dash') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script>
        function saveform() {
            $('.err').hide();
            var form = $("#petientsform");
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serialize(),
                success: function(r) {
                    if (r.success) {
                        $("#modelId").modal("toggle");
                        form[0].reset();
                        loadtable();
                    }

                },
                error: function(dp) {
                    $.each(dp.responseJSON.errors, function(i, f) {
                        $("#e-" + i).show();
                        $("#e-" + i).text(f[0]);
                    })
                }
            });
        }
        var notloaded = 1;

        function loadtable() {

            if (notloaded) {
                $("#getPetients").DataTable({
                    ajax: "{{ route('staff.getPetients')}}",
                    columns: [{
                            data: 'name'
                        },
                        {
                            data: 'age'
                        },
                        {
                            data: 'mobile'
                        },
                        {
                            data: 'id',
                            render: function(data, type, row) {
                                return `<button class='btn btn-danger' onclick='delpetients(${data})' >Delete</button>`;
                            },
                        },
                    ]
                });

                notloaded = 0;
            } else

                $("#getPetients").DataTable().ajax.reload();
        }



        function delpetients(id) {
            $.get("{{ url('staff/delpetients') }}/" + id);
            loadtable();
        }



        window.onload = function() {
            loadtable();
        }
    </script>

@endpush

@push('head')
    <!-- DataTables -->
    <link href="{{ asset('dash') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('dash') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endpush
