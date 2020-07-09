jQuery(function($) {
 
//
// prevent Gravity Forms form being submitted twice++
//
 
var gformSubmitted = false;
 
$(".gform_wrapper form").submit(function(event) {
    if (gformSubmitted) {
        event.preventDefault();
    }
    else {
        gformSubmitted = true;
        $("input[type='submit']", this).val("Processing, please wait...");
    }
});
 
});