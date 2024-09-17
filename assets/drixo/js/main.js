

$(document).ready(function () {
			  $(".navbar-toggler").on("click", function () {
				    $(this).toggleClass("active");
			  });
		});


// form

$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
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
});



   // datepicker

   $(function () {
    $("#datepicker,#datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1980:2027"
    });
});


// Drag Upload dan Preview Photo
function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        var htmlPreview =
          '<img width="200" src="' +
          e.target.result +
          '" />' +
          "<p>" +
          input.files[0].name +
          "</p>";
        var wrapperZone = $(input).parent();
        var previewZone = $(input)
          .parent()
          .parent()
          .find(".preview-zone");
        var boxZone = $(input)
          .parent()
          .parent()
          .find(".preview-zone")
          .find(".box")
          .find(".box-body");
  
        wrapperZone.removeClass("dragover");
        previewZone.removeClass("hidden");
        boxZone.empty();
        boxZone.append(htmlPreview);
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  function reset(e) {
    e.wrap("<form>")
      .closest("form")
      .get(0)
      .reset();
    e.unwrap();
  }
  
  $(".dropzone").change(function() {
    readFile(this);
  });
  
  $(".dropzone-wrapper").on("dragover", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass("dragover");
  });
  
  $(".dropzone-wrapper").on("dragleave", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("dragover");
  });
  
  $(".remove-preview").on("click", function() {
    var boxZone = $(this)
      .parents(".preview-zone")
      .find(".box-body");
    var previewZone = $(this).parents(".preview-zone");
    var dropzone = $(this)
      .parents(".form-group")
      .find(".dropzone");
    boxZone.empty();
    previewZone.addClass("hidden");
    reset(dropzone);
  });