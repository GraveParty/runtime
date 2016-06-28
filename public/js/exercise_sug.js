
$('#pppp').click(function(){
	
   		var coachid = $('#coach_list option:selected').val();
    	var title = $('#one_title').val();
    	var content = $('#one_content').val();
    	var kind = $('#one_category option:selected').text();
    	$.get('http://localhost:8000/exercise/suggestion/ask',
    			{
    				title:title,
    				content:content,
    				kind:kind,
    				coachid:coachid
    			},
    			function(d){
    				alert('成功!');
    				location.reload();
    			}
    		);
   	
});

