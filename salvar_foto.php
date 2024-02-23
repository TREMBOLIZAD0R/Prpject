<?php
// Verifica se há dados enviados
if (isset($_POST['data'])) {
    // Obtém os dados da imagem codificados em base64
    $data = $_POST['data'];

    // Decodifica os dados da imagem
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $data = base64_decode($data);

    // Define o caminho onde a imagem será salva
    $file = 'capturas/' . uniqid() . '.png';

    // Salva a imagem no diretório "capturas"
    if (file_put_contents($file, $data) !== false) {
        echo 'Foto salva com sucesso.';
    } else {
        echo 'Erro ao salvar a foto.';
    }
} else {
    echo 'Nenhum dado de imagem enviado.';
}
?>
