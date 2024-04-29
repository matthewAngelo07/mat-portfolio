<?php

include '../server.php';

if (isset($_POST['delete_messages'])) {

    if (!empty($_POST['message_ids'])) {
 
        $message_ids = array_map('intval', $_POST['message_ids']);
        $message_ids = implode(',', $message_ids);

        $sql = "DELETE FROM message WHERE id IN ($message_ids)";
        if ($connect->query($sql) === TRUE) {
 
            header("Location: index.php?deleteSuccess=true");
            exit();
        } else {
            echo "Error deleting messages: " . $connect->error;
        }
    } else {
        echo "No messages selected for deletion.";
    }
} else {

    header("Location: index.php");
    exit();
}


$connect->close();

?>