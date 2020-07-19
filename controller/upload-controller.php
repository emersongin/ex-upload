<?php 

$option = null;

$result = array(
    $_POST,
    $_FILES
);
echo json_encode($result);
exit;

if(isset($_POST['service'])) {
    $option = $_POST['service'];

} else {
    http_response_code(400);
    echo json_encode(['error' => 'É necessário informar um serviço.']);
    exit;
}

switch ($option) {
    case 'upload':
        uploadFile();
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Opção não existe.']);
        exit;
        break;
}

function uploadFile() {
    if (isset($_FILES['file'])) {
        $isMoved = move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['tmp_name']);
        if ($isMoved) {
            http_response_code(200);
            echo json_encode(['error' => 'Arquivo carregado com sucesso!']);
            return;
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Arquivo não carregado!']);
            return;
        }
    
    }

}
