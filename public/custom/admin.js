

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

});