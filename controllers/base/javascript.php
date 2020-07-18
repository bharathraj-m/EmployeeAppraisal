
    <!-- Username Checking -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#user_username").keyup(function (e) {
                $(this).val($(this).val().replace(/\s/g, ''));
                var username = $(this).val();
                if(username.length < 1){$("#status").html('');return;}
                if(username.length >= 1){
                    $("#status").html('<img src="assets/img/ajax-loader.gif" />');
                    $.post('components/check-username-availability.php', {'user_username':username}, function(data) {
                      $("#status").html(data);
                    });
                }
            });
        });
    </script>

    <!-- Image Upload Preview -->
    <script src="assets/js/base/jquery-1.8.0.min.js"></script>

    <!-- Avatar Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadImagePreview").css("display","block");
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").css("max-height","223px");
                        $("#imagePreview").css("height","223px");
                    }
                }
            });
        });
    </script>
