$(document).ready(function(){
    $('#description').summernote({
               placeholder: 'Enter Notice Description...',
               tabsize: 2,
               height: 200,
          });
  });

function goBack() {
  window.history.back();
}