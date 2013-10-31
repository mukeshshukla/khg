function getans(qid){
    

    $.ajax({
        url: 'getans.php?qid='+qid,
        dataType: 'json',
        
    }).done(function(resp){
        console.log(resp)
        $('#annswer_'+resp).parent().addClass('active')
     
    })
}

