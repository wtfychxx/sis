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
	$('a').click(function(event){
		if($(this).attr('href') != '<?= base_url(); ?>#' && $(this).attr('class') == 'link_menu'){
			window.location.replace($(this).attr('href'));
		}
	})
</script>