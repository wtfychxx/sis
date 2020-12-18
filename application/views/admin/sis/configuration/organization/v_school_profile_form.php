<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="school_profile_form">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="content-header"><?= $breadcrumb ?></div>
                        <input type="hidden" id="site_url" value="<?= site_url() ?>">
                    </div>
                </div>

                <form class="form-horizontal mt-4" id="frm_header">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Parent </label>
                        <div class="col-lg-9">
                            <input type="hidden" name="txtinput[0]" id="txt0">
                            <select name="txtinput[1]" id="txt1" class="form-control selectpicker" data-minimum-results-for-search="-1"></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Code <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[2]" id="txt2" class="form-control" maxlength="10" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Name <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[3]" id="txt3" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Name Official <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[4]" id="txt4" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Owner Name <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[5]" id="txt5" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Address <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <textarea name="txtinput[6]" id="txt6" cols="30" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Country <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <select name="txtinput[7]" id="txt7" class="form-control selectpicker" required></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Province <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <select name="txtinput[8]" id="txt8" class="form-control selectpicker" required>
                                <option value="">- choose -</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> City <small class="label-required">(required)</small></label>
                        <div class="col-lg-9">
                            <select name="txtinput[9]" id="txt9" class="form-control selectpicker" required>
                            <option value="">- choose -</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Zipcode </label>
                        <div class="col-lg-4">
                            <input type="text" name="txtinput[10]" id="txt10" class="form-control numeric">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Email </label>
                        <div class="col-lg-9">
                            <input type="email" name="txtinput[11]" id="txt11" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> Phone </label>
                        <div class="col-lg-9">
                            <input type="text" name="txtinput[12]" id="txt12" class="form-control numeric">
                        </div>
                    </div>

                    <div class="form-group row">
                        <button class="btn btn-primary" id="btn_save" type="submit"><i class="feather-save"></i> Save </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script>
    let object;
    var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
    var segment_array = segment_str.split( '/' );
    var last_segment = segment_array.pop();
    function get_data(){
        if(last_segment != 'form'){
            $.ajax({
                url: 'http://127.0.0.1:70/api/School/modalDataPut',
                dataType: 'JSON',
                type: 'POST',
                data: JSON.stringify({
                    id: last_segment
                }),
                success: function(data){
                    $('#txt0').val(data.result.id);
                    if(data.result.parent_id == 0){
                        $('#txt1').val(data.result.parent_id).trigger('change');
                    }else{
                        loadcombo('', 'http://127.0.0.1:70/api/getCombo', 'school_parent', data.result.parent_id, '#txt1');
                    }
                    $('#txt2').val(data.result.code);
                    $('#txt3').val(data.result.name);
                    $('#txt4').val(data.result.name_official);
                    $('#txt5').val(data.result.owner_name);
                    $('#txt6').val(data.result.address);
                    loadcombo('', 'http://127.0.0.1:70/api/getCombo', 'country', data.result.country__id, '#txt7');
                    loadcombo(data.result.country__id, 'http://127.0.0.1:70/api/getCombo', 'province', data.result.province__id, '#txt8');
                    loadcombo(data.result.province__id, 'http://127.0.0.1:70/api/getCombo', 'city', data.result.city__id, '#txt9');
                    $('#txt10').val(data.result.zipcode);
                    $('#txt11').val(data.result.email);
                    $('#txt12').val(data.result.phone);
                }
            });
        }
    }

    $(document).ready(function(){
        loadcombo('','http://127.0.0.1:70/api/getCombo','school_parent','','#txt1');
        loadcombo('','http://127.0.0.1:70/api/getCombo','country','','#txt7');
        get_data();

        $('#txt7').on('change', function(){
            if($(this).val() != ''){
                loadcombo($(this).val(), 'http://127.0.0.1:70/api/getCombo', 'province', '', '#txt8');
            }
        });

        $('#txt8').on('change', function(){
            if($(this).val() != ''){
                loadcombo($(this).val(), 'http://127.0.0.1:70/api/getCombo', 'city', '', '#txt9');
            }
        });

        $('#btn_save').on('click', function(e){
            $('#frm_header').validate({
                submitHandler: function(){
                    e.preventDefault();
                    var methods = ($('#txt0').val() == '') ? 'POST' : 'PUT';
                    object = objectivityForm($('#frm_header').serializeArray());
                    form_validate('form', '#frm_header', 'http://127.0.0.1:70/api/School/createData', object, true, '#modalForm', methods, '<?= site_url() ?>admin/sis/configuration/organization/school/profile');
                    object = '';
                }
            });
        });

        $(document).on('keydown', function(e){
            if(e.keyCode == 13){
                $('#btn_save').click();
            }
        });
    });
</script>