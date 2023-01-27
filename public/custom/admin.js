

$(document).ready( function () {

    $('.data-table-search').DataTable();

    $('#student-photo').change(function(e){

        const photo_url = URL.createObjectURL(e.target.files[0]);
        $('#student-photo-preview').attr('src',photo_url);
    });

    
        let btn_no = 0;
        $('.addmoreclassamount').click(function(e){
            e.preventDefault();
            let whole_extra_item_add = $(".whole_extra_item_add").html();
            $(".add-more-item").append(whole_extra_item_add)
            btn_no+1;
        })

        $('.removeitem').click(function(e){
            e.preventDefault();
            $(".delete_whole_extra_item_add").remove();
            btn_no-=1;
        })

        //Select Class
        $('select[name="class_id"]').on('change', function(){
            var class_id = $(this).val();
            if(class_id){
                $.ajax({
                    url:"get-subject/"+class_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $("#assign_subject_id").empty();
                        $.each(data, function(key, value){
                            $("#assign_subject_id").append('<option value="'+value.id+'">'+value.subject.name+'</option>');
                        })
                    }
                })
            }else{
                alert('danger');
            }
        })


});

