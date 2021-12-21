$(document).ready(function() {
    function load_page_details(id) {
        $.ajax({
            url: "showinfo.php",
            method: "POST", 
            data: {id:id}, 
            success: function(data) {
                $('#page_details').html(data);
            }
        });
    }
    load_page_details(1);

    $('.topmenu li').click(function() {
        var page_id = $(this).attr("id");
        load_page_details(page_id);
    })
   })