function checkName(){
    $.post('__URL__/checkName',{'keyword':$('#keyword').val()},function(data){
        $('#result').html(data.info).show();
        $('#list').html(data.data).show();
    },'json');
};