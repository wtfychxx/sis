<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="setup">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="content-header"><?= $breadcrumb ?></div>
                        <input type="hidden" id="site_url" value="<?= site_url() ?>">
                        <button class="btn btn-primary pull-right"><i class="feather-plus"></i> Add </button>
                    </div>
                </div>

                <div class="main" style="display: none">
                    <div class="loading">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <form class="form-horizontal" id="frm_header">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2"> School </label>
                        <div class="col-lg-4">
                            <select name="txtinput[0]" id="txt0" class="form-control selectpicker" data-minimum-results-for-search="-1"></select>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        let schoolId;
        loadcombo('','http://127.0.0.1:70/api/getCombo','school', '', '#txt0');

        $('#txt0').change(function(){
            if($(this).val() != ''){
                schoolId = $(this).val();

                $.ajax({
                    url: 'http://127.0.0.1:70/api/'
                });
            }
        });
    });
</script>