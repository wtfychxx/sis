<?php $this->load->view('admin/partials/header'); ?>

<body data-col="2-columns" class=" 2-columns">
	<div class="wrapper">
		<header class="main-header">
			<?php $this->load->view('admin/partials/top-nav'); ?>
		</header>

		<aside class="main-sidebar">
			<?php $this->load->view('admin/partials/sidebar'); ?>
		</aside>

		<div class="content-wrapper" style="height: auto; min-height: 100%">
			<?php $this->load->view($content); ?>
		</div>

		<footer class="main-footer">
			<?php $this->load->view('admin/partials/footer'); ?>
		</footer>
	</div>
</body>

<script>
	$('a').click(function(event) {
		if ($(this).attr('href') != '<?= base_url(); ?>#' && $(this).attr('class') == 'link_menu') {
			window.location.replace($(this).attr('href'));
		}
	});

	// method to save setting template
	let bgImage, bgColor, theme, bodyBg, imageStatus,
    getBgImage, getBgColor, getTheme, getBodyBg, getImageStatus;

    if(localStorage.getItem("bg-image") !== null){
        getBgImage = localStorage.getItem("bg-image");
        if(localStorage.getItem("image-status") !== null){
            if(localStorage.getItem("image-status") == 'true'){
                $(".app-sidebar").attr("data-image", getBgImage);
                $(".sidebar-background").css("background-image", "url(" + getBgImage + ")");
            }else{
                $(".app-sidebar").attr("data-image", '');
                $(".sidebar-background").css("background-image", "none");
            }
        }else{
            $(".app-sidebar").attr("data-image", getBgImage);
            $(".sidebar-background").css("background-image", "url(" + getBgImage + ")");
        }
        
    }

    if(localStorage.getItem("bg-color") !== null){
        getBgColor = localStorage.getItem("bg-color");
        $('.app-sidebar').attr('data-background-color', getBgColor);
    }

    if(localStorage.getItem("theme") !== null){
        $("body").removeClass(
            "layout-transparent layout-dark bg-hibiscus bg-purple-pizzazz bg-blue-lagoon bg-electric-violet bg-portage bg-tundora bg-glass-1 bg-glass-2 bg-glass-3 bg-glass-4"
        );
        getTheme = localStorage.getItem("theme");
        console.log(getTheme);
        if(getTheme.indexOf('layout-transparent') >= 0){
            $('.app-sidebar').attr('data-background-color', 'black');
            $(".app-sidebar").attr("data-image", '');
            $('.sidebar-background').css('background-image', "none");

        }
        $('body').addClass(getTheme);
    }

    if(localStorage.getItem("body-background") !== null){
        if($('body').hasClass('layout-transparent')){
            $('body').removeClass('bg-hibiscus bg-purple-pizzazz bg-blue-lagoon bg-electric-violet bg-portage bg-tundora bg-glass-1 bg-glass-2 bg-glass-3 bg-glass-4');

            getBodyBg = localStorage.getItem("body-background");
            $('body').addClass(getBodyBg);
        }
    }

    if(localStorage.getItem("image-status") !== null){
        getImageStatus = localStorage.getItem("image-status");

        if(!$('body').hasClass('layout-transparent')){
            if(getImageStatus == 'true'){
                $(".app-sidebar").attr("data-image", getBgImage);
                $(".sidebar-background").css("background-image", "url(" + getBgImage + ")");
                $('.cz-bg-image-display').prop('checked', true);
            }else{
                $(".app-sidebar").attr("data-image", '');
                $('.sidebar-background').css('background-image', "none");
                $('.cz-bg-image-display').prop('checked', false);
            }
        }
    }


    $('.cz-bg-color span').on('click', function(){
        var $this = $(this),
            bgColor = $this.data('bg-color');

        localStorage.setItem("bg-color", bgColor);
    });

    $('.cz-bg-image img').on('click', function() {
        var $this = $(this),
            bgImage = $this.attr('src');

        localStorage.setItem("bg-image", bgImage);
    });

    $("#dl-switch").on('click', function(){
        localStorage.setItem("theme", "layout-dark");
        localStorage.setItem("bg-color", "black");
        // console.log(localStorage.getItem("bg-color"));
    });

    $("#ll-switch").on('click', function(){
        localStorage.removeItem("theme");
    });

    $("#tl-switch").on('click', function(){
        localStorage.setItem("theme", "layout-transparent layout-dark bg-glass-1");
    });

    $('.customizer-content span').on('click', function(){
        if($('body').hasClass('layout-transparent')){
            bodyBg = $(this).attr('data-bg-color');

            localStorage.setItem("body-background", bodyBg);
        }
    });

    $('.cz-tl-bg-image .col-sm-3 img.rounded').on('click', function(){
        var url, segment, file, className;
        url = $(this).attr('src');
        segment = url.split('/');
        file = segment.pop();
        className = file.split('.');

        bodyBg = className[0];
        localStorage.setItem("body-background", bodyBg);
    });

    $(".cz-bg-image-display").on("click", function() {
        var $this = $(this);

        if($this.prop('checked') === true){
            localStorage.setItem("image-status", 'true');
        }else{
            localStorage.setItem("image-status", 'false');
        }
    });
</script>