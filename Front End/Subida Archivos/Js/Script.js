const dropArea=document.querySelector(".drag-area");
const dragText=dropArea.querySelector('h2');
const button=dropArea.querySelector('#SA');
const input=dropArea.querySelector('#input-file');

button.addEventListener('click',e=>{
  input.click();
})

input.addEventListener('change',e=>{
  files=this.files;
  dropArea,classlist.add("active")
  showFile(files)
  dropArea.classList.remove("active")
})


dropArea.addEventListener("dragover",e=>{
  e.preventDefault()
  dropArea.classList.add("active")
  dragText.textContent="Suelta para subir archivo"
})

dropArea.addEventListener("dragleave",e=>{
  e.preventDefault()
  dropArea.classList.remove("active")
  dragText.textContent="Arrastra aqui tus archivos"
})

dropArea.addEventListener("drop",e=>{
  e.preventDefault()
  files=e.dataTransfer.files
  showFiles(files)
  dropArea.classList.remove("active")
  dragText.textContent="Arrastra aqui tus archivos"
})


function showFiles(files){
  if(files.lenght = undefined){
    processFile(files)
  }else{
    for(const file of files){
      processFile(file)
    }
  }
}

function processFile(file){
  const docType =file.type
  const validExtension=["image/jpeg","image/png","image/jpg","image/gif"];

  if(validExtension.includes(docType)){
    const fileReader=new FileReader()
    const id= `file-${Math.random().toString(32).substring(7)}`

    fileReader.addEventListener('load',e=>{
      const fileUrl=fileReader.result
      const image=`
      <div id="${id}" class="file-container">
        <img src="${fileUrl}" alt="${file.name}" width="50px">
        <div class="status">
          <span>${file.name}</span>
          <span class="status-text">
            Loading ...
          </span>
        </div>
      </div>
      `
      const html=document.querySelector("#preview").innerHTML
      document.querySelector("#preview").innerHTML=image+html
    })
    fileReader.readAsDataURL(file)
    uploadfile(file, id)
  }else{
    alert("No es un archivo valido")
  }
}

async function uploadfile(file){
    const formData=new FormData()
    formData.append("file", file)
    try {
      const response= await fetch("http://localhost:3000/upload",{
        method:"POST",
        body:formData,
      })

      const responseText=await response.text()

      document.querySelector(
        `#${id} .status-text`
      ).innerHTML = `<span class="success">Archivo subido correctamente ...</span>`
    } catch (error) {
      document.querySelector(
        `#${id} .status-text`
      ).innerHTML = `<span class="failure">Error al subir el archivo ...</span>`
    }
}