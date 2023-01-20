// Reader Image on Change
function previewFile() {
    const preview = document.querySelector("#imgRead");
    const file = document.querySelector("input[type=file]").files[0];
    const reader = new FileReader();

    reader.addEventListener(
        "load",
        () => {
            preview.src = reader.result;
        },
        false
    );

    if (file) {
        reader.readAsDataURL(file);
    }
}

// function renderPrice() {
//     const preview = document.querySelector("#renderPrice");
//     const file = document.querySelector("input[type=radio]").files[0];
//     const reader = new FileReader();

//     reader.addEventListener(
//         "load",
//         () => {
//             preview.src = reader.result;
//             preview.value = reader.result;
//         },
//         false
//     );

//     if (file) {
//         reader.readAsDataURL(file);
//     }
// }
