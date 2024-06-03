<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;

        if (prevScrollpos >= currentScrollPos) {
            if (currentScrollPos <= 50) {
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


        $('#timepicker1').datetimepicker({
            format: 'HH:mm:ss'
        });


        $('#bookingdate').datetimepicker({
            format: 'DD-MM-YYYY',
            minDate: new Date(),
            calendarWeeks: true
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