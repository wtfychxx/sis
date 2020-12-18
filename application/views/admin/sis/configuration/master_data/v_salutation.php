<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="master_book">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="content-header"><?= $breadcrumb ?></div>
                        <input type="hidden" id="site_url" value="<?= site_url() ?>">
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalForm" id="btn_save"> Add </button>
                    </div>
                </div>

                <div class="main">
                    <div class="loading">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <div class="content-replace text-center" style="display: none"> Sorry, there is no data yet. </div>
                        <table class="table table-bordered" id="table_data" style="display: none">
                            <thead>
                                <tr>
                                    <th> Language </th>
                                    <th> Name </th>
                                    <th> Description </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody id="show_data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<div class="modal fade" id="modalForm" role="document">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> Detail </h3>
                <button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" class="form-horizontal" id="modal">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> language </label>
                        <div class="col-lg-9">
                            <input type="hidden" id="txt70" name="txtinput[70]">
                            <input type="hidden" id="module_table_id" name="module_table_id">
                            <select name="txtinput[71]" id="txt71" class="form-control selectpicker" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Name </label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[72]" class="form-control" id="txt72" maxlength="100" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Description </label>
                        <div class="col-lg-9">
                            <textarea name="txtinput[73]" id="txt73" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn_modal_save" type="submit"> Save </button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let module_table = '<?= $module_table_id ?>';
    function get_data() {
        $('.main').show();
        $.ajax({
            url: "http://127.0.0.1:70/api/MasterData",
            type: 'POST',
            dataType: 'JSON',
            data: JSON.stringify({
                "module_table__id": module_table
            }),
            success: function(data) {
                $('.content-replace').show();
                $('#table_data').hide();
                $('.main').hide();
                var isDataTable = $.fn.DataTable.isDataTable('#table_data');
                if (isDataTable) {
                    $('#table_data').DataTable().clear().destroy();
                }
                if (data.result != null) {
                    var html = '';
                    var i;
                    $('.content-replace').hide();
                    $('#table_data').show();
                    for (i = 0; i < data.result.length; i++) {
                        html += '<tr>' +
                            '<td>' + data.result[i]['language'] + '</option>' +
                            '<td><a href="javascript:void(0)" class="item-edit" data-id="' + data.result[i]['id'] + '" data-language="' + data.result[i]['language__id'] + '">' + data.result[i]['name'] + '</a></td>' +
                            '<td>' + data.result[i]['description'] + '</td>' +
                            '<td><a href="javascript:void(0)" class="item-delete" data-id="' + data.result[i]['id'] + '" data-language="'+data.result[i]['language__id']+'"> Delete </a></td>' +
                            '</tr>';
                    }

                    $('#show_data').html(html);
                    $('#table_data').dataTable({
                        "order": false,
                        destroy: true
                    });
                }else{
                    $('#show_data').html('<center>'+data.message+'</td>');
                }
            }
        });
    }
    $(document).ready(function() {
        get_data();

        var id = '';
        var language;
        let object = {};

        $('#module_table_id').val(module_table);
        
        $('#btn_save').on('click', function() {
            id = '';
            language = '';
        });

        $('#show_data').on('click', '.item-edit', function() {
            id = $(this).data('id');
            language = $(this).data('language')
            $('#modalForm').modal('show');
        });

        $('#modalForm').on('shown.bs.modal', function() {
            $('#modal')[0].reset();
            $('input[type=hidden]').val('');
            loadcombo('', 'http://127.0.0.1:70/api/getCombo', 'language', '', '#txt71');
            $('#module_table_id').val(module_table);
            if (id != '') {
                object = {
                    language__id: language,
                    id: id
                };
                modal_data_put('modal', 'http://127.0.0.1:70/api/MasterData/modalDataPut', object, '', 'salutation', 'POST');
                object = '';
            }

        });

        $('#show_data').on('click', '.item-delete', function() {
            object = {
                id: $(this).data('id'),
                language: $(this).data('language')
            }
            delete_data('http://127.0.0.1:70/api/MasterData/deleteData', object, false);
        });

        $('#btn_modal_save').on('click', function(e) {
            $('#modal').validate({
                submitHandler: function() {
                    e.preventDefault();
                    var methods = ($('#txt70').val() == '') ? 'POST' : 'PUT';
                    object = objectivityForm($('#modal').serializeArray());
                    form_validate('modal', '#modal', 'http://127.0.0.1:70/api/MasterData/createData', object, false, '#modalForm', methods);
                    object = '';
                }
            });
        });

    });
</script>