const imageinput = document.getElementById('image');
const previewZone = document.getElementById('preview')

imageinput.addEventListener("change", ()=>{
    const file = imageinput.files[0]
    const reader = new FileReader

    reader.addEventListener("load", ()=>{
        previewZone.innerHTML = ""
        const image = document.createElement('img')
        image.src = reader.result
        image.style.height = "100px"
        image.style.width = "100px"
        previewZone.appendChild(image)
    })
    reader.readAsDataURL(file)
})
