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

        //show image if edited in update service
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

        //checkbox checked property change for add chamber section 
        $('#alldays').on('change', function() {
            var obj = $(this);
            if ($('#alldays').prop('checked') == true) {
                $('.dayselect').prop('checked', true);
            } else {
                $('.dayselect').prop('checked', false);
            }
        });

        //checkbox checked property change for edit chamber section 
        $('#editalldays').on('change', function() {
            var obj = $(this);
            if ($('#editalldays').prop('checked') == true) {
                $('.dayselect').prop('checked', true);

            } else {
                $('.dayselect').prop('checked', false);
            }
        });


        // delete chamber
        $('.deletechember').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('chamberid');

            bootbox.confirm("Are you sure to delete this Chamber Location?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/deletechamber',
                        method: "get",
                        data: {
                            'id': id
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("Chamber Deleted Successful")
                            obj.parent().parent().remove();
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry Chamber Not Deleted")
                        }
                    })
                } else {}
            });
        });


        // delete bannervideo
        $('.deletebannervideo').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('bannervideoid');
            var bannervideoimage = $(this).attr('bannervideoimage');

            bootbox.confirm("Are you sure to delete this File?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/deletebannervideo',
                        method: "get",
                        data: {
                            'id': id,
                            'bannervideoimage': bannervideoimage
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("File Deleted Successful")
                            obj.parent().parent().remove();
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry File Not Deleted")
                        }
                    })
                } else {}
            });
        });


        // delete Social Link
        $('.deletesocial').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('socialid');

            bootbox.confirm("Are you sure to delete this Social Link?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/deletesocials',
                        method: "get",
                        data: {
                            'id': id
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("Chamber Deleted Successful")
                            obj.parent().parent().remove();
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry Chamber Not Deleted")
                        }
                    })
                } else {}
            });
        });



        // edit Social Link
        $('.addediturl').on('change', function() {
            var obj = $(this);
            var preva = $(this).prev('.jqueryurl');
            var id = $(this).attr('socialid');
            var url = $(this).val();
            //alert(url);
            bootbox.confirm("Are you sure to update this Social Link?", function(result) {
                if (result) {
                    $.ajax({
                        url: base_url + '/addeditsocials',
                        method: "get",
                        data: {
                            'id': id,
                            'url': url
                        }
                    }).done(function(msg) {
                        var massage = JSON.parse(msg);
                        console.log(massage);
                        if (massage.status == 1 && massage.msg == "true") {
                            bootbox.alert("Link Updated Successful")
                            location.reload(true);
                        } else if (massage.status == 0 && massage.msg == "false") {
                            bootbox.alert("Sorry Link Not Updated")
                        }
                    })
                } else {}
            });
        });

        // delete Social Link
        $('.urlradio').on('click', function() {
            var obj = $(this);
            var id = $(this).attr('linkid');
            var radioValue = $('input[name="visibility' + id + '"]:checked').val();
            //console.log(radioValue);
            $.ajax({
                url: base_url + '/visibilitylink',
                method: "get",
                data: {
                    'id': id,
                    'radioValue': radioValue
                }
            }).done(function(msg) {
                var massage = JSON.parse(msg);
                console.log(massage);
                if (massage.status == 1 && massage.msg == "true") {
                    alert("Link Visibility Updated Successful")
                    location.reload(true);
                } else if (massage.status == 0 && massage.msg == "false") {
                    alert("Sorry Link Visibility Not Updated")
                }
            })
        });
    });
</script>