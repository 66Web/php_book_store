$(function(){
	var pageNum = 0;

	for (var i = 0; i < $('.runPage').length; i++) {
		$('.runPage').eq(i).css('z-index',7-2*i);
		$('.runPage').eq(i).children('div').css('z-index',7-2*i);
		$('.runPage').eq(i).children('img').css('z-index',6-2*i);
	};

	$('.nextBtn').bind('click',function(){
			if ( pageNum <= 2 ) {
				runNext(pageNum);
			pageNum++;
			};
			console.log(pageNum);					
	});

	function runNext(index){
		$('.runPage').eq(index).addClass('runClass');
		zIndexNext(index,$('.runPage').eq(index));
	}

	function zIndexNext(index,element){
		if ( index >= 1 ) {
			element.css('z-index',3+2*index);
		};	
		setTimeout(function(){
			if (index==0) {
				element.css('z-index',3+2*index);
			};
			element.children('div').css('z-index',2+2*index);
			element.children('img').css('z-index',3+2*index);		
		},1000);
	}

	$('.lastBtn').bind('click',function(){
			if ( pageNum >= 1 ) {				
			pageNum--;
			runLast(pageNum);
			};
			console.log(pageNum);					
	});

	function runLast(index){
		$('.runPage').eq(index).removeClass('runClass');
		zIndexLast(index,$('.runPage').eq(index));
	}

	function zIndexLast(index,element){
		if (index == 0) {
			element.css('z-index',7-2*index);
		};
		setTimeout(function(){
			element.css('z-index',7-2*index);
			element.children('div').css('z-index',7-2*index);
			element.children('img').css('z-index',6-2*index);		
		},1000);
	}
});