let picurePreview = document.querySelector(".form_group_image_file");
let pictureGroup = document.querySelector(".form_group_file");
let pictureFileName = pictureGroup.querySelector(".form_file");
let pictureInput = document.querySelector("#picture");
let fileUploadLabel = document.querySelector(".file_upload");
let pressingLabel = false;

let groupDeletePicture = document.querySelector(".form_group_delete_file");
let deletePicture = document.querySelector("#delete_picture");

let savedPicture = picurePreview.getAttribute("src") ?? "";
let hasSavedPicture = savedPicture.length != "";
let previewingPicture = false;

function updateFileUploadActions() {
  if (!savedPicture) {
    picurePreview.disable();
    groupDeletePicture.disable();
  } else {
    picurePreview.src = savedPicture;
    picurePreview.enable();
    groupDeletePicture.enable();
  }
  previewingPicture = false;
  pictureFileName.innerTEXT = "Nenhum arquivo selecionado";
}

pictureInput.onchange = (e) => {
  picurePreview.enable();
  groupDeletePicture.enable();
  deletePicture.checked = false;
  console.log(e);

  let file = pictureInput.files[0];
  if (file == null) {
    updateFileUploadActions();
  }
  pictureFileName.innerTEXT = `Selecionado o arquivo "${file.name}"`;
  picurePreview.src = URL.createObjectURL(file);
  previewingPicture = true;
};

deletePicture.onchange = () => {
  if (!previewingPicture) return;

  pictureInput.value = "";
  picurePreview.src = "";
  deletePicture.checked = false;
  updateFileUploadActions();
};

fileUploadLabel.onkeydown = (e) => {
  if (pressingLabel) return;
  pressingLabel = true;
  pictureInput.click();
};

fileUploadLabel.onkeyup = (e) => {
  console.log("onkeyup");
  pressingLabel = false;
};

if (window.location.pathname == "/register") {
  picurePreview.disable();
  groupDeletePicture.disable();
} else {
  updateFileUploadActions();
}
