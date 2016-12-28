// Initiate wow.js
new WOW().init();

// Scrolls page to the top
window.scrollTo(0,1);


function postadder(caller)  {
	var address = "assets/ajax_add_post.php";
	$(caller).html("Добавьте признание...");
	var content_text = document.getElementById("inputContent").value;
	$.ajax({
		type: 	"POST",
		url: 	address,
		data: { content: content_text },
		success: function (msg) { 
			$(caller).html("Признание добавлено."); 
			$(caller).attr("disabled", "disabled");
			var post_id = msg;
			var address = "sucess.php?pid=" + post_id;
			window.location.href= address;
		},
		error: 	function () {
			console.log('error');
		}
	});
}
 
function likePost(caller)  {
	var post_id = caller.parentElement.getAttribute('post-id');
	//alert(post_id);
	var address = "assets/ajax_like.php";
	$(caller).find("span").html("Спасибо.");
	$.ajax({
		type: 	"POST",
		url: 	address,
		data: { data: post_id },
		success: function (msg) { 
			$(caller).html("<b>Вы За</b> <span class='badge'>"+ msg + "</span>"); 
			$(caller).parent().parent().children().children(".like_dislike").attr("disabled", "disabled");
		},
		error: 	function () {
			console.log('error');
		}
	});
}

function dislike(caller)  {
	var post_id = caller.parentElement.getAttribute('post-id');
	//alert(post_id);
	var address = "assets/ajax_dislike.php";
	$(caller).find("span").html("Спасибо!");
	$.ajax({
		type: 	"POST",
		url: 	address,
		data: { data: post_id },
		success: function (msg) { 
			$(caller).html("<b>Вы против</b> <span class='badge'>"+ msg + "</span>"); 
			$(caller).parent().parent().children().children(".like_dislike").attr("disabled", "disabled");

		},
		error: 	function () {
			console.log('error');
		}
	});
}

function comment(caller) {
	var post_id = caller.parentElement.getAttribute('post-id');
	var address = "single_post.php?pid=" + post_id;
	window.location.href= address;
}

function postComment(unique_id)  {
	var post_id = unique_id;
	var comment = document.getElementById("comment").value;
	var button = document.getElementById("add_comment");
	var if_no_comment = document.getElementById("if_no_comment");
	var address = "assets/ajax_add_comment.php";
	
	if (comment === "") {
		alert("Пожалуйста, оставьте комментарий.")
	} else {
		button.innerHTML = "Добавление...";
		$("#table").html("<tr><td>Загрузка комментария...</td></tr>");
		$.ajax({
			type: 	"POST",
			url: 	address,
			data: { comment: comment, unique_id: unique_id },
			success: function (resoult) { 
				$("#table").html(resoult); 
				button.disabled = true;
				button.innerHTML = "Спасибо!";
				$(if_no_comment).hide();
			},
			error: 	function () {
				$("#table").html("Error... Error!"); 
			}
		});
	}
}

function searchById() {
	var post_id = document.getElementById("search_input").value;
	var address = "single_post.php?pid=" + post_id;
	window.location.href= address;
}


// Google analytics

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75612377-1', 'auto');
ga('send', 'pageview');


// When press enter on textbox

$("#search_input").keyup(function(event){
    if(event.keyCode == 13){
        var post_id = document.getElementById("search_input").value;
		var address = "single_post.php?pid=" + post_id;
		window.location.href= address;
    }
});


// Shereing notifier

function shareCounter(place)  {
	var button = document.getElementById("add_comment");
	var address = "assets/ajax_sharer.php";

	$.ajax({
		type: 	"POST",
		url: 	address,
		data: { network: place },
		success: function (resoult) {}
	});
	
}