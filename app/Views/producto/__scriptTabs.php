<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
		  allWells = $('.setup-content'),
		  allNextBtn = $('.nextBtn');

  allWells.hide();
  $('#step-1').show();

  navListItems.click(function (e) {
	  e.preventDefault();
	  var $target = $($(this).attr('href')),
			  $item = $(this);

			  
	  if (!$item.hasClass('disabled')) {
		  navListItems.removeClass('btn-info').addClass('btn-light');
		  $item.addClass('btn-info');
		  allWells.hide();
		  $target.show();
		  $target.find('input:eq(0)').focus();
	  }
  });

  allNextBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		  curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
		  isValid = true;

	  $(".form-group").removeClass("has-error");
	  for(var i=0; i<curInputs.length; i++){
		  if (!curInputs[i].validity.valid){
			  isValid = false;
			  $(curInputs[i]).closest(".form-group").addClass("has-error");
		  }
	  }

	  if (isValid)
		  nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');


   $(function() {
   $('#file-input').change(function(e) {
       addImage(e);
      });
      function addImage(e){
       var file = e.target.files[0],
       imageType = /image.*/;
       if (!file.type.match(imageType))
        return;
       var reader = new FileReader();
       reader.onload = fileOnload;
       reader.readAsDataURL(file);
      }
      function fileOnload(e) {
       var result=e.target.result;
       $('#imgSalida').attr("src",result);
      }
     });
});
  </script>