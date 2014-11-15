/***** BRING FORTH THINE FARTS WHILST SCROLLING *****/
//$(document).fartscroll(800);

/*
 * jQuery Easing v1.1 - http://gsgd.co.uk/sandbox/jquery.easing.php
 *
 * Uses the built in easing capabilities added in jQuery 1.1
 * to offer multiple easing options
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */

// Dynamic search box actions
 $(document).ready(function(){

		$(".blog").click(function(){
		$('form#searchForm').attr({action: "http://www.louisvillehardcore.com/"});
		$('.searchBox1').attr('name','s');
	});

	$(".forums").click(function(){
		$('form#searchForm').attr({action: "http://forums.louisvillehardcore.com/search.php"});
		$('.searchBox1').attr('name','keywords');
	});

	$(".history").click(function(){
		$('form#searchForm').attr({action: "http://history.louisvillehardcore.com/"});
		$('.searchBox1').attr('name','search');
		$('#searchsubmit').attr('name','fulltext');
	});

});