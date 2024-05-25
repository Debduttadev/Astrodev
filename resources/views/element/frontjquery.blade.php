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


    });
</script>