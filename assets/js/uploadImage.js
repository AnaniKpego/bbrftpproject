let uploadImage = {
    FILE_TYPES: [
        'image/jpeg',
        'image/pjpeg',
        'image/png'
    ],
    validTypes: function (file) {
        let fileTypes = uploadImage.FILE_TYPES;
        for (let i = 0, fileType = ""; fileType = fileTypes[i]; i++) {
            if (file.type === fileType) {
                return true;
            }
        }
        return false;
    },
    el: {
        image: document.querySelector("#image_path"),
        file: document.querySelector("#image_file"),
        preview: document.querySelector(".image-preview"),
        dataUrl: document.querySelector("#image_dataURL")
    },
    display: function (target) {
        let ancestor = target.closest(".form-group");

        console.log(ancestor);

        let preview = ancestor.querySelector(".image_preview");

        if (target.length !== 0) {
            let file = target.files[0];
            if (uploadImage.validTypes(file)) {
                preview.innerHTML = "";

                let img = document.createElement("img");
                img.src = window.URL.createObjectURL(file);
                preview.appendChild(img);

                let dataUrl = ancestor.querySelector("input[id*='_dataURL']") ;
                let image = ancestor.querySelector("input[id*='_path']");
                img.onload = () => {
                    let canvas = document.createElement("canvas");
                    canvas.width = img.naturalWidth;
                    canvas.height = img.naturalHeight;

                    let ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);

                    dataUrl.value = canvas.toDataURL();
                    image.value = file.name;
                };
            }
        }
    },
    init: function () {
        document.body.addEventListener("change", e => {

            let target = e.target;

            if (target && target.nodeName === "INPUT") {
                if (target.id.includes("mage_file") || target.id.includes("_file")) {
                    uploadImage.display(target)
                }
            }
        });
    }
};
uploadImage.init();
