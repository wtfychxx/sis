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
                            <input type="hidden" id="txt70" name="txtinput70">
                            <select name="txtinput71" id="txt71" class="form-control selectpicker" required>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Name </label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput72" class="form-control" id="txt72" maxlength="100" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Description </label>
                        <div class="col-lg-9">
                            <textarea name="txtinput73" id="txt73" cols="30" rows="3" class="form-control"></textarea>
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
    function get_data(){
        $('.main').show();
        $.ajax({
            url: "<?= site_url() ?>admin/sis/configuration/master_data/marital_status" + '/ajx_data_put',
            type: 'POST',
            dataType: 'JSON',
            success: function(data){
                $('.content-replace').show();
                $('#table_data').hide();
                $('.main').hide();
                var isDataTable = $.fn.DataTable.isDataTable('#table_data');
                if(isDataTable){
                    $('#table_data').DataTable().clear().destroy();
                }
                if(data.length > 0){
                    var html = '';
                    var i;
                    $('.content-replace').hide();
                    $('#table_data').show();
                    for(i = 0; i < data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i]['language']+'</option>'+
                                '<td><a href="javascript:void(0)" class="item-edit" data-id="'+data[i]['id']+'" data-language="'+data[i]['language__id']+'">'+data[i]['name']+'</a></td>'+
                                '<td>'+data[i]['description']+'</td>'+
                                '<td><a href="javascript:void(0)" class="item-delete" data-id="'+data[i]['id']+'"> Delete </a></td>'+
                                '</tr>';
                    }

                    $('#show_data').html(html);
                    $('#table_data').dataTable({
                        "order": false,
                        destroy: true
                    });
                }
            }
        });
    }
    $(document).ready(function(){
        get_data();

        var id = '';
        var language;

        $('#btn_save').on('click', function(){
            id = '';
            language = '';
        });

        $('#show_data').on('click', '.item-edit', function(){
            id = $(this).data('id');
            language = $(this).data('language')
            $('#modalForm').modal('show');
        });

        $('#modalForm').on('shown.bs.modal', function(){
            $('#modal')[0].reset();
            $('input[type=hidden]').val('');
            loadcombo('', '<?= site_url() ?>admin/sis/configuration/master_data/marital_status/ajx_live_combo_put', 'language', '', '#txt71');
            if(id != ''){
                modal_data_put('modal', '<?= site_url() ?>admin/sis/configuration/master_data/marital_status/ajx_modal_data_put', id, language, '', 'marital_status');
            }
        });

        $('#show_data').on('click', '.item-delete', function(){
            var id = $(this).data('id');
            delete_data('<?= site_url() ?>admin/sis/configuration/master_data/marital_status/ajx_delete_data/'+id, false);
        });

        $('#btn_modal_save').on('click', function(e){
            $('#modal').validate({
                submitHandler: function(){
                    e.preventDefault();
                    form_validate('modal', '#modal', '<?= site_url() ?>admin/sis/configuration/master_data/marital_status/ajx_modal_insert', $('#modal').serialize(), false, '#modalForm');
                }
            });
        });

    });
</script>