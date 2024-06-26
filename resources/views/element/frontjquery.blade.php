<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;

        if (prevScrollpos >= currentScrollPos) {
            if (currentScrollPos <= 48) {
                document.getElementById("fixednavbar").style.top = "30px";
            }
        } else {
            document.getElementById("fixednavbar").style.top = "0px";
        }
        prevScrollpos = currentScrollPos;
    }

    $(document).ready(function() {

        var base_url = "{{ URL::to('/') }}";

        $(document).on('click', '.tagsearch', function() {
            var obj = $(this);
            alttagmodaldata(obj);
        });
        $(document).on('click', '.categorysearch', function() {
            var obj = $(this);
            alttagmodaldata(obj);
        });
        $(document).on('click', '.keysearch', function() {
            var obj = $(this);
            alttagmodaldata(obj);
        });

        $(document).on('click', '.searchtitle', function(e) {
            event.preventDefault();
            var obj = $(this);
            var value = $(".titleinput").val();
            var searchval = $(".titleinput").attr('search', value)
            var searchobj = $(".titleinput");
            alttagmodaldata(searchobj)
        });

        $('.appointmentType').change(function() {
            var type = $(this).val();
            if (type == 'm') {
                $('.chamberselect').show();
            } else {
                $('.chamberselect').hide();
                $('.chamberoption').removeAttr('checked');
            }
        });

        $('#birthdate').datetimepicker({
            format: 'DD-MM-YYYY',
            maxDate: new Date(),
        });

        $('#dp1').datetimepicker({
            format: 'MM-YYYY',
            maxDate: new Date(),
        });

        $("#dp1").on("dp.change", function(e) {
            var obj = $(this);
            var value = $(this).val();
            // console.log(value);
            var searchval = $(this).attr('search', value);
            alttagmodaldata(obj)
        });

        $('#timepicker1').datetimepicker({
            format: 'HH:mm:ss'
        });

        $('#bookingdate').datetimepicker({
            format: 'DD-MM-YYYY',
            minDate: new Date(),
            calendarWeeks: true
        });

        $("#appoinmentform").submit(function(event) {
            event.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');
            console.log(form.serialize());
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    console.log(data); // show response from the php script.
                    var massage = JSON.parse(data);

                    console.log(massage);
                    if (massage.status == 1) {
                        var titlehtml = "<strong> Your appointment has been scheduled successfully. </strong>";
                        $('.appoinmenttitle1').html(titlehtml);

                        var titlehtml2 = "<p>Thank you for your interest. Your appointment is scheduled. Our Team will connect with you and will take care of this appointment and guide you accordingly.</p>";
                        $('.appoinmenttitle2').html(titlehtml2);

                        var chamber = massage.allchamber;

                        if (massage.allchamber != null) {

                            var chamberhtml = "<p>These are Chambers we have where you can have one-on-one consultations offline. Please contact us using the helpline number our team will guide you with every detail.</p>";

                            chamberhtml += "<div class='col-md-2'></div>";
                            var i = 1;

                            console.log(chamber);
                            chamberhtml += "<div class='col-md-6 col-sm-6 p-bottom-30' style='word-wrap:break-word;' > ";
                            chamberhtml += "<div>";
                            chamberhtml += "<div>";
                            chamberhtml += "<h4 class='darkcolorfont'> Chamber " + i + " Details </h4>";
                            chamberhtml += "</div>";
                            chamberhtml += "<ul>";
                            chamberhtml += "<li>";
                            chamberhtml += "Location :<h5 class='darkcolorfont'>" + chamber.locationname + "</h5></li>";
                            chamberhtml += "<li>";
                            chamberhtml += "Available Days :<h5 class='darkcolorfont'>" + chamber.availabledays + "</h5></li>";
                            chamberhtml += "<li>";
                            chamberhtml += "Help Line Phone Number :<h5 class='darkcolorfont'>" + chamber.description + "</h5></li>";
                            chamberhtml += "</ul>";
                            chamberhtml += "</div>";
                            chamberhtml += "</div>";
                            i++;

                        } else {

                            var chamberhtml = "<div class='col-md-offset-2 col-md-8' style='text-align: center;'>";
                            chamberhtml += "<div class='feature-image parent'><div>";
                            chamberhtml += "<p>Thank you for booking the consultation online. We will contact you as soon as possible and proceed with payment. One payment link will be sent to you with payment details. </p>";
                            chamberhtml += "<p>Once payment is completed, we will schedule your consultation with Astro Achariya Debdutta and guide you accordingly </p>";
                            chamberhtml += "</div></div></div>";

                        }

                        $('.appoinmentbody').html(chamberhtml);
                        $('#appoinmentmodal').modal('show');
                        form.find("input").val("");
                        form.find("select").val("");
                        form.find("input[type=radio]").removeAttr('checked');
                        $('.chamberselect').hide();
                        $('#optionsRadios1').attr('checked', 'checked');

                    } else if (massage.status == 0) {
                        $('#errorappoinment').modal('show');
                    }
                }
            });

        });

        // Contact us forn in home page data stor in database
        $("#contactusform").submit(function(event) {

            event.preventDefault();
            //alert("sdgfg");
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.

                success: function(data) {
                    //console.log(data); // show response from the php script.
                    var massage = JSON.parse(data);

                    if (massage.status == 1 && massage.msg == "true") {

                        form.find("input").val("");
                        form.find("textarea").val("");
                        $('#ajaxsuccess').show();
                        setTimeout(function() {
                            $('#ajaxsuccess').hide();
                        }, 4000);

                    } else if (massage.status == 0 && massage.msg == "false") {

                        $('.errorcontact').html("<p>Sorry your massage is not sent, Please try again</p>");

                    }
                }
            });
        });
    });

    function alttagmodaldata(obj) {

        var base_url = "{{ URL::to('/') }}";
        var search = obj.attr('search');
        var type = obj.attr('typeblog');
        //console.log(search, type);

        $.ajax({
            url: base_url + '/searchblog',
            method: "get",
            data: {
                'search': search,
                'type': type,
            }
        }).done(function(msg) {

            var data = JSON.parse(msg);
            if (data == "0") {

                $(".blogsearchdetails").empty();
                $(".blogsearchdetails").html("<h3>No Blog Found</h3>");
                $("#paginationblog").remove();

            } else {

                var html = "";
                for (var x in data) {
                    html += "<div class='col-sm-6 m-bottom-40'>";
                    html += "<div class='blog wow zoomIn' data-wow-duration='1s' data-wow-delay='0.7s'>";
                    html += "<div class='blog-media'>"
                    html += "<a href='" + base_url + "/blog/" + btoa(data[x].id) + "'>"
                    html += "<img src='" + base_url + "/blog/" + data[x].image + "' alt='' /></a>";
                    html += "</div>";

                    html += "<div class='blog-post-info clearfix'>";
                    html += "<span class='time'><i class='fa fa-calendar'></i>" + data[x].createdate + "</span>";
                    html += "</div>";
                    html += "<div class='blog-post-body'>";
                    html += "<h4><a class='title'>" + data[x].title + "</a></h4>";
                    html += "<p class='p-bottom-20'>" + data[x].description + "</p>";
                    html += "<a href='" + base_url + "/blog/" + btoa(data[x].id) + "' class='read-more'>Read More >></a>";
                    html += "</div>";
                    html += "</div>";
                    html += "</div>";
                }

                $("#paginationblog").remove();
                $(".blogsearchdetails").empty();
                $(".blogsearchdetails").html(html);

            }
        })
    }
</script>