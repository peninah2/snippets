// https://www.freakyjolly.com/custom-jquery-function-read-more-and-read-less/
	function AddReadMore() {
    var carLmt = 100;
    var readMoreTxt = "more";
    var readLessTxt = "less";
 
 
    // Traverse all selectors with this class and manipulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;
 
        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }
 
    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});




/* Product Usage show/hide */
.addReadMore.showlesscontent .SecSec,
.addReadMore.showlesscontent .readLess,
.addReadMore.showmorecontent .readMore {
	display: none;
}

.addReadMore .readMore,
.addReadMore .readLess {
    cursor: pointer;
	color: #ff8f29;
	text-decoration: underline;
	margin-left: 3px;
}

.addReadMore .readMore:hover,
.addReadMore .readLess:hover,
.addReadMore .readMore:focus,
.addReadMore .readLess:focus {
	text-decoration: none;
}

.addReadMore .readLess {
	color: #ff8f29;
}
 
.addReadMoreWrapTxt.showmorecontent .SecSec,
.addReadMoreWrapTxt.showmorecontent .readLess {
   display: block;
}