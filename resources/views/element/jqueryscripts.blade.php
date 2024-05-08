<script type="text/javascript">
    $(document).ready(function() {

        var base_url = "{{ URL::to('/') }}";


        setTimeout(function() {
            $('.sessiondata').fadeOut('400');
        }, 3000);

        //  delete admin user
        $('.deleteadmin').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('adminid');
            //alert(id);
            bootbox.confirm("Are you sure to delete this Admin?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/deleteadmin',
                        method: "get",
                        data: {
                            'id': id
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        //console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("Admin Deleted Successful")
                            obj.parent().parent().remove();
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry Admin Not Deleted")
                        }
                    })
                } else {}
            });
        });

        // delete service
        $('.deleteservice').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('serviceid');
            var serviceimage = $(this).attr('serviceimage');
            //alert(serviceimage);
            bootbox.confirm("Are you sure to delete this Service?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/deleteservice',
                        method: "get",
                        data: {
                            'id': id,
                            'serviceimage': serviceimage,
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("Service Deleted Successful")
                            obj.parent().parent().remove();
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry Service Not Deleted")
                        }
                    })
                } else {}
            });
        });

        $('.newimage').on('change', function() {
            var obj = $(this);
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#showimage").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        });

    });
</script>