<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="school_profile">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="content-header"><?= $breadcrumb ?></div>
                        <input type="hidden" id="site_url" value="<?= site_url() ?>">
                        <a href="<?= site_url() ?>admin/sis/configuration/organization/school/profile/form" class="btn btn-primary pull-right" ><i class="feather-plus"></i> Add </a>
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
                                    <th> Code </th>
                                    <th> Name </th>
                                    <th> Owner </th>
                                    <th> Phone </th>
                                    <th> Email </th>
                                    <th>  </th>
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

<script>
    function get_data(){
        $('.main').show();
        $.ajax({
            url: 'http://127.0.0.1:70/api/School',
            type: 'POST',
            dataType: 'JSON',
            success: function(data){
                $('.content-replace').show();
                $('#table_data').hide();
                $('.main').hide();
                var isDataTable = $.fn.DataTable.isDataTable('#table_data');
                if (isDataTable) {
                    $('#table_data').DataTable().clear().destroy();
                }
                if(data.result != null){
                    var html = '';
                    var i;

                    $('.content-replace').hide();
                    $('#table_data').show();
                    for(i = 0; i < data.result.length; i++){
                        html += '<tr>' +
                            '<td>' + data.result[i]['code'] + '</option>' +
                            '<td><a href="<?= site_url() ?>admin/sis/configuration/organization/school/profile/form/'+data.result[i]['id']+'" class="item-edit" data-id="' + data.result[i]['id'] + '">' + data.result[i]['name'] + '</a></td>' +
                            '<td>' + data.result[i]['owner_name'] + '</td>' +
                            '<td>' + data.result[i]['phone'] + '</td>' +
                            '<td>' + data.result[i]['email'] + '</td>' +
                            '<td><a href="javascript:void(0)" class="item-delete" data-id="' + data.result[i]['id'] + '"> Delete </a></td>' +
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

    $(document).ready(function (params) {
        get_data();
    });
</script>