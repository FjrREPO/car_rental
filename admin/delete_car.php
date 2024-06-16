<?php
include '../includes/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['car_id'])) {
  $car_id = intval($_POST['car_id']);
  
  $stmt = $conn->prepare("DELETE FROM cars WHERE car_id = ?");
  $stmt->bind_param("i", $car_id);
  if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Car Successfully Deleted');
            window.location.href = 'cars_list.php';
          </script>";
  } else {
    echo "<script type='text/javascript'>
            alert('Failed to Delete Car');
            window.location.href = 'cars_list.php';
          </script>";
  }
}
?>
