

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


             //delete btn alert
             $('.delete-form').submit(function(e){

                let conf =confirm('Are you Sure ?');
    
                if (conf) {
                    return true;
                }else{
                    e.preventDefault();
                }
            });
            
    
            $('#slider-photo').change(function(e){
    
                const photo_url = URL.createObjectURL(e.target.files[0]);
                $('#slider-photo-preview').attr('src',photo_url);
            });
    
    
            //add-new-btn-slider
            let btnno = 1;
            $('#add-new-btn-slider').click(function(e){
                e.preventDefault();
    
                $('.slider-btn-otp').append(`
                    <div class="btn-otp-area">
                    <span>Button #${btnno}</span>
                    <input class="form-control" type="text" name = "btn_title[]" placeholder="Button Title">
                    <input class="form-control" type="text" name = "btn_link[]" placeholder="Button Link">
                    <select class="form-control" name="btn_type[]">
                        <option value="btn-light-out">default</option>
                        <option value="btn-color btn-full">Red</option>
                    </select>
                    </div>
                `)
                btnno++;
            })
    
            //Select Icon
    
            $('button.show-icon').click(function(e){
                e.preventDefault();
                $('#select-icon').modal('show');
            })
    
            //Select Icon
    
            $('.select-icon-modal .preview-icon code').click(function(){
    
                let icon_name = $(this).html();
                $('.select-icon-show').val(icon_name);
                $('#select-icon').modal('hide');
            })
    
            //Gallery
            $('#gallery-photo').change(function(e){
                const files = e.target.files;
                let gallery_ui = '';
    
                for (let i = 0; i < files.length; i++) {
                   const obj_url = URL.createObjectURL(files[i]);
                    gallery_ui += `<img src= "${ obj_url }">`;
                }
    
                $('.port-gall').append(gallery_ui);
    
    
            });
    
                ClassicEditor
                    .create( document.querySelector( '#posteditor' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
    
    
                ClassicEditor
                    .create( document.querySelector( '#posteditor2' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
                
                
                $('.blog-tag-2').select2();


});

