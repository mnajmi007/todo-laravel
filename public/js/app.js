$(function(){
    $("#submitHandle").prop("disabled", true);
    $("#submitHandle").click(function(){
        var activity = $("#activity").val();
        
        $.ajax({
            url:'/add-activity',
            type:'POST',
            data:{
                activity:activity
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $("#notifikasi").html("<span>"+ data +"<a href='/homepage'>Kembali ke halaman</a></span>");
            }
        });

        return false;
    });

    $("#showModal").click(function(){
        $("#formModal").modal('show');
    });

    $("#activity").keyup(function(){
        var value = $("#activity").val();
        if(value != ''){
            $("#submitHandle").prop("disabled", false);
        }
        else{
            $("#submitHandle").prop("disabled", true);
        }
    });

    $(".task").click(function(){
        var ID = $(this).attr("id");
        $("#completeTask"+ID).slideUp();
        return false;
    });

    $("[name='checkActivity']").change(function() {
        var check = $(this).is(':checked', true);
        var ID = $(this).attr("id");
        var activity = [];
        activity.push(ID);
        activity = activity.toString();

        $.ajax({
            type:"POST",
            url:"/check-activity/"+ID,
            data:{
                activity:activity
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                if(check){
                    $("#checbox-icon"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="rgba(150,150,150,1)"/></svg>');
                    $("#checkActivity"+ID).css("color","#969696");
                }
                else{
                    $("#checbox-icon"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" fill="rgba(150,150,150,1)"/></svg>');
                    $("#checkActivity"+ID).css("color","#000000");
                }
                console.log(data);
            }
        });
    });

    $("[name='unCheckActivity']").change(function(){
        var unCheck = $(this).is(':checked', false);
        var ID = $(this).attr("id");
        var activity = [];
        activity.push(ID);
        activity = activity.toString();
        
        $.ajax({
            type:"POST",
            url:"/uncheck-activity/"+ID,
            data:{
                activity:activity
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                if(unCheck){
                    $("#checbox-icon"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" fill="rgba(150,150,150,1)"/></svg>');
                    $("#unCheckActivity"+ID).css("color","#000000");
                }
                else{
                    $("#checbox-icon"+ID).html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="rgba(150,150,150,1)"/></svg>');
                    $("#unCheckActivity"+ID).css("color","#969696");
                }
                console.log(data);
            }
        });
    });
});