<?php 

$option = null;

if(isset($_POST['s'])) {
    $option = $_POST['s'];

} else {
    http_response_code(400);
    echo json_encode(['descrição' => 'É necessário informar um serviço.']);
    exit;
}

switch ($option) {
    case '1':
        uploadFile();
        break;
    default:
        http_response_code(400);
        echo json_encode(['descrição' => 'Opção não existe.']);
        exit;
        break;
}

function uploadFile() {
    if (isset($_FILES['file'])) {
        $isMoved = move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['tmp_name']);
        if ($isMoved) {
            http_response_code(200);
            echo json_encode(['descrição' => 'Arquivo carregado com sucesso!']);
            return;
        } else {
            http_response_code(400);
            echo json_encode(['descrição' => 'Arquivo não carregado!']);
            return;
        }
    
    }

}
