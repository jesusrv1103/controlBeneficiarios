<script src="assets/js/jquery-2.1.0.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/common-script.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jPushMenu.js"></script> 
<script type="text/javascript"  src="plugins/toggle-switch/toggles.min.js"></script> 
<script src="assets/plugins/checkbox/zepto.js"></script>
<script src="assets/plugins/checkbox/icheck.js"></script>
<script src="assets/js/icheck-init.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/icheck.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
<script type="text/javascript" src="assets/js/form-components.js"></script> 
<script type="text/javascript" src="assets/plugins/input-mask/jquery.inputmask.min.js"></script> 
<script type="text/javascript" src="assets/plugins/input-mask/demo-mask.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script> 
<script type="text/javascript" src="assets/plugins/dropzone/dropzone.min.js"></script> 
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script>


/*==Porlets Actions==*/
    $('.minimize').click(function(e){
      var h = $(this).parents(".header");
      var c = h.next('.porlets-content');
      var p = h.parent();
      
      c.slideToggle();
      
      p.toggleClass('closed');
      
      e.preventDefault();
    });
    
    $('.refresh').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      var loading = $('&lt;div class="loading"&gt;&lt;i class="fa fa-refresh fa-spin"&gt;&lt;/i&gt;&lt;/div&gt;');
      
      loading.appendTo(p);
      loading.fadeIn();
      setTimeout(function() {
        loading.fadeOut();
      }, 1000);
      
      e.preventDefault();
    });
    
    $('.close-down').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      
      p.fadeOut(function(){
        $(this).remove();
      });
      e.preventDefault();
    });

</script>


<script src="assets/js/jPushMenu.js"></script> 
<script src="assets/js/side-chats.js"></script>

</body>
</html>
</body>
</html>