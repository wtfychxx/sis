<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section id="add_new_employee">
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <div class="content-header"><?= $breadcrumb ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <form class="form-horizontal" id="frm_employee">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">
                                        Name Official
                                        <br>
                                        <small class="label-required">(required)</small>
                                    </label>

                                    <div class="col-lg-3">
                                        <input type="text" name="txtinput0" class="form-control" id="txt0" required>
                                    </div>

                                    <label class="col-form-label col-lg-3">
                                        Name Nick
                                        <br>
                                        <small class="label-required">(required)</small>
                                    </label>

                                    <div class="col-lg-3">
                                        <input type="text" name="txtinput1" class="form-control" id="txt1" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <button class="btn btn-primary pull-right" type="submit" id="btn_save"> Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

    });
</script>