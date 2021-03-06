<?php
// JavaScript:

 ?>

<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- jQuery UI -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- TinyMCE -->
<script src="js/tinymce/tinymce.min.js"></script>

<!-- Dropzone.js -->
<script src="js/dropzone.js"></script>


<script>
  $(document).ready(function() {
    $("#console-debug").hide();
    $("#btn-debug").click(function() {
      $("#console-debug").toggle();
    });

    $(".btn-delete").on("click", function() {

      var selected = $(this).attr("id");
      var pageid = selected.split("del_").join("");

      var confirmed = confirm("Are you sure you want to delete this page?:");

      if(confirmed == true) {
        $.get("ajax/pages.php?id="+pageid);

        $("#page_"+pageid).remove();
      }


      // alert(selected);

    })

    $("#sort-nav").sortable({
      cursor: "move",
      update: function() {
        var order = $(this).sortable("serialize");
        $.get("ajax/list-sort.php", order);
      }
    });

    $('.nav-form').submit(function(event) {

      var navData = $(this).serializeArray();

      $.ajax({

        url: "ajax/navigation.php",
        type: "POST",
        data: navData

      });

      event.preventDefault();

    });

  }); // End document ready


  tinymce.init({
  selector: '.editor',
  theme: 'modern',
  plugins: [
    'code advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
