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
                                    <th> Number </th>
                                    <th> Title </th>
                                    <th> Author </th>
                                    <th> Genre </th>
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
                        <label class="col-form-label col-lg-3"> Number </label>
                        <div class="col-lg-7">
                            <input type="hidden" id="txt70" name="txtinput70">
                            <input type="text" name="txtinput71" class="form-control" id="txt71" readonly required>
                        </div>

                        <div class="col-lg-2">
                            <a href="javascript:void(0)" class="link_change_number pull-right mt-1"> Change </a>                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Title </label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput72" class="form-control" id="txt72" maxlength="100" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Author </label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput73" class="form-control" id="txt73" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Genre </label>
                        <div class="col-lg-9">
                            <select name="txtinput74" id="txt74" class="form-control selectpicker" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Release Year </label>
                        <div class="col-lg-4">
                            <input type="text" name="txtinput75" class="form-control numeric" id="txt75" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Description </label>
                        <div class="col-lg-9">
                            <textarea name="txtinput76" id="txt76" cols="30" rows="3" class="form-control"></textarea>
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
            url: "<?= site_url() ?>admin/sis/configuration/master_data/book" + '/ajx_data_put',
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
                                '<td>'+data[i]['number']+'</option>'+
                                '<td><a href="javascript:void(0)" class="item-edit" data-id="'+data[i]['id']+'">'+data[i]['title']+'</a></td>'+
                                '<td>'+data[i]['author']+'</td>'+
                                '<td>'+data[i]['genre']+'</td>'+
                                '<td><a href="javascript:void(0)" class="item-delete" data-id="'+data[i]['id']+'"> Delete </a></td>'+
                                '</tr>';
                    }

                    $('#show_data').html(html);
                    $('#table_data').dataTable({
                        "order": [[1, 'asc']],
                        destroy: true
                    });
                }
            }
        });
    }
    $(document).ready(function(){
        get_data();

        var id = '';

        $('#btn_save').on('click', function(){
            id = '';
        });

        $('#show_data').on('click', '.item-edit', function(){
            id = $(this).data('id');
            $('#modalForm').modal('show');
        });

        $('#modalForm').on('shown.bs.modal', function(){
            $('#modal')[0].reset();
            $('input[type=hidden]').val('');
            $('#txt71').prop('readonly', true);
            $.getJSON('<?= site_url() ?>admin/sis/configuration/master_data/book/ajx_live_generate_book_number', function(data){
                $('#txt71').val(data);
            });
            loadcombo('', '<?= site_url() ?>admin/sis/configuration/master_data/book/ajx_live_combo_put', 'genre', '', '#txt74');
            if(id != ''){
                modal_data_put('modal', '<?= site_url() ?>admin/sis/configuration/master_data/book/ajx_modal_data_put', id, '', '', 'book');
            }
        });

        $('#show_data').on('click', '.item-delete', function(){
            var id = $(this).data('id');
            delete_data('<?= site_url() ?>admin/sis/configuration/master_data/book/ajx_delete_data/'+id, false);
        });

        $('#btn_modal_save').on('click', function(e){
            $('#modal').validate({
                submitHandler: function(){
                    e.preventDefault();
                    form_validate('modal', '#modal', '<?= site_url() ?>admin/sis/configuration/master_data/book/ajx_modal_insert', $('#modal').serialize(), false, '#modalForm');
                }
            });
        });

        $('.link_change_number').on('click', function(){

            $('#txt71').prop('readonly', false);
            // $('#txt71').css('border', '1px solid #A6A9AE');
        });

    });
</script>