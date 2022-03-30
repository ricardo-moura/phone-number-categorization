<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone numbers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>State</th>
                            <th>Country Code</th>
                            <th>Phone num</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Country</th>
                            <th>State</th>
                            <th>Country Code</th>
                            <th>Phone num</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</body>
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        // $('#example tfoot th').each(function() {
        //     var title = $(this).text();
        //     $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        // });

        // DataTable
        var table = $('#example').DataTable({
            "ajax": 'http://localhost:8081/api/phones',
            "columns": [{
                    data: "countryName"
                },
                {
                    data: "state"
                },
                {
                    data: "countryCode"
                },
                {
                    data: "phoneNumber"
                },
            ],
            "initComplete": function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
            // Apply the search
            // console.log(this.api());
            // this.api().columns().every(function() {
            //     var that = this;

            //     $('input', this.footer()).on('keyup change clear', function() {
            //         if (that.search() !== this.value) {
            //             that
            //                 .search(this.value)
            //                 .draw();
            //         }
            //     });
            // });
            // }
        });
    });
</script>

</html>
