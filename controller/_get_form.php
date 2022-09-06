<?php
try {
    $stmt = $conn->prepare("SELECT * FROM form ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$form = array();

foreach ($stmt->fetchAll() as $row) {
    if (isset($_GET['form_id'])) {
        if ($row['form_id'] == $_GET['form_id']) {
            array_push($form, $row);
        }
    } else {
        array_push($form, $row);
    }
}

$conn = null;
