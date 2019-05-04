<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/popper.min.js' ?>"></script>
<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/core.min.js' ?>"></script>
<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/jquery.marquee.min.js' ?>"></script>
<script src="<?php echo base_url($this->theme_folder.'/'.$this->theme.'/plugins/jssocial/js/jssocials.min.js') ?>"></script>
<script src="<?= base_url("assets/js/jquery.cycle2.min.js") ?>"></script>
<script src="<?= base_url("assets/js/jquery.cycle2.carousel.js") ?>"></script>
<script src="<?= base_url("assets/js/leaflet.js")?>"></script>
<script type="text/javascript">
  $('.marquee').marquee({
    duration: 15000,
    gap: 0,
    duplicated: true,
    pauseOnHover: true
  });
  $(window).scroll(function () {
    let pos = $("#main-content").offset().top;
    if($(document).scrollTop() > pos){ 
      $("header").addClass("fixed-top");
    } else {
      $("header").removeClass("fixed-top");
    }
  })
</script>


<?php if (count($slide_galeri)>0 OR count($slide_artikel)>0): ?>
	<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/js/owl.carousel.min.js' ?>"></script>  
  <script type="text/javascript">
    $(document).ready(function(){
      $("#head-slider").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
        lazyLoad: true,
        loop: true
      });
    })
  </script>
<?php endif; ?>
