
  // JavaScript para atualização dinâmica das cores das caixas
  function getClassByStatus(status) {
    switch (status) {
      case 'green':
        return 'verde';
      case 'yellow':
        return 'amarelo';
      case 'red':
        return 'vermelho';
      default:
        return '';
    }
  }

  function updateStatus() {
    // Ler o arquivo JSON existente
    fetch('/config/status.json')
      .then(response => response.json())
      .then(data => {
        const boxes = document.querySelectorAll('.box');
        boxes.forEach(box => {
          const number = parseInt(box.querySelector('.number').textContent);
          const boxData = data.boxes.find(item => parseInt(item.number) === number);
          const status = boxData ? boxData.status : '';
          const classStatus = getClassByStatus(status);
          box.classList.remove('verde', 'amarelo', 'vermelho');
          box.classList.add(classStatus);
        });
      })
      .catch(error => console.error('Erro ao carregar os dados:', error));
  }

  // Chama a função para atualizar os status quando a página terminar de carregar
  window.addEventListener('load', updateStatus);
  // Chama a função para atualizar os status a cada 5 segundos
  setInterval(updateStatus, 1000);


// Função para enviar a foto com o ratio selecionado
function sendPhoto(boxNumber, selectedRatio) {
    // Coloque aqui a lógica para enviar a foto
    // Certifique-se de validar o arquivo selecionado antes de enviar
    const inputFile = document.getElementById(`fileInput${boxNumber}`).files[0];
    const allowedExtensions = ['jpg', 'png', 'jpeg', 'pdf'];
  
    if (inputFile) {
      const fileName = inputFile.name;
      const fileExt = fileName.split('.').pop().toLowerCase();
  
      if (allowedExtensions.includes(fileExt)) {
        const uploadDir = 'uploads/questao' + boxNumber + '/';
        const uploadPath = uploadDir + fileName;
  
        if (!is_dir(uploadDir)) {
          mkdir(uploadDir);
          chmod(uploadDir);
        }
  
        if (move_uploaded_file(inputFile, uploadPath)) {
          // Depois de mover o arquivo, chama a função para atualizar a contagem
          atualizarContagem(boxNumber);
        } else {
          Swal.fire("Erro", "Ocorreu um erro ao enviar a foto.", "error");
        }
      } else {
        Swal.fire("Erro", "Apenas arquivos JPG, PNG, JPEG e PDF são permitidos.", "error");
      }
    } else {
      Swal.fire("Erro", "Nenhum arquivo selecionado.", "error");
    }
  }
  
  // Cria as caixas e os elementos associados a elas
  for (let i = 1; i <= 40; i++) {
    const box = document.createElement("div");
    box.classList.add("box");
    const number = document.createElement("div");
    number.classList.add("number");
    number.textContent = i;
  
    const form = document.createElement("form");
    form.id = `uploadForm${i}`;
    form.method = "POST";
    form.enctype = "multipart/form-data";
  
    const inputFile = document.createElement("input");
    inputFile.type = "file";
    inputFile.id = `fileInput${i}`;
    inputFile.name = "photo";
    inputFile.style.display = "none";
  
    const questaoInput = document.createElement("input");
    questaoInput.type = "hidden";
    questaoInput.name = "questao";
    questaoInput.value = i;
  
    box.appendChild(number);
    box.appendChild(form);
    
    const ratioButton = document.createElement("button");
    ratioButton.textContent = "Responder";
    ratioButton.className = "button-container";
    ratioButton.onclick = function () {
      checkStatusAndSend(i);
    };
  

  
    form.appendChild(inputFile);
    form.appendChild(questaoInput);
  
    box.appendChild(ratioButton);
  
    document.querySelector(".container").appendChild(box);
  }
  
  function openPopup(boxNumber) {
    // Dentro da função openPopup(boxNumber), você pode adicionar estilos personalizados para o pop-up
    Swal.fire({
      title: `Respondendo questão: ${boxNumber}`,
      html: `
        <form id="uploadForm${boxNumber}" method="POST" enctype="multipart/form-data" action="upload.php">
          <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <select name="resposta" id="ratioSelector" style="width: 80%; font-size: 25px; margin-bottom: 10px;">
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
              </select>
              <input type="file" name="photo" accept="image/*" style="font-size: 25px;">
              <input type="hidden" name="questao" value="${boxNumber}">
              <button id="sendPhotoButton${boxNumber}" type="submit" class="swal2-confirm swal2-styled" style="font-size: 25px; margin-top: 25px;">Enviar Foto</button>
          </div>
        </form>
      `,
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: "Cancelar",
      customClass: {
        container: "custom-swal-container", // Classe personalizada para o pop-up
        content: "custom-swal-content", // Classe personalizada para o conteúdo do pop-up
      },
      width: "70%", // Largura personalizada para o pop-up
    });
  }
  
  function checkStatusAndSend(boxNumber) {
    fetch('/config/status.json')
      .then(response => response.json())
      .then(data => {
        const boxData = data.boxes.find(item => parseInt(item.number) === boxNumber);
        const status = boxData ? boxData.status : '';

        if (status === 'red') {
          Swal.fire("Erro", "Envio bloqueado pelo profesor.", "error");
        } else {
          openPopup(boxNumber);
        }
      })
      .catch(error => console.error('Erro ao carregar os dados:', error));
}

 

  
  