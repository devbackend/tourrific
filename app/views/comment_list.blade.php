<div id="comments">

</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $.getJSON('{{{ url('/', $parameters = array(), $secure = null) }}}/comment/1/1', function(c){
        for(i in c)
        {
            var comment = c[i];
            $('#comments').append('<div id="comment_'+comment.id+'" style="margin-left: '+(10*comment.pid)+'px">'+comment.comment+'</div>');
        }
    });
});
</script>