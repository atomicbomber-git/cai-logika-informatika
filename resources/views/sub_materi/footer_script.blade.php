<script>
    window.onload = function () {
        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });

        addEventListener("trix-attachment-add", function (event) {
            if (event.attachment.file) {
                const file = event.attachment.file;
                event.attachment.attachment.previewURL = URL.createObjectURL(file);

                toBase64(file)
                    .then(base64 => {
                        event.attachment.setAttributes({
                            url: base64,
                        });
                        event.attachment.setUploadProgress(100)
                    })
                    .catch(error => {

                    })
            }
        });
    };
</script>
