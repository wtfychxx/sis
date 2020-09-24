function loadcombo(id, link, type, selected, el){
    var url = link+'/'+type;
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
            $(el).empty().append('<option value="">- choose -</option>');
            if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    if(data[i]['combo_key'] == selected){
                        $(el).append('<option value="'+data[i]['combo_key']+'" selected>'+data[i]['combo_name']+'</option>');
                    }else{
                        $(el).append('<option value="'+data[i]['combo_key']+'">'+data[i]['combo_name']+'</option>');
                    }
                }
            }
        }
    });
}

function changeSelect(id, link, type, el){
    var url = link+'/'+id;
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
            $(el).empty().append('<option value="">- choose -</option>');
            if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    if(data[i]['combo_key'] == selected){
                        $(el).append('<option value="'+data[i]['combo_key']+'" selected>'+data[i]['combo_name']+'</option>');
                    }else{
                        $(el).append('<option value="'+data[i]['combo_key']+'">'+data[i]['combo_name']+'</option>');
                    }
                }
            }
        }
    });
}

function form_validate(type, el, url, data, reload, modal){
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: data,
        error: function(){
            Swal.fire({
                icon: 'error',
                title: 'Error when try connect to server, please contact your administrator!'
            });
        }
    }).done(function(data){
        if(data[1][1] == 'ok'){
            Swal.fire({
                icon: data[1][2],
                title: data[1][0]
            }).then((result) => {
               if(reload == true) {
                   window.location.reload();
               }else{
                   $(modal).modal('hide');
                   get_data();
               }
            });
        }else{
            Swal.fire({
                icon: data[1][2],
                title: data[1][0]
            });
        }
    });
}

function modal_data_put(form, link, id, language, parent, type){
    var url = link;
    (parent != '') ? parent = parent : parent = 0;
    if(id != ''){
        url = link+'/'+id;
    }
    if(language != ''){
        url = link+'/'+id+'/'+language;
    }

    if(type != ''){
        url = link+'/'+id+'/'+language+'/'+parent;
    }

    if(type != ''){
        url = link+'/'+id+'/'+language+'/'+parent+'/'+type;
    }
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
            if(data.length > 0){
                switch(type){
                    case 'book':
                        $('#txt70').val(data[0]['id']);
                        $('#txt71').val(data[0]['number']);
                        $('#txt72').val(data[0]['title']);
                        $('#txt73').val(data[0]['author']);
                        loadcombo('', $('#site_url').val()+'book/ajx_live_combo_put', 'genre', data[0]['genre__id'], '#txt74');
                        $('#txt75').val(data[0]['release_year']);
                        $('#txt76').val(data[0]['description']);
                    break;

                    default:
                        $('#txt70').val(data[0]['id']);
                        loadcombo('', $('#site_url').val()+'religion/ajx_live_combo_put', 'language', data[0]['language'], '#txt71');
                        $('#txt72').val(data[0]['name']);
                        $('#txt73').val(data[0]['description']);
                    break;
                }
            }
        }
    });
}

function delete_data(url, reload){
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if(result.value){
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                success: function(data){
                    if(data[1][1] == 'ok'){
                        Swal.fire({
                            icon: data[1][2],
                            title: data[1][0]
                        }).then((result => {
                            if(reload == true){
                                window.location.reload();
                            }else{
                                get_data();
                            }
                        }));
                    }
                }
            });
        }
    });
}

$(document).ready(function(){ 
    var date = moment().format('YYYY-MM-DD');
    // pick a date validation 1
    $('#date_from1').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', moment().format('YYYY-MM-01'));
        }
    });

    $('#date_to1').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    $('#date_from1').change(function(){
        $('#date_to1').pickadate('picker').set('min', $(this).val());
    });

    // pick a date validation 2

    $('#date_from2').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', moment().format('YYYY-MM-01'));
        }
    });

    $('#date_to2').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    $('#date_from2').change(function(){
        $('#date_to2').pickadate('picker').set('min', $(this).val());
    });

    // pick a date validation 3

    $('#date_from3').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', moment().format('YYYY-MM-01'));
        }
    });

    $('#date_to3').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    $('#date_from3').change(function(){
        $('#date_to3').pickadate('picker').set('min', $(this).val());
    });

    // pick a date validation 4

    $('#date_from4').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', moment().format('YYYY-MM-01'));
        }
    });

    $('#date_to4').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    $('#date_from4').change(function(){
        $('#date_to4').pickadate('picker').set('min', $(this).val());
    });

    // pick a date validation 5

    $('#date_from5').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', moment().format('YYYY-MM-01'));
        }
    });

    $('#date_to5').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    $('#date_from5').change(function(){
        $('#date_to5').pickadate('picker').set('min', $(this).val());
    });

    // basic pick a date function

    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        onStart: function(){
            this.set('select', date);
        }
    });

    // select2

    $('.selectpicker').select2();

    // only numeric input

    $('.numeric').on('input', function(){
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    // numeric with colon

    $('.numeric-with-colon').on('input', function(){
        this.value = this.value.replace(/[^0-9:\.]/g,'');
    });



});