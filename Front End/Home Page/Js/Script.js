const $d = document;
const $main = $d.querySelector("main");
const $dropZone = $d.querySelector(".dropZone");

const uploader = (file) => {
  const xhr = new XMLHttpRequest();
  const formData = new FormData();

  formData.append("file", file);

  xhr.addEventListener("readystatechange", e => {
    if (xhr.readyState !== 4) return;

    if (xhr.status >= 200 && xhr.status < 300) {
      let json = JSON.parse(xhr.responseText)
    } else {
      let message = xhr.statusText || "Ocurrió un error";
      console.log(`Error ${xhr.status}: ${message}`);
    }
  })
  xhr.open("POST", "./assets/uploader.php");
  xhr.setRequestHeader("enc-type", "multipart/form-data");
  xhr.send(formData);
}

$dropZone.addEventListener("dragover", e => {
  e.preventDefault();
  e.stopPropagation();
  e.target.classList.add("is-active")
})

$dropZone.addEventListener("dragleave", e => {
  e.preventDefault();
  e.stopPropagation();
  e.target.classList.remove("is-active")
})

$dropZone.addEventListener("drop", e => {
  e.preventDefault();
  e.stopPropagation();
  const files = Array.from(e.dataTransfer.files);
  files.forEach(el => progressUpload(el));
  e.target.classList.remove("is-active")
})

const progressUpload = (file)=> {
  const $progress = $d.createElement("progress");
  const $span = $d.createElement("span");

  $progress.value = 0;
  $progress.max = 100;

  $main.insertAdjacentElement("beforeend", $progress);
  $main.insertAdjacentElement("beforeend", $span);

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.addEventListener("progress", e => {
    let progress = parseInt((e.loaded * 100) / e.total);
    $progress.value = progress;
    $span.innerHTML = `${file.name} - ${progress}%`;
  });

  fileReader.addEventListener("loadend", e => {
    uploader(file);
    setTimeout(() => {
      $main.removeChild($progress);
      $main.removeChild($span);
    }, 2000);
  });
}