<?php
require 'database.php';

$id            = $_POST['tool_id'];
$tool_name     = $_POST['tool_name'];
$tool_category = $_POST['tool_category'];
$tool_price    = $_POST['tool_price'];

// LET OP: vergeet WHERE niet — anders worden ALLE tools bijgewerkt!
$stmt = $conn->prepare(
    "UPDATE tools
     SET tool_name = :tool_name,
         tool_category = :tool_category,
         tool_price = :tool_price
     WHERE tool_id = :id"
);
$stmt->execute([
    'tool_name'     => $tool_name,
    'tool_category' => $tool_category,
    'tool_price'    => $tool_price,
    'id'            => $id,
]);

header('Location: tool_index.php');
exit;
?>