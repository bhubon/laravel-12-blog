<script>
    $(document).ready(function() {
        $('.image-upload-input').change(function() {
            const file = this.files[0];
            const previewer = $('.image-preview');

            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    previewer.attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
