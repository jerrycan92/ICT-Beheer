// JavaScript Document
var BASEPATHSHORT = "/";
var BASEPATH = location.protocol + "//" + location.host + BASEPATHSHORT;

$(document).ready(function() {
	var actualQuestion = 1;
	$(".workaround").hide();
	$(".vragen").hide();
	$("#vraag-1").show();
	
	$(".meldenVragenAntwoorden").live("change", function () {
		var answer = $(this).val();
		var question = $(this).attr("name");
		var answerShow = (question + "[" + answer.toLowerCase() + "]").replace("vraag", "workaround");
		
		answerShow = answerShow.replace(/\[/g, "-").replace(/\]/g, "");
		var answerShowContent = $("#" + answerShow).text();
		var questionNR = answerShow.split("-");
		questionNR = questionNR[1];
		
		if (actualQuestion > questionNR) {
			for (questionNR++; questionNR < 100; questionNR++) {
				$(".workaround").hide();
				$("#vraag-" + questionNR).hide();
				//$("[name='vraag[" + questionNR + "]']").reset();
			}
		}
		
		if (!$.isNumeric(answerShowContent)) {
			$(".workaround").hide();
			$("#" + answerShow).show();
		} else {
			$("#vraag-" + answerShowContent.replace(/\s{1,}/g,'')).show();
			actualQuestion = answerShowContent.replace(/\s{1,}/g,'');
		}
	});

	/* Ajax voorbeeld */
	$("[name='addToShoppingcartButton']").live("click", function () {
		var information = $("[name='addToShoppingcart']").serialize();
		
		ajaxAction('view/shoppingcart', 'shoppingcart', 'add', '?' + information, function () {
			$("#right").load(BASEPATH + "/view/shoppingcart/shoppingcart.view.php");
		});
	});
});

function ajaxAction (path, section, action, information, callback) {
	$.ajax({
		url: BASEPATHSHORT + path + '/' + section + '.' + action + '.php' + information,
		success: function (data) {
			if (callback != false) {
				callback();	
			}
			console.log("Ajax succes!");
		}
	});
}